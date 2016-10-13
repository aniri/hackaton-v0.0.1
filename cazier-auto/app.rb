require 'ki'
require 'securerandom'
require 'digest/md5'

def log(message)
  begin
    log_dir = "/tmp/"
    full_path = log_dir.concat("ki.log")
    file = File.open(full_path, "w")
    file.write(message)
    file.write("\n")
  rescue IOError => e
    #some error occur, dir not writable etc.
  ensure
    file.close unless file.nil?
  end
end

class Check < Ki::Model
  def before_find
    unless params['serie']
      raise Ki::ApiError.new('serie missing', 400)
    end

    if params['user_id']
      @user_id = params['user_id']
    end
    @params.delete('user_id')
  end

  def after_find
    log(@user_id)
    if @user_id == 'null'
      @result = @result.select { |e| e['data_type'] == 'info'}
      # add mock data
      @result = @result.concat([
        {"serie":"VIN1234EXAMPLE","data_type":"itp","id_verif":"00001","data_verif":"2016-10-08","data_exp":"2018-10-07","service":"SC Auto SRL","rezultat":"Admis","no_km":"50000"},
        {"serie":"VIN1234EXAMPLE","data_type":"auth","data_auth":"2016-09-01"},
        {"serie":"VIN1234EXAMPLE","data_type":"service","daune":[{"data":"2016-05-01","descriere":"Bara fata sparta", "unitatea":"Opel GTT","localitatea":"Bucuresti","cost":"500 RON","detalii":["bara fata","far stanga","far ceata stanga"]}],"reparatii":[{"data":"2016-05-01","descriere":"Reparatie bara fata","cost":"455 RON","no_km":"42400","detalii":{"manopera":"100","piese":"300","vopsitorie":"100"}},{"data":"2016-07-01","descriere":"Revizie anuala","cost":"455 RON","no_km":"47400","detalii":{"manopera":"100","piese":"300"}}]}
        ])
    end
    History.create(user_id: @user_id, data: @result, created_at: Time.now.to_i, serie: params['serie'])
    log(@result)
  end

  def before_create
    params[:created_at] = Time.now.to_i
  end
end

class History < Ki::Model
  requires :user_id

  def before_create
    params[:created_at] = Time.now.to_i
  end
end

class User < Ki::Model
  requires :email, :password

  def before_create
    params[:created_at] = Time.now.to_i

    # md5 is not a propper password hasing function
    params['password'] = Digest::MD5.hexdigest(params['password'])
  end

  def before_find
    unless params['email']
      raise Ki::ApiError.new('missing email', 400)
    end
    unless params['password']
      raise Ki::ApiError.new('missing password', 400)
    end
    email = params['email']
    hashed_pass = Digest::MD5.hexdigest(params['password'])
    @params.clear
    @params = {"email" => email, "password" => hashed_pass}
  end

  def after_find
    if @result.empty?
      raise Ki::ApiError.new('invalid credentials', 401)
    end

    @result = {
      id: @result[0]['id']
    }
  end
end

class Sso < Ki::Model
  requires :email

  def after_create
    user = User.find(email: params['email']).first
    unless user
      random_string = SecureRandom.hex
      user = User.create(email: params['email'], password: random_string)
    end
    @result = {
      id: user['id']
    }
  end
end

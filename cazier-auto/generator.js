json = '';
vinBase = 'W0L0SDL68943100'
vinEnd = 0;

models = ['Astra','Corsa','Antara','Meriva','Calibra','Vectra'];
cc = ['1.4','1.6','2.0'];
dosare = ['Dosar RCA','Dosar CASCO'];
daune = ['bara spate','bara fata','parbriz','aripa fata stanga','aripa fata dreapta','aripa spate stanga','aripa spate dreapta','far dreapta','far stanga','far ceata dreapta','far ceata stanga'];
descrieri = ['Accident usor','Revizie periodica'];
revizie = ['Schimb ulei','Schimb filtru aer','Schimb filtru polen','Schimb placute frana'];
unitati = ['Opel GTT','Opel Dibas','Serviceul din colt'];
rezultat = ['Admis','Admis revenire'];
motive = ['Noxe','Frane','Lumini'];

json += '[';
for (i=0;i<10;i++) {
  vinEnd++;
  json += '{ "data_type": "info",';
  vin = '';
  vin += vinBase;
  if (vinEnd<10) vin += '0';
  vin += vinEnd;
  json += '"serie": "' + vin + '",';
  json += '"marca": "Opel",';
  json += '"model": "' + fromArray(models) + '",';
  json += '"cilindree": "' + fromArray(cc) + '",';
  json += '"combustibil": "benzina",';
  json += '"data_fabricatie": "' + randomYear() + '"'
  json += '}';
  
  json += ",";
  
  json += '{ "data_type": "auth",';
  json += '"serie": "' + vin + '",'; 
  json += '"data_auth": "' + randomDate(new Date(2014,10,1),new Date(2016,10,1)) + '"';
  json += '},';
  
  json += '{ "data_type": "service",';
  json += '"serie": "' + vin + '",';
  json += '"daune":[';
  for (j=0;j<Math.floor(Math.random()*5+1);j++) {
    json += '{';
    json += '"data": "' + randomDate(new Date(2014,10,1),new Date(2016,10,1)) + '",'
    json += '"descriere": "' + fromArray(dosare) + '",'
    json += '"unitatea": "' + fromArray(unitati) + '",'
    json += '"localitatea": "Bucuresti",'
    json += '"cost": "' + Math.floor(Math.random()*(2000-50+1)+50) + '",'
    json += '"detalii":[';
    for (k=0;k<Math.floor(Math.random()*4+1);k++) {
      json += '"' + fromArray(daune)+'",';
    }
    json = json.substring(0,json.length-1);
    json += ']},';
  }
  json = json.substring(0,json.length-1);
  json += '],';
  json += '"reparatii":[';
  
  for (j=0;j<Math.floor(Math.random()*5+1);j++) {
    json += '{';
    json += '"data": "' + randomDate(new Date(2014,10,1),new Date(2016,10,1)) + '",';
    desc = fromArray(descrieri);
    json += '"descriere": "' + desc + '",'
    json += '"unitatea": "' + fromArray(unitati) + '",';
    json += '"localitatea": "Bucuresti",';
    json += '"no_km":"' + Math.floor(Math.random()*(100000-50000+1)+50000) + '",';
    json += '"cost": "' + Math.floor(Math.random()*(2000-50+1)+50) + '",';
    json += '"detalii":[';
    for (k=0;k<Math.floor(Math.random()*4+1);k++) {
      if (desc == 'Revizie periodica') json += '"' + fromArray(revizie)+'",';
      else json += '"' + fromArray(daune)+'",';
    }
    json = json.substring(0,json.length-1);
    json += "]},";
  }
  json = json.substring(0,json.length-1);
  json += ']},';
  
  for (j=0;j<Math.floor(Math.random()*5+1);j++) {
    json += '{ "data_type": "itp",';
    json += '"serie": "' + vin + '",'; 
    json += '"id_verif": "' + '00004' + '",'; 
    d = randomDate(new Date(2014,10,1),new Date(2016,10,1));
    json += '"data_verif": "' + d + '",';
    json += '"data_exp": "' + parseInt(d.substring(0,4))+2 + d.substring(4,d.length) + '",';
    json += '"service": "' + fromArray(unitati) + '",';
    r = fromArray(rezultat);
    if (r == 'Admin revenire') {
      r += '(' + fromArray(motive) + ')';
    }
    json += '"rezultat": "' + r + '",';
    json += '"no_km":"' + Math.floor(Math.random()*(100000-50000+1)+50000) + '"';
    json += '},';
  }
  json += '\n\n';
}
json = json.substring(0,json.length-1);
json += ']';

function fromArray(arr) {
  return arr[Math.floor(Math.random() * arr.length)];
}

function randomYear() {
  max = 2015;
  min = 1990;
  return Math.floor(Math.random()*(max-min+1)+min);
}

function randomDate(start, end) {
    date = new Date(start.getTime() + Math.random() * (end.getTime() - start.getTime()));
    return (date.getDate()<10?'0':'') + date.getDate() + '-' + (date.getMonth()+1<10?'0':'') + (date.getMonth()+1) + '-' + date.getFullYear();
}

console.log(json);
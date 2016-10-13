package ro.gov.ithub.asistentulcetateanului.subscriber.email;

/**
 * Created by @aniri on 10/8/2016.
 */
public class Notification {

    private String type;
    private String channel;
    private String message;
    private String email;

    public Notification(String email, String type, String channel, String message) {
        this.email = email;
        this.type = type;
        this.channel = channel;
        this.message = message;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }

    public String getChannel() {
        return channel;
    }

    public void setChannel(String channel) {
        this.channel = channel;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    @Override
    public String toString() {
        return "Notification{" +
                "email='" + email + '\'' +
                ", type='" + type + '\'' +
                ", channel='" + channel + '\'' +
                ", message='" + message + '\'' +
                '}';
    }
}

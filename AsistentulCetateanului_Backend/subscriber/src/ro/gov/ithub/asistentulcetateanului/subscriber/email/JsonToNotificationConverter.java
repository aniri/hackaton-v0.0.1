package ro.gov.ithub.asistentulcetateanului.subscriber.email;

import org.json.JSONObject;

import java.util.logging.Level;
import java.util.logging.Logger;

/**
 * Created by @aniri on 10/8/2016.
 */
public class JsonToNotificationConverter {

    final static Logger logger = Logger.getLogger(JsonToNotificationConverter.class.getName());

    public static Notification convert(String jsonString) {

        Notification n = null;

        JSONObject jsonObj = new JSONObject(jsonString);

        String type = "[Notificare noua] " + jsonObj.getString("type");

        JSONObject opts = jsonObj.getJSONObject("opts");
        String email = opts.getString("email");

        String channel = jsonObj.getString("channel");

        String message = jsonObj.getString("message");

        if (message == null) {
            message = jsonString;
        } else{
            message += "<br/><br/><br/>"+opts.toString()+"<br/><br/>";
        }

        if (email != null && channel != null){
            n = new Notification(email, type, channel, message);
        }

        logger.log(Level.INFO, "Notification converted! " + n);

        return n;
    }
}

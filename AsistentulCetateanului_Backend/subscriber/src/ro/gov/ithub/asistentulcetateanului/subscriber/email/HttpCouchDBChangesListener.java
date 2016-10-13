package ro.gov.ithub.asistentulcetateanului.subscriber.email;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.ProtocolException;
import java.net.URL;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 * Created by @aniri on 10/8/2016.
 */
public class HttpCouchDBChangesListener implements Runnable{

    final static Logger logger = Logger.getLogger(HttpCouchDBChangesListener.class.getName());

    private static final String NOTIFICATION_TYPE_EMAIL = "EMAIL";

    private static final String DB_URL = "URL_TO_DB";

    public void run(){

        try {
            URL url = new URL(DB_URL+"_changes?feed=continuous&heartbeat=10000");

            HttpURLConnection conn = (HttpURLConnection) url.openConnection();
            conn.setDoOutput(true);
            conn.setUseCaches(false);
            conn.setRequestProperty("Connection", "Keep-Alive");
            conn.setRequestMethod("GET");

            BufferedReader reader = new BufferedReader(new InputStreamReader(conn.getInputStream()));
            String line;

            while((line = reader.readLine()) != null){

                try {
                    JSONObject jsonObj = new JSONObject(line);

                    String id = jsonObj.getString("id");

                    URL urlGetDoc = new URL(DB_URL+id);

                    HttpURLConnection connGetId = (HttpURLConnection) urlGetDoc.openConnection();
                    connGetId.setDoOutput(true);
                    connGetId.setUseCaches(false);
                    connGetId.setRequestProperty("Connection", "Keep-Alive");
                    connGetId.setRequestMethod("GET");

                    Notification newNotif = null;

                    try {
                        BufferedReader readerGetId = new BufferedReader(new InputStreamReader(connGetId.getInputStream()));
                        String docLine;

                        while ((docLine = readerGetId.readLine()) != null) {
                            newNotif = JsonToNotificationConverter.convert(docLine);
                        }
                    } catch (IOException e){
                        // json string was a deleted notification, ignoring
                    }

                    if (newNotif != null && newNotif.getChannel().toUpperCase().equals(NOTIFICATION_TYPE_EMAIL)) {
                        EmailSender.sendFromGMail(new String[]{newNotif.getEmail()}, newNotif.getType(), newNotif.getMessage());
                    }

                } catch (JSONException je){
                    // json string was not a complete notification, ignoring
                }
            }
            reader.close();

        } catch (MalformedURLException e) {
            logger.log(Level.WARNING, e.getMessage());
        } catch (ProtocolException e) {
            logger.log(Level.WARNING, e.getMessage());
        } catch (IOException e) {
            logger.log(Level.WARNING, e.getMessage());
        }
    }
}

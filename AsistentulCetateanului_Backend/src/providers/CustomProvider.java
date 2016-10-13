package providers;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Calendar;
import java.util.Scanner;
import org.json.*;

public class CustomProvider {

	private static final long TIME_OFFSET = 60 * 1000; // 1 minute;
	private static final String BASE_URL = "";
	private static final String ROWS = "rows";
	private static final String DOC = "doc";
	private static final String SUBSCRIPTIONS = "subscriptions";
	private static final String DATE_FMT = "YYYY-MM-DD HH:mm";
	private static final String CUSTOM = "custom";
	private static final String TRIGGER_ON = "trigger_on";
	private static final String MSG = "msg";
	private static final String MESSAGE = "message";
	private static final String TYPE = "type";
	private static final String CHANNEL = "channel";
	private static final String OPTS = "opts";
	private static final String EMAIL = "email";
	
	public static void main(String[] args) {
		try {

			while (true) {
				URL url;
				url = new URL(BASE_URL + "/citizens/_all_docs?include_docs=true");
				
				HttpURLConnection conn = (HttpURLConnection) url.openConnection();
				conn.setDoOutput(true);
				conn.setUseCaches(false);
				conn.setRequestMethod("GET");

				Scanner s = new Scanner(conn.getInputStream());
				s.useDelimiter("\\A");
				String result = s.hasNext() ? s.next() : "";
				s.close();

				JSONObject doc = new JSONObject(result);
				System.out.println(doc.toString());

				JSONArray jsonUsersArray = doc.getJSONArray(ROWS);
				if (jsonUsersArray == null)
					break;

				for (int idx = 0; idx < jsonUsersArray.length(); idx++) {
					JSONObject jsonUser = jsonUsersArray.getJSONObject(idx);

					try {
						JSONObject docJson = jsonUser.getJSONObject(DOC);
					
						JSONObject jsonSubscriptions = docJson.getJSONObject(SUBSCRIPTIONS);

						DateFormat dateFormat = new SimpleDateFormat(DATE_FMT);
						Date now = Calendar.getInstance().getTime();

						JSONArray jsonCustomArray = jsonSubscriptions.getJSONArray(CUSTOM);
						for (int i = 0; i < jsonCustomArray.length(); i++) {
							JSONObject custom = jsonCustomArray.getJSONObject(i);
							Date triggerOn = dateFormat.parse(custom.getString(TRIGGER_ON));
							String message = custom.getString(MSG);
							String channel = custom.getString(CHANNEL);
							
							try {
								if (now.getTime() - TIME_OFFSET < triggerOn.getTime()
										|| triggerOn.getTime() < now.getTime() + TIME_OFFSET) {

									String emlField = "";
									if (channel.equals(EMAIL)) {
										emlField = docJson.getString(EMAIL);
										if (emlField != null) {
											emlField = "\"" + OPTS + "\": {" + "\"" + EMAIL + "\": " + "\"" + emlField + "\" }";
										}
									}
									
									String notification = "{ \"" + TYPE + "\": \"" + CUSTOM + "\", \"" + MESSAGE + "\": \"" + message
											+ "\", \"" + CHANNEL + "\": \"" + channel + "\", " + emlField +" }";

									ProcessBuilder pb = new ProcessBuilder("curl", "-v", "-H",
											"Content-Type: application/json", "-d", notification,
											BASE_URL + "/notifications");
									Process pr = pb.start();

									pr.waitFor();

									BufferedReader r = new BufferedReader(new InputStreamReader(pr.getInputStream()));
									String l;
									while ((l = r.readLine()) != null) {
										System.out.println(l);
									}

									System.out.println("curl --header \"Content-Type: application/json\" -d \""
											+ notification + "\" http://localhost:5985/notificationsb");
								}
							} catch (Exception e) {
								System.out.println(e);
							}
						}
					} catch (Exception ex) {
						System.out.println(ex);
					}
				}
				
				Thread.sleep(TIME_OFFSET);
			}
		} catch (Exception e) {
			e.printStackTrace();
		}

	}
}

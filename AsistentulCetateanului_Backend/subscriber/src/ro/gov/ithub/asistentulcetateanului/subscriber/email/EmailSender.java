package ro.gov.ithub.asistentulcetateanului.subscriber.email;

import java.util.Properties;
import java.util.logging.Level;
import java.util.logging.Logger;

import javax.mail.*;
import javax.mail.internet.*;

/**
 * Created by @aniri on 10/8/2016.
 */
public class EmailSender {

    final static Logger logger = Logger.getLogger(EmailSender.class.getName());

    private static String FROM = "GMAIL_USER";
    private static String PASS = "GMAIL_PASS";

    public static void sendFromGMail(String[] to, String subject, String body) {
        Properties props = System.getProperties();
            String host = "smtp.gmail.com";
            props.put("mail.smtp.starttls.enable", "true");
            props.put("mail.smtp.host", host);
            props.put("mail.smtp.user", FROM);
            props.put("mail.smtp.password", PASS);
            props.put("mail.smtp.port", "587");
            props.put("mail.smtp.auth", "true");

            Session session = Session.getInstance(props,
                new javax.mail.Authenticator() {
                    protected PasswordAuthentication getPasswordAuthentication() {
                        return new PasswordAuthentication(FROM, PASS);
                    }
                });

            MimeMessage message = new MimeMessage(session);

            try {
                message.setFrom(new InternetAddress(FROM));
                InternetAddress[] toAddress = new InternetAddress[to.length];

                for( int i = 0; i < to.length; i++ ) {
                    toAddress[i] = new InternetAddress(to[i]);
                }

                for( int i = 0; i < toAddress.length; i++) {
                    message.addRecipient(Message.RecipientType.TO, toAddress[i]);
                }

                message.setSubject(subject);

                MimeMultipart multipart = new MimeMultipart("related");

                BodyPart messageBodyPart = new MimeBodyPart();
                StringBuilder htmlText = new StringBuilder("<h2>Notificare noua de la Asistentul Cetateanului!</h2><br/><br/>");
                htmlText.append("<div><h3>"+body+"</h3></div>");
                htmlText.append("<br/><br/>");
                htmlText.append("Notificare automata trimisa de Asistentul Cetateanului.");
                messageBodyPart.setContent(htmlText.toString(), "text/html");
                multipart.addBodyPart(messageBodyPart);

                message.setContent(multipart);

                Transport.send(message);
            }
            catch (AddressException ae) {
                logger.log(Level.WARNING, ae.getMessage());
            }
            catch (MessagingException me) {
                logger.log(Level.WARNING, me.getMessage());
            }

        logger.log(Level.INFO, "Email sent!");
    }
}


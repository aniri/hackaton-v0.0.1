package ro.gov.ithub.asistentulcetateanului.subscriber.email;

public class Main {

    public static void main(String[] args) {
        new Thread(new HttpCouchDBChangesListener()).start();
    }
}

import { Injectable } from '@angular/core';
import { Http } from '@angular/http';

import { Observable } from 'rxjs/Observable';

@Injectable()
export class FeedService {
  feedSource: Observable<{}>;
  interval: any;

  constructor(public http: Http) {
    var evtSrc = new EventSource('http://govithub.whitecitycode.com:5984/notifications/_changes?feed=eventsource');

    this.feedSource = new Observable(observer => {
      evtSrc.onmessage = (change) => {
        var doc = JSON.parse(change.data);

        http.get('http://govithub.whitecitycode.com:5984/notifications/' + doc.id).map(res => res.json()).subscribe(doc => observer.next(doc));
      };
    });
  }

  getFeedSource = () => this.feedSource;
}

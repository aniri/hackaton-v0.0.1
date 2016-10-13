import { Component, NgZone } from '@angular/core';

import { NavController, ToastController } from 'ionic-angular';

import { AuthService } from '../../providers/auth-service';
import { FeedService } from '../../providers/feed-service';

@Component({
  selector: 'page-feed',
  templateUrl: 'feed.html',
  providers: [FeedService]
})
export class FeedPage {
  feedServiceSubscription: any;
  feedItems: Array<{}>;

  constructor(
    public navCtrl: NavController,
    public toastCtrl: ToastController,
    private authService: AuthService,
    private feedService: FeedService,
    private ngZone: NgZone) {
    this.feedItems = new Array<{}>();
  }

  ionViewDidEnter = () => {
    if (!this.authService.isAuthenticated) {
      let toast = this.toastCtrl.create({
        message: 'Ups, trebuie să te autentifici pentru a accesa notificările!',
        duration: 3000,
        position: 'top'
      });

      toast.present(toast);

      this.navCtrl.parent.select(2);
    }
    else {
      if (!this.feedServiceSubscription) {
        this.feedServiceSubscription = this.feedService.getFeedSource().subscribe(doc => this.ngZone.run(() => {
          var message = doc.message;
          var type = doc.type;

          var objKeyValues = [];

          var objKeys = Object.keys(doc.opts);
          objKeys.forEach(objectKey => {
            objKeyValues.push({ key: objectKey, val: doc.opts[objectKey] });
          });

          this.feedItems.push({
            message: message,
            type: type,
            objKeyValues: objKeyValues
          });
        }));

        console.log('subscribed');
      }
    }
  }

  ionViewDidLeave = () => {
    if (this.feedServiceSubscription) {
      this.feedServiceSubscription.unsubscribe();
    }

    console.log('unsubscribed');
  }

  removeItem = (str) => {
    console.log(str);
  }
}

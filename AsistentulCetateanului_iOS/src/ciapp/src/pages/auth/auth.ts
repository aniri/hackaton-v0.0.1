import { Component } from '@angular/core';

import { NavController, LoadingController } from 'ionic-angular';

import { AuthService } from '../../providers/auth-service';

@Component({
  selector: 'page-auth',
  templateUrl: 'auth.html',
  providers: []
})
export class AuthPage {
  username: string;
  password: string;

  constructor(
    public navCtrl: NavController, 
    public loadingCtrl: LoadingController,
    private authService: AuthService) {

  }

  signIn = () => {
    let loader = this.loadingCtrl.create({
      content: "Please wait..."
    });
    loader.present();

    this.authService.authenticate(this.username, this.password).then(success => {
      this.navCtrl.parent.select(1);
      loader.dismissAll()
    }, fail => { });
  }

  signedIn = () => this.authService.isAuthenticated;
}

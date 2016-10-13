import { Injectable } from '@angular/core';
import { Http } from '@angular/http';

import 'rxjs/add/operator/map';

@Injectable()
export class AuthService {
    user: any;
    isAuthenticated: boolean;

  authenticate = (username, password) => {
    return new Promise((resolve, reject) => {
      setTimeout(() => {
        this.user = {
          username: username
        };

        this.isAuthenticated = true;

        resolve();
      }, 2000);
    });
  };
  
  getUser = () => this.user;

  constructor(public http: Http) {
    console.log('Hello AuthService Provider');

    this.isAuthenticated = false;
  }

}

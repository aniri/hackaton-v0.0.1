import { Component } from '@angular/core';

import { HomePage } from '../home/home';
import { FeedPage } from '../feed/feed';
import { AuthPage } from '../auth/auth';

@Component({
  templateUrl: 'tabs.html'
})
export class TabsPage {
  // this tells the tabs component which Pages
  // should be each tab's root Page
  homeRoot: any = HomePage;
  feedRoot: any = FeedPage;
  authRoot: any = AuthPage;

  constructor() {

  }
}

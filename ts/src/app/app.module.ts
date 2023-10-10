import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import {
  HeaderComponent,
  HeaderLanguageComponent,
  HeaderProfileComponent,
  SideMenuComponent
} from './components';

@NgModule({
  declarations: [
    AppComponent,
    SideMenuComponent,
    HeaderComponent,
    HeaderLanguageComponent,
    HeaderProfileComponent
  ],
  imports: [BrowserModule],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule {}

import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { AsideMenuComponent } from './components/aside-menu/aside-menu.component';
import { HeaderComponent } from './components/header/header.component';
import { HeroComponent } from './components/hero/hero.component';
import { SummaryComponent } from './components/summary/summary.component';

@NgModule({
  declarations: [
    AppComponent,
    AsideMenuComponent,
    HeaderComponent,
    HeroComponent,
    SummaryComponent
  ],
  imports: [
    BrowserModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

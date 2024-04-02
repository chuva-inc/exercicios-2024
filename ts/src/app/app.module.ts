import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { LeftSideNavMenuComponent } from './components/left-side-nav-menu/left-side-nav-menu.component';

@NgModule({
  declarations: [
    AppComponent,
    LeftSideNavMenuComponent
  ],
  imports: [
    BrowserModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

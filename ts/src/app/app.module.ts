import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { NavbarModule } from './components/navbar/navbar.module';
import { HeaderModule } from './components/header/header.module';
import { ContentModule } from './components/content/content.module';

@NgModule({
  declarations: [AppComponent],
  imports: [BrowserModule, NavbarModule, HeaderModule, ContentModule],
  providers: [],
  bootstrap: [AppComponent],
})
export class AppModule {}

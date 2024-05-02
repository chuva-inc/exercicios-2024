import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { HeaderComponent } from './components/layout/header/header.component';
import { FooterComponent } from './components/layout/footer/footer.component';
import { SideBarComponent } from './components/layout/side-bar/side-bar.component';
import { ContentComponent } from './components/content/content.component';
import { Textos } from './components/content/textos';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    FooterComponent,
    SideBarComponent,
    ContentComponent
  ],
  imports: [
    BrowserModule
  ],
  providers: [Textos],
  bootstrap: [AppComponent]
})
export class AppModule { }

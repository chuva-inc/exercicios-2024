import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { VideoComponentComponent } from './components/video-component/video-component.component';
import { FooterComponentComponent } from './components/footer-component/footer-component.component';
import { ButtonComponentComponent } from './components/button-component/button-component.component';
import { TopBannerComponentComponent } from './components/top-banner-component/top-banner-component.component'

@NgModule({
  declarations: [
    AppComponent,
    VideoComponentComponent,
    FooterComponentComponent,
    ButtonComponentComponent,
    TopBannerComponentComponent
  ],
  imports: [
    BrowserModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

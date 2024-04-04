import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { VideoComponentComponent } from './components/video-component/video-component.component';
import { FooterComponentComponent } from './components/footer-component/footer-component.component'

@NgModule({
  declarations: [
    AppComponent,
    VideoComponentComponent,
    FooterComponentComponent
  ],
  imports: [
    BrowserModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

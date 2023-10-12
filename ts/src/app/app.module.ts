import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import {
  DetailsComponent,
  DiscussionsComponent,
  FooterComponent,
  HeaderComponent,
  HeaderLanguageComponent,
  HeaderProfileComponent,
  IntroductionComponent,
  SideMenuComponent,
  SummaryComponent,
  TopicCardComponent,
  TopicsComponent,
  WorkContentComponent
} from './components';
import { ReactiveFormsModule } from '@angular/forms';

@NgModule({
  declarations: [
    AppComponent,
    SideMenuComponent,
    HeaderComponent,
    HeaderLanguageComponent,
    HeaderProfileComponent,
    WorkContentComponent,
    IntroductionComponent,
    DetailsComponent,
    DiscussionsComponent,
    SummaryComponent,
    TopicsComponent,
    FooterComponent,
    TopicCardComponent
  ],
  imports: [BrowserModule, ReactiveFormsModule],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule {}

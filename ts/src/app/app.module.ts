import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppComponent } from './app.component';
import { OpenInfoComponent } from './components/open-info/open-info.component';
import { CardComponent } from './components/card/card.component';
import { TopicDefaultComponent } from './components/topic-default/topic-default.component';
import { TopicSentComponent } from './components/topic-sent/topic-sent.component';
import { TopicSendingComponent } from './components/topic-sending/topic-sending.component';

@NgModule({
  declarations: [
    AppComponent,
    OpenInfoComponent,
    CardComponent,
    TopicDefaultComponent,
    TopicSentComponent,
    TopicSendingComponent,
  ],
  imports: [BrowserModule],
  providers: [],
  bootstrap: [AppComponent],
})
export class AppModule {}

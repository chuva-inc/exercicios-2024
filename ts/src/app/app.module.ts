import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { MenuComponent } from './components/menu/menu.component';
import { HeaderComponent } from './components/header/header.component';
import { FooterComponent } from './components/footer/footer.component';
import { SectionTopicComponent } from './components/section-topic/section-topic.component';
import { AnswerTopicComponent } from './components/answer-topic/answer-topic.component';
import { TopicComponent } from './components/answer-topic/topic/topic.component';
import { AnswerComponent } from './components/answer-topic/answer/answer.component';

@NgModule({
  declarations: [AppComponent, MenuComponent, HeaderComponent, FooterComponent, SectionTopicComponent, AnswerTopicComponent, TopicComponent, AnswerComponent],
  imports: [BrowserModule],
  providers: [],
  bootstrap: [AppComponent],
})
export class AppModule {}

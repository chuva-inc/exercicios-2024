import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { VideoComponentComponent } from './components/video-component/video-component.component';
import { FooterComponentComponent } from './components/footer-component/footer-component.component';
import { ButtonComponentComponent } from './components/button-component/button-component.component';
import { TopBannerComponentComponent } from './components/top-banner-component/top-banner-component.component';
import { ShowmoreComponentComponent } from './components/showmore-component/showmore-component.component';
import { TopicComponentComponent } from './components/topic-component/topic-component.component';
import { IconsComponentComponent } from './components/icons-component/icons-component.component';
import { TopicButtonComponentComponent } from './components/topic-button-component/topic-button-component.component';
import { SubjectSectionComponentComponent } from './components/subject-section-component/subject-section-component.component';
import { SubjectSectionFooterComponentComponent } from './components/subject-section-footer-component/subject-section-footer-component.component';
import { ColapseIconsComponentComponent } from './components/colapse-icons-component/colapse-icons-component.component';
import { ColapsedAnswerSectionComponent } from './components/colapsed-answer-section/colapsed-answer-section.component';
import { TopicFormComponentComponent } from './components/topic-form-component/topic-form-component.component';
import { TopicFormButtonComponentComponent } from './components/topic-form-button-component/topic-form-button-component.component'
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

@NgModule({
  declarations: [
    AppComponent,
    VideoComponentComponent,
    FooterComponentComponent,
    ButtonComponentComponent,
    TopBannerComponentComponent,
    ShowmoreComponentComponent,
    TopicComponentComponent,
    IconsComponentComponent,
    TopicButtonComponentComponent,
    SubjectSectionComponentComponent,
    SubjectSectionFooterComponentComponent,
    ColapseIconsComponentComponent,
    ColapsedAnswerSectionComponent,
    TopicFormComponentComponent,
    TopicFormButtonComponentComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    ReactiveFormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

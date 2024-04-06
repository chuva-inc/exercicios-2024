import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { SideNavComponent } from './components/side-nav/side-nav.component';
import { MatMenuModule } from '@angular/material/menu';
import { MatIconModule } from '@angular/material/icon';
import { MatButtonModule } from '@angular/material/button';
import { MatCardModule } from '@angular/material/card';
import { MatTooltipModule } from '@angular/material/tooltip';

import { MatSidenavModule } from '@angular/material/sidenav';
import { MatListModule } from '@angular/material/list';
import { HeaderComponent } from './components/header/header.component';
import { HeroComponent } from './components/hero/hero.component';
import { SummaryComponent } from './components/summary/summary.component';
import { FooterComponent } from './components/footer/footer.component';
import { DiscussionsComponent } from './components/discussions/discussions.component';
import { AnswersDiscussionsComponent } from './components/discussions/components/answers-discussions/answers-discussions.component';
import { FormDiscussionsComponent } from './components/discussions/components/form-discussions/form-discussions.component';
import { NewTopicDiscussionsComponent } from './components/discussions/components/new-topic-discussions/new-topic-discussions.component';
import { ExpandTopicDiscussionsComponent } from './components/discussions/components/expand-topic-discussions/expand-topic-discussions.component';
import { ConfirmedNewTopicComponent } from './components/discussions/components/confirmed-new-topic/confirmed-new-topic.component';

@NgModule({
  declarations: [
    AppComponent,
    SideNavComponent,
    HeaderComponent,
    HeroComponent,
    SummaryComponent,
    FooterComponent,
    DiscussionsComponent,
    AnswersDiscussionsComponent,
    FormDiscussionsComponent,
    NewTopicDiscussionsComponent,
    ExpandTopicDiscussionsComponent,
    ConfirmedNewTopicComponent,
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    MatSidenavModule,
    MatListModule,
    MatMenuModule,
    MatIconModule,
    MatButtonModule,
    MatCardModule,
    MatTooltipModule,
  ],
  providers: [],
  bootstrap: [AppComponent],
})
export class AppModule {}

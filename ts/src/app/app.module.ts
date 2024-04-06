import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { SidebarComponent } from './components/sidebar/sidebar.component';
import { HeaderComponent } from './components/header/header.component';
import { ContentComponent } from './components/content/content.component';
import { AsideComponent } from './components/content/aside/aside.component';
import { ResumeComponent } from './components/content/resume/resume.component';
import { DiscussionsComponent } from './components/content/discussions/discussions.component';
import { TopicItemComponent } from './components/content/discussions/topic-item/topic-item.component';

@NgModule({
  declarations: [
    AppComponent,
    SidebarComponent,
    HeaderComponent,
    ContentComponent,
    AsideComponent,
    ResumeComponent,
    DiscussionsComponent,
    TopicItemComponent
  ],
  imports: [
    BrowserModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

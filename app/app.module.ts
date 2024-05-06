import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { HeaderComponent } from './components/header/header.component';
import { SideMenuComponent } from './components/side-menu/side-menu.component';
import { CommentComponent } from './components/comment/comment.component';
import { VideoDetailsComponent } from './components/video-details/video-details.component';
import { SummaryComponent } from './components/summary/summary.component';
import { CreateCommentComponent } from './components/create-comment/create-comment.component';
import { FooterComponent } from './components/footer/footer.component';
import { CommentAnswearComponent } from './components/comment-answear/comment-answear.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    SideMenuComponent,
    CommentComponent,
    VideoDetailsComponent,
    SummaryComponent,
    CreateCommentComponent,
    FooterComponent,
    CommentAnswearComponent
  ],
  imports: [
    BrowserModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

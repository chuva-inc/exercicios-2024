import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ContentComponent } from './content.component';
import { BannerComponent } from './banner/banner.component';
import { SummaryComponent } from './summary/summary.component';
import { DiscussionModule } from './discussion/discussion.module';

@NgModule({
  declarations: [ContentComponent, BannerComponent, SummaryComponent],
  imports: [CommonModule, DiscussionModule],
  exports: [ContentComponent],
})
export class ContentModule {}

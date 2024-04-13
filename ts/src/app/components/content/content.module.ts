import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ContentComponent } from './content.component';
import { BannerComponent } from './banner/banner.component';

@NgModule({
  declarations: [ContentComponent, BannerComponent],
  imports: [CommonModule],
  exports: [ContentComponent],
})
export class ContentModule {}

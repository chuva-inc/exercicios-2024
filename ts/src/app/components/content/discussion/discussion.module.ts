import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DiscussionComponent } from './discussion.component';
import { FormsModule } from '@angular/forms';

@NgModule({
  declarations: [DiscussionComponent],
  imports: [CommonModule, FormsModule],
  exports: [DiscussionComponent],
})
export class DiscussionModule {}

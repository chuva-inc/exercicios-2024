import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-topic-item',
  templateUrl: './topic-item.component.html',
  styleUrls: ['./topic-item.component.scss']
})
export class TopicItemComponent implements OnInit {

  @Input() expanded: boolean = false;
  @Input() awaitingFeedback: boolean = false;

  isShowingComments: boolean = false
  constructor() { }

  ngOnInit(): void {
  }

  truncateText(text: string) {
    if (this.expanded) {
      return text;
    } else {
      const textTruncate = text.substring(0, 172);
      return textTruncate + '...';
    }
  }
  showComments() {
   if(!this.expanded) return;
   this.isShowingComments = !this.isShowingComments;
  }

}

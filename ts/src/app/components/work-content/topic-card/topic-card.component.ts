import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { ITopic } from 'src/app/interfaces';

@Component({
  selector: 'app-topic-card',
  templateUrl: './topic-card.component.html',
  styleUrls: ['./topic-card.component.scss']
})
export class TopicCardComponent implements OnInit {
  @Input() topic!: ITopic;
  @Output() editTopicClicked = new EventEmitter<{
    id: string;
    subject: string;
    content: string;
  }>();
  showReplies: boolean = false;

  constructor() {}

  ngOnInit(): void {}

  onEditTopicClick(id: string, subject: string, content: string): void {
    this.editTopicClicked.emit({ id, subject, content });
  }

  toggleShowReplies(): void {
    if (this.topic.replies.length > 0) {
      this.showReplies = !this.showReplies;
    } else if (this.showReplies === true) {
      this.showReplies = false;
    }
  }
}

import { Component, Input, OnInit } from '@angular/core';
import { ITopic } from 'src/app/interfaces';

@Component({
  selector: 'app-topic-card',
  templateUrl: './topic-card.component.html',
  styleUrls: ['./topic-card.component.scss']
})
export class TopicCardComponent implements OnInit {
  @Input() topic!: ITopic;
  showReplies: boolean = false;

  constructor() {}

  ngOnInit(): void {}

  toggleShowReplies(): void {
    this.showReplies = !this.showReplies;
  }
}

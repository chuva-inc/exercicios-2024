import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { ITopic } from 'src/app/interfaces';

@Component({
  selector: 'app-topics',
  templateUrl: './topics.component.html',
  styleUrls: ['./topics.component.scss']
})
export class TopicsComponent implements OnInit {
  @Input() topics!: ITopic[];
  @Output() editTopicClicked = new EventEmitter<{
    id: string;
    subject: string;
    content: string;
  }>();

  constructor() {}

  ngOnInit(): void {}

  editTopic({
    id,
    subject,
    content
  }: {
    id: string;
    subject: string;
    content: string;
  }): void {
    this.editTopicClicked.emit({ id, subject, content });
  }
}

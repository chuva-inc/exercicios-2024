import { Component, OnInit, EventEmitter, Output } from '@angular/core';

@Component({
  selector: 'app-new-topic-discussions',
  templateUrl: './new-topic-discussions.component.html',
  styleUrls: ['./new-topic-discussions.component.scss'],
})
export class NewTopicDiscussionsComponent implements OnInit {
  @Output() newTopicClicked = new EventEmitter<void>();

  constructor() {}

  ngOnInit(): void {}

  onNewTopicClick(): void {
    this.newTopicClicked.emit();
  }
}

import { Component, OnInit, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'topicSending',
  templateUrl: './topic-sending.component.html',
  styleUrls: ['./topic-sending.component.scss'],
})
export class TopicSendingComponent implements OnInit {
  constructor() {}
  @Output() stateChange = new EventEmitter<string>();
  changeStateToEnd() {
    this.stateChange.emit('end');
  }
  ngOnInit(): void {}
}

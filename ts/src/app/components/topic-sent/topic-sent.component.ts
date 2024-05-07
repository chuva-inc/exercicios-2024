import { Component, OnInit, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'topicSent',
  templateUrl: './topic-sent.component.html',
  styleUrls: ['./topic-sent.component.scss'],
})
export class TopicSentComponent implements OnInit {
  constructor() {}
  @Output() stateChange = new EventEmitter<string>();
  changeStateToMid() {
    this.stateChange.emit('mid');
  }
  ngOnInit(): void {}
}

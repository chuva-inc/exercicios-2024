import { Component, OnInit, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'appTopic',
  templateUrl: './topic-default.component.html',
  styleUrls: ['./topic-default.component.scss'],
})
export class TopicDefaultComponent implements OnInit {
  @Output() stateChange = new EventEmitter<string>();
  changeStateToMid() {
    this.stateChange.emit('mid');
  }

  constructor() {}
  ngOnInit(): void {}
}

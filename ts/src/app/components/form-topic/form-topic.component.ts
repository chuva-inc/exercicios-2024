import { Component, EventEmitter, OnInit, Output } from '@angular/core';

@Component({
  selector: 'app-form-topic',
  templateUrl: './form-topic.component.html',
  styleUrls: ['./form-topic.component.scss'],
})
export class FormTopicComponent implements OnInit {
  @Output() topicCreated: EventEmitter<boolean> = new EventEmitter();
  handleCreateTopic(e: Event) {
    this.topicCreated.emit(true);
    e.preventDefault();
    console.log(e);
  }

  constructor() {}

  ngOnInit(): void {}
}

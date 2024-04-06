import { Component, EventEmitter, OnInit, Output } from '@angular/core';

@Component({
  selector: 'app-create-topic',
  templateUrl: './create-topic.component.html',
  styleUrls: ['./create-topic.component.scss'],
})
export class CreateTopicComponent implements OnInit {

  @Output() onSubmitTopic = new EventEmitter();
  constructor() {}

  ngOnInit(): void {}
  sendForm(event: Event) {
    event.preventDefault();
    this.onSubmitTopic.emit();
  }

}

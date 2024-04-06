import { Component, EventEmitter, OnInit, Output } from '@angular/core';

@Component({
  selector: 'app-confirmed-new-topic',
  templateUrl: './confirmed-new-topic.component.html',
  styleUrls: ['./confirmed-new-topic.component.scss'],
})
export class ConfirmedNewTopicComponent implements OnInit {
  @Output() newTopicCreate = new EventEmitter<void>();
  constructor() {}

  ngOnInit(): void {}

  onNewTopicClick(): void {
    this.newTopicCreate.emit();
  }
}

import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-discussions',
  templateUrl: './discussions.component.html',
  styleUrls: ['./discussions.component.scss']
})
export class DiscussionsComponent implements OnInit {

  isCreatingTopic: boolean = false;
  isAwaitingFeedbackTopic: boolean = false;

  constructor() { }

  ngOnInit(): void {
  }

  addTopic() {
    this.isCreatingTopic = true;
  }

  addTopicAwaitingFeedback() {
    this.isAwaitingFeedbackTopic = true;
  }
}

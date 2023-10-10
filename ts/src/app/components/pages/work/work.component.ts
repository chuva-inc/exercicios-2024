import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-work',
  templateUrl: './work.component.html',
  styleUrls: ['./work.component.scss'],
})
export class WorkComponent implements OnInit {
  isExpanded: boolean = false;
  creatingTopic: boolean = false;
  topicSubmitted: boolean = false;

  constructor() {}

  ngOnInit(): void {}

  showMore() {
    this.isExpanded = true;
  }

  createTopic() {
    this.topicSubmitted = false;
    this.creatingTopic = true;
  }

  submitTopic(event: any) {
    event.preventDefault();
    this.creatingTopic = false;
    this.topicSubmitted = true;
  }
}

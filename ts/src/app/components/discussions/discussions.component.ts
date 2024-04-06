import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-discussions',
  templateUrl: './discussions.component.html',
  styleUrls: ['./discussions.component.scss'],
})
export class DiscussionsComponent implements OnInit {
  showNewTopic: boolean = true;
  showForm: boolean = false;
  showConfirmedTopic: boolean = false;

  constructor() {}

  ngOnInit(): void {}

  onNewTopicButtonClick(): void {
    this.showNewTopic = false;
    this.showConfirmedTopic = false;
    this.showForm = true;
  }

  onFormSubmit(): void {
    this.showForm = false;
    this.showConfirmedTopic = true;
  }
}

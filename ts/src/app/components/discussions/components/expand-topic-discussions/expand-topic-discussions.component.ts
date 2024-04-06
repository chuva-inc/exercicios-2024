import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-expand-topic-discussions',
  templateUrl: './expand-topic-discussions.component.html',
  styleUrls: ['./expand-topic-discussions.component.scss'],
})
export class ExpandTopicDiscussionsComponent implements OnInit {
  viewResponse: boolean = false;

  constructor() {}

  ngOnInit(): void {}

  toggleResponse(): void {
    this.viewResponse = !this.viewResponse;
  }
}

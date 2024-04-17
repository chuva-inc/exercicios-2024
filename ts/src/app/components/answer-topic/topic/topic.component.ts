import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-topic',
  templateUrl: './topic.component.html',
  styleUrls: ['./topic.component.scss'],
})
export class TopicComponent implements OnInit {
  isShowingAnswer: boolean = false;
  handleShowAnswer() {
    this.isShowingAnswer = !this.isShowingAnswer;
  }

  constructor() {}

  ngOnInit(): void {}
}

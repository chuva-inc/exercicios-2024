import { Component, OnInit } from '@angular/core';
import { IReply } from '../replies.interface';
import { replies } from '../replies';

@Component({
  selector: 'app-topic',
  templateUrl: './topic.component.html',
  styleUrls: ['./topic.component.scss'],
})
export class TopicComponent implements OnInit {
  replies: IReply[] = replies;

  isShowingAnswer: boolean = false;

  handleShowAnswer() {
    this.isShowingAnswer = !this.isShowingAnswer;
  }

  constructor() {}

  ngOnInit(): void {}
}

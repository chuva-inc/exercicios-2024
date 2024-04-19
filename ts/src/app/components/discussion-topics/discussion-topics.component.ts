import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';

type StepForm = "topic" | "create" | "feedback";

@Component({
  selector: 'app-discussion-topics',
  templateUrl: './discussion-topics.component.html',
  styleUrls: ['./discussion-topics.component.scss']
})

export class DiscussionTopicsComponent implements OnInit {
  stepForm: StepForm = "topic"

  topicForm!: FormGroup;

  constructor() { }

  ngOnInit(): void {
    this.topicForm = new FormGroup({
      subject: new FormControl(''),
      content: new FormControl('')
    })
  }

  get subject() {
    return this.topicForm.get("subject")!;
  }
  get content() {
    return this.topicForm.get("content")!;
  }

  handleShowFormCreateTopic(): void {
    this.stepForm = "create";
  }

  handleSubmitNewTopic() {
    console.log(this.topicForm.value);
    this.stepForm = "feedback";
  }

}

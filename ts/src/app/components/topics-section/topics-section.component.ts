import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';

type StepForm = "topic" | "create" | "feedback";
@Component({
  selector: 'app-topics-section',
  templateUrl: './topics-section.component.html',
  styleUrls: ['./topics-section.component.scss']
})
export class TopicsSectionComponent implements OnInit {
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
    console.log(this.topicForm.value)
  }
}

import { Component, OnInit, Input } from '@angular/core';
import { ITopic } from 'src/app/interfaces';
import { FormGroup, FormControl } from '@angular/forms';

@Component({
  selector: 'app-discussions',
  templateUrl: './discussions.component.html',
  styleUrls: ['./discussions.component.scss']
})
export class DiscussionsComponent implements OnInit {
  @Input() topics!: ITopic[];
  formIsVisible: boolean = false;
  formBeenSubmitted: boolean = false;
  form = new FormGroup({
    subject: new FormControl(''),
    content: new FormControl('')
  });

  constructor() {}

  ngOnInit(): void {}

  createTopic() {
    this.formIsVisible = true;
    this.formBeenSubmitted = false;
  }

  onSubmit(): void {
    const { content, subject } = this.form.value;
    console.log({ content, subject });
    if (!content || !subject) return;

    this.addTopic({ content, subject });
    this.formIsVisible = false;
    this.formBeenSubmitted = true;
  }

  addTopic({ content, subject }: { subject: string; content: string }): void {
    this.topics.push({
      subject,
      content,
      id: Math.random().toString(),
      author: 'Alguém',
      likes: [],
      replies: []
    });
  }
}

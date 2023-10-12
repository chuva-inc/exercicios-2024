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
  formTopicId: string | null = null;

  constructor() {}

  ngOnInit(): void {}

  createTopic() {
    this.formIsVisible = true;
    this.formBeenSubmitted = false;
  }

  enableTopicEditing(id: string, subject: string, content: string) {
    console.log('enableTopicEditing called');
    this.formIsVisible = true;
    this.formBeenSubmitted = false;
    console.log(this.formIsVisible, this.formBeenSubmitted);

    this.formTopicId = id;
    this.form.controls.subject.setValue(subject);
    this.form.controls.content.setValue(content);
  }

  onSubmit(): void {
    const { content, subject } = this.form.value;
    if (content === undefined || subject === undefined) return;
    if (content === null || subject === null) return;

    this.addOrUpdateTopic({ content, subject }, this.formTopicId);
    this.formIsVisible = false;
    this.formTopicId = null;
    this.formBeenSubmitted = true;
  }

  addOrUpdateTopic(
    { content, subject }: { subject: string; content: string },
    id: string | null
  ): void {
    if (id) {
      const updatedTopics = this.topics.map((topic) => {
        if (topic.id === id) {
          (topic.content = content), (topic.subject = subject);
        }
        return topic;
      });
      this.topics = [...updatedTopics];
    } else {
      this.topics.unshift({
        subject,
        content,
        id: Math.random().toString(),
        author: 'Alguém',
        likes: [],
        replies: [],
        status: 'pending'
      });
    }
  }
}

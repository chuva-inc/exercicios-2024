import { Component, OnInit } from '@angular/core';
import Discussion from 'src/interfaces/Discussion';
import DiscussionForm from 'src/interfaces/DiscussionForm';

@Component({
  selector: 'app-discussion',
  templateUrl: './discussion.component.html',
  styleUrls: ['./discussion.component.scss'],
})
export class DiscussionComponent implements OnInit {
  showForm: boolean;
  showInitials: boolean;
  showGreetings: boolean;

  form: DiscussionForm = {
    subject: '',
    content: '',
  };

  discussionIcons = [
    'assets/icons/discussion/handflower.svg',
    'assets/icons/discussion/conversation.svg',
    'assets/icons/discussion/idea.svg',
  ];

  discussions: Discussion[] = [
    {
      title: 'Assunto da pergunta aparece aqui',
      author: 'Carlos Henrique Santos',
      content:
        'Comecinho da pergunta aparece aqui resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo...',
      likes: 1,
      responses: 1,
    },
    {
      title: 'Assunto da pergunta aparece aqui',
      author: 'Carlos Henrique Santos',
      content:
        'Comecinho da pergunta aparece aqui resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo...',
      likes: 1,
      responses: 1,
    },
  ];

  constructor() {
    this.showForm = false;
    this.showInitials = true;
    this.showGreetings = false;
  }

  ngOnInit(): void {}

  toggleShowForm() {
    this.showInitials = false;
    this.showGreetings = false;
    this.showForm = true;
  }

  toggleShowInitials() {
    this.showInitials = true;
    this.showGreetings = false;
    this.showForm = false;
  }

  toggleShowGreetings() {
    this.showInitials = false;
    this.showGreetings = true;
    this.showForm = false;
  }

  toggleForm() {
    this.showForm = !this.showForm;
  }

  submitForm() {
    this.toggleShowGreetings();
    this.discussions.unshift({
      title: this.form.subject,
      author: 'Carlos Henrique Santos',
      content: this.form.content,
      likes: 0,
      responses: 0,
      waiting: true,
    });
  }
}

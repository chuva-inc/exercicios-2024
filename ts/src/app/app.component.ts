import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})
export class AppComponent {
  title = 'DevChuva';
  isExpanded: boolean = false;
  isExpandedAnswered: boolean = false;
  showComments: boolean = false;
  showForm: boolean = false;
  showIdeas = true;
  showFeedback = false;

  toggleExpand() {
    this.isExpanded = !this.isExpanded;
  }

  toggleExpandAnswered() {
    this.isExpandedAnswered = !this.isExpandedAnswered;
    this.showComments = !this.showComments;
  }

  toggleForm() {
    this.showForm = !this.showForm;
    this.showIdeas = !this.showIdeas;
  }
 
  submitForm(event: Event): void {
    event.preventDefault();
      this.toggleFeedback();
  }

  toggleFeedback() {
    this.showForm = !this.showForm;
    this.showFeedback = !this.showFeedback;
  }
}

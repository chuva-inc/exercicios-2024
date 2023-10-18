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
}

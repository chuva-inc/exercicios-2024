import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})
export class AppComponent {
  hasStartedToCreateATopic: boolean = false;
  isCreatingTopic: boolean = false;
  isTopicSubmitted: boolean = false;
  isShowingFullResume: boolean = false;

  toggleFullResume(): void {
    this.isShowingFullResume = !this.isShowingFullResume;
  }

  handleStartCreatingTopic() {
    this.isCreatingTopic = true;
    this.hasStartedToCreateATopic = true;
  }

  handleCreateTopic(status: boolean) {
    this.isCreatingTopic = false;
    this.isTopicSubmitted = status;
  }
}

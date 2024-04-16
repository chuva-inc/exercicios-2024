import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})
export class AppComponent {
  isShowingFullResume: boolean = false;

  toggleFullResume(): void {
    console.log(this.isShowingFullResume);

    this.isShowingFullResume = !this.isShowingFullResume;
  }
}

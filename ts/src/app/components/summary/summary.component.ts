import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-summary',
  templateUrl: './summary.component.html',
  styleUrls: ['./summary.component.scss'],
})
export class SummaryComponent implements OnInit {
  viewAllText: boolean = false;
  removeText: boolean = false;

  constructor() {}

  ngOnInit(): void {}

  showAllText(): void {
    this.viewAllText = true;

    if (this.viewAllText) {
      this.removeText = true;
    }
  }
}

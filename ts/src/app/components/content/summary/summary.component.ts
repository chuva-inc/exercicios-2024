import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-summary',
  templateUrl: './summary.component.html',
  styleUrls: ['./summary.component.scss'],
})
export class SummaryComponent implements OnInit {
  showFullSummary: boolean;
  constructor() {
    this.showFullSummary = false;
  }

  ngOnInit(): void {}

  toggleSummary() {
    this.showFullSummary = !this.showFullSummary;
  }
}

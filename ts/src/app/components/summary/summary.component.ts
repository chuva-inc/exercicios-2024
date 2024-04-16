import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-summary',
  templateUrl: './summary.component.html',
  styleUrls: ['./summary.component.scss']
})
export class SummaryComponent implements OnInit {
  showFullText: boolean = false;

  constructor() { }

  ngOnInit(): void {
  }

  toggleSummary(): void {
    this.showFullText = !this.showFullText;
  }

  showsLessSummary(): void {
    this.showFullText = false;
  }

}

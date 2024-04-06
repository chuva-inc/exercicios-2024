import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-summary',
  templateUrl: './summary.component.html',
  styleUrls: ['./summary.component.scss']
})
export class SummaryComponent implements OnInit {
  showAllSummary: boolean = false;

  constructor() { }

  ngOnInit(): void {
  }

  handleShowSummary(): void {
    this.showAllSummary = true;
  }

}

import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-summary',
  templateUrl: './summary.component.html',
  styleUrls: ['./summary.component.scss']
})
export class SummaryComponent implements OnInit {
  @Input() summary!: string[];
  isExpanded: boolean = false;
  fullSummary: string = '';

  constructor() {}

  ngOnInit(): void {
    this.fullSummary = this.summary.join(' ');
  }

  toggleExpanded() {
    this.isExpanded = !this.isExpanded;
  }
}

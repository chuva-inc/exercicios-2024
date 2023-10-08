import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-work',
  templateUrl: './work.component.html',
  styleUrls: ['./work.component.scss'],
})
export class WorkComponent implements OnInit {
  isExpanded: boolean = false;

  constructor() {}

  ngOnInit(): void {}

  showMore() {
    this.isExpanded = true;
  }
}

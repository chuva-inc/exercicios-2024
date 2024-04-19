import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-section-topics',
  templateUrl: './section-topics.component.html',
  styleUrls: ['./section-topics.component.scss']
})
export class SectionTopicsComponent implements OnInit {
  showAllTopic: boolean = false;

  constructor() { }

  ngOnInit(): void {
  }

  handleShowAllTopic(event: Event): void {
    event.stopPropagation();
    this.showAllTopic = !this.showAllTopic;
  }

}

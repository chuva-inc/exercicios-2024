import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-topics-section',
  templateUrl: './topics-section.component.html',
  styleUrls: ['./topics-section.component.scss']
})
export class TopicsSectionComponent implements OnInit {
  showFormCreateTopic: boolean = true; // TODO: Deixar como false

  constructor() { }

  ngOnInit(): void {
  }

  handleShowFormCreateTopic(): void {
    this.showFormCreateTopic = true;
  }
}

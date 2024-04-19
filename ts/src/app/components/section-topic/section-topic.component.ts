import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-section-topic',
  templateUrl: './section-topic.component.html',
  styleUrls: ['./section-topic.component.scss'],
})
export class SectionTopicComponent implements OnInit {
  @Input()
  title: string = 'Section Topic';

  constructor() {}

  ngOnInit(): void {}
}

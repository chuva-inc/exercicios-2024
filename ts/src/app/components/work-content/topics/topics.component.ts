import { Component, Input, OnInit } from '@angular/core';
import { ITopic } from 'src/app/interfaces';

@Component({
  selector: 'app-topics',
  templateUrl: './topics.component.html',
  styleUrls: ['./topics.component.scss']
})
export class TopicsComponent implements OnInit {
  @Input() topics!: ITopic[];
  showReplies: boolean = false;

  constructor() {}

  ngOnInit(): void {}

  toggleShowReplies(): void {
    this.showReplies = !this.showReplies;
  }
}

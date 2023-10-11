import { Component, OnInit, Input } from '@angular/core';
import { IWorkIntroduction } from 'src/app/interfaces';

@Component({
  selector: 'app-introduction',
  templateUrl: './introduction.component.html',
  styleUrls: ['./introduction.component.scss']
})
export class IntroductionComponent implements OnInit {
  @Input() workIntroduction!: IWorkIntroduction;
  constructor() {}

  ngOnInit(): void {}
}

import { Component, Input, OnInit } from '@angular/core';
import { IWork } from 'src/app/interfaces';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {
  @Input() annals!: IWork['annals'];

  constructor() {}

  ngOnInit(): void {}
}

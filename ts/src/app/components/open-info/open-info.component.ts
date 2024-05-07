import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'openInfo',
  templateUrl: './open-info.component.html',
  styleUrls: ['./open-info.component.scss'],
})
export class OpenInfoComponent implements OnInit {
  @Input() name?: string;
  @Input() hierarchy: string = '';
  @Input() response: string = '';

  constructor() {}

  ngOnInit(): void {}
}

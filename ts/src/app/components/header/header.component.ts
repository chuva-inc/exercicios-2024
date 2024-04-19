import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss'],
})
export class HeaderComponent implements OnInit {
  email: string = 'alguem12@galoascience.com';
  notifications: number = 2;

  constructor() {}

  ngOnInit(): void {}
}

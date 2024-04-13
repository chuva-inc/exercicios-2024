import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss'],
})
export class HeaderComponent implements OnInit {
  globeIcon: string = 'assets/icons/globe.svg';
  caretDownIcon: string = 'assets/icons/caret-down.svg';

  personPhoto: string = 'assets/images/person.jfif';
  email: string = 'alguem12@galoascience.com';

  constructor() {}

  ngOnInit(): void {}
}

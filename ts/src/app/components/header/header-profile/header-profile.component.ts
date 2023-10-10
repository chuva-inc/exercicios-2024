import { Component, OnInit } from '@angular/core';
import { IUser } from 'src/app/interfaces';

@Component({
  selector: 'app-header-profile',
  templateUrl: './header-profile.component.html',
  styleUrls: ['./header-profile.component.scss']
})
export class HeaderProfileComponent implements OnInit {
  user!: IUser;

  constructor() {}

  ngOnInit(): void {
    this.user = {
      id: 'user-id',
      email: 'alguem12@galoascience.com',
      name: 'Alguém',
      photoUrl: '/assets/images/user-photo.png'
    };
  }
}

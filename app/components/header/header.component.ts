import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
  }

  something_location_type = 'Anais do Simpósio Latino Americano de Ciências de Alimentos ';
  anais_gen = 'Anais do 13º Simpósio Latino Americano de Ciência de Alimentos';
  issn = 'ISSN: 1234-5678';
  language = 'PT, BR';
  email = 'alguem12@galoascience.com';
  notification_num = '2';
  profile_pic = 'https://cdn.vox-cdn.com/thumbor/D0IW6uvF5w5nKYL-jVdUp9kZAlE=/0x0:3600x2024/1200x800/filters:focal(2002x960:2578x1536)/cdn.vox-cdn.com/uploads/chorus_image/image/72617394/Sequence_03.00_57_44_18.Still001RC.0.jpg'

}

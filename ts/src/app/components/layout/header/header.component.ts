import { Component} from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent{

  email = "alguem12@galoascience.com";
  valorRecebido = 2;

  constructor() { }
}

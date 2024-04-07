import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './components/app.component.html', 
  styleUrls: ['./app.component.scss', '../styles.scss']
})
export class AppComponent {
[x: string]: any;
  title = 'DevChuva';
  logoimage:string = './components/assets/logo.png';
  
}

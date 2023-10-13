import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'DevChuva';

mostrar(el: string): void{
  const element = document.getElementById(el);
  if  (element){
    element.style.display = 'block';
  }
}
aumentar(el: string): void{
  const element = document.getElementById(el);
  if(element){
    element.style.height = '466px';
  }
}
sumir(el: string): void{
  const element = document.getElementById(el);
  if (element) {
    element.style.display = 'none';
  }
  }
heightcom(el: string): void{
  const element = document.getElementById(el);
  if(element){
    element.style.height = '969px';
  }
}
heightdisc(el: string): void{
  const element = document.getElementById(el);
  if(element){
    element.style.height = '1050px';
  }
}

}




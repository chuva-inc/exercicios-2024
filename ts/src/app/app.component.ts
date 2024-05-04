import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})
export class AppComponent {
  title = 'SLACA 2019';
  arrayOptions = [
    'Apresentação',
    'Comitês',
    'Autores',
    'Eixos temáticos',
    'Trabalhos',
    'Contato',
  ];

  selectedItem: number | null = null; // selectedItem pode ser um number ou null

  selectItem(index: number) {
    this.selectedItem = index;
  }
}

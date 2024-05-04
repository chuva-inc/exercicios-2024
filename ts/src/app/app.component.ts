import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})
export class AppComponent {
  titleSideMenu = 'SLACA 2019';
  arrayOptions = [
    'Apresentação',
    'Comitês',
    'Autores',
    'Eixos temáticos',
    'Trabalhos',
    'Contato',
  ];
  firstTitleHeader =
    'Anais do Simpósio Latino Americano de Ciências de Alimentos';
  titleHeader =
    'Anais do 13º Simpósio Latino Americano de Ciência de Alimentos';
  issn = '2526-4806';

  selectedItem: number | null = null; // selectedItem pode ser um number ou null

  selectItem(index: number) {
    this.selectedItem = index;
  }
}

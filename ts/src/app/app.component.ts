import { Component } from '@angular/core';
import { faGlobe } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})
export class AppComponent {
  faCoffee = faGlobe;
  titleSideMenu = 'SLACA 2019';
  optionsSideMenu = [
    { id: 1, label: 'Apresentação' },
    { id: 2, label: 'Comitês' },
    { id: 3, label: 'Autores' },
    { id: 4, label: 'Eixos temáticos' },
    { id: 5, label: 'Trabalhos' },
    { id: 6, label: 'Contato' },
  ];
  headerData = {
    firstTitleHeader:
      'Anais do Simpósio Latino Americano de Ciências de Alimentos',
    titleHeader:
      'Anais do 13º Simpósio Latino Americano de Ciência de Alimentos',
  };
  issn = '2526-4806';
  languages = [
    { id: 1, label: 'PT, BR' },
    { id: 2, label: 'EN, US' },
    { id: 3, label: 'ES, ES' },
  ];
  emailUser = 'alguem12@galoascience.com';
  notificationNoRead = 0;
  selectedItemMenu = 0;
  selectedLanguages = 1;
  titlePage =
    'Análise sensorial de preparações funcionais desenvolvidas para escolares entre 09 e 15 anos, do município de Campinas/SP ';

  ngOnInit() {
    this.notificationNumber();
    this.selectedItemMenu = 5;
  }

  selectLanguage(itemId: number) {
    this.selectedLanguages = itemId;
  }

  selectItemMenu(itemId: number) {
    this.selectedItemMenu = itemId;
  }

  notificationNumber(notification: number = 2) {
    this.notificationNoRead += notification;
  }

  findData() {}
}

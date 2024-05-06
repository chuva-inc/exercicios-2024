import { Component } from '@angular/core';
import { faGlobe, faDownload, faStar } from '@fortawesome/free-solid-svg-icons';
import { faStar as faStarRegular } from '@fortawesome/free-regular-svg-icons';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})
export class AppComponent {
  faGlobe = faGlobe;
  faDownload = faDownload;
  faStar = faStar;
  faStarRegular = faStarRegular;

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
  videoData = {
    titleVideo:
      'Análise sensorial de preparações funcionais desenvolvidas para escolares entre 09 e 15 anos, do município de Campinas/SP ',
    authorName: 'Beatriz Christiane Melo',
    authorLocalization: 'FCA / Universidade Estadual de Campinas',
  };
  citacaoFavorita = true;
  detalhesTrabalho = [
    {
      id: 1,
      label: 'Tipo de Apresentação',
      response: 'Pôster',
    },
    {
      id: 2,
      label: 'Eixo Temático',
      response: 'Alimentação e saúde (AS)',
    },
    {
      id: 3,
      label: 'Palavras Chaves',
      response: 'Alimentos funcionais, alimentação escolar',
    },
  ];
  autores = [
    {
      id: 1,
      name: 'Galileo Galilei',
      number: 1,
    },
    {
      id: 2,
      name: 'Berta Lange de Morretes',
      number: 2,
    },
    {
      id: 3,
      name: 'Isaac Newton',
      number: 3,
    },
    {
      id: 4,
      name: 'Cesar Lattes',
      number: 1,
    },
    {
      id: 5,
      name: 'Stephen Hawking',
      number: 4,
    },
  ];

  universidades = [
    {
      id: 1,
      universidadeName: 'Universidade Estadual de Campinas',
      universidadeNumber: 1,
    },
    {
      id: 2,
      universidadeName: 'Universidade de São Paulo',
      universidadeNumber: 2,
    },
    {
      id: 3,
      universidadeName: 'Instituto Nacional de Pesquisas Espaciais',
      universidadeNumber: 3,
    },
    {
      id: 4,
      universidadeName: 'Universidade Federal do Rio de Janeiro',
      universidadeNumber: 4,
    },
  ];
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

  handleFavoritarCitacao(citacao: boolean) {
    this.citacaoFavorita = !this.citacaoFavorita;
  }

  findData() {}
}

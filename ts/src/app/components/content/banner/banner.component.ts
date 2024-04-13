import { Component, OnInit } from '@angular/core';
import ButtonIcon from 'src/interfaces/ButtonIcon';

@Component({
  selector: 'app-banner',
  templateUrl: './banner.component.html',
  styleUrls: ['./banner.component.scss'],
})
export class BannerComponent implements OnInit {
  videoBackground: string = 'assets/images/video.png';
  authorIcon: string = 'assets/images/author.png';

  buttonIcons: ButtonIcon[] = [
    {
      label: 'Download',
      alt: 'Download icon',
      path: 'assets/icons/download.svg',
      col: 'col-lg-6 col-md-4',
    },
    {
      path: 'assets/icons/star.svg',
      alt: 'Star icon',
      col: 'col-lg-2 col-md-4',
    },
    {
      path: 'assets/icons/doi.png',
      alt: 'DOI icon',
      col: 'col-lg-2 col-md-4',
    },
  ];

  detailsCard = {
    type: 'Pôster',
    axis: 'Alimentação e saúde (AS)',
    keywords: ['Alimentos funcionais', 'alimentação escolas'],
    authors: [
      'Galileo Galilei¹',
      'Berta Lange de Morretes²',
      'Isaac Newton³',
      'Cesar Lattes¹',
      'Stephen Hawking⁴',
    ],
    universities: [
      '¹Universidade Estadual de Campinas',
      '²Universidade de São Paulo',
      '³Instituto Nacional de Pesquisas Espaciais',
      '⁴Universidade Federal do Rio de Janeiro',
    ],
  };

  constructor() {}

  ngOnInit(): void {}
}

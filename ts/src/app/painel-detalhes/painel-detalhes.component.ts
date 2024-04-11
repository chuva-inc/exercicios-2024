import { Component, OnInit } from '@angular/core';
import { Detalhes } from '../modules/mockDetalhes';

@Component({
  selector: 'app-painel-detalhes',
  templateUrl: './painel-detalhes.component.html',
  styleUrls: ['./painel-detalhes.component.scss']
})
export class PainelDetalhesComponent implements OnInit {

  detalhes: Detalhes;

  autores: string[] = [
    'Galileo Galilei¹',
    'Berta Lange de Morretes²',
    'Isaac Newton³',
    'Cesar Lattes⁴',
    'Stephen Hawking⁵'
  ];

  universidades: string[] = [
    '¹Universidade Estadual de Campinas',
    '²Universidade de São Paulo',
    '³Instituto Nacional de Pesquisas Espaciais',
    '⁴Universidade Federal do Rio de Janeiro'
  ];

  constructor() {
    this.detalhes = new Detalhes(
      'Pôster',
      'Alimentação e Saúde (AS)',
      [
        'Alimentos funcionais', 
        ' alimentação escolar'
      ]
    );
   }

  ngOnInit(): void {
  }

}

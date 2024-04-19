import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-video-details',
  templateUrl: './video-details.component.html',
  styleUrls: ['./video-details.component.scss']
})
export class VideoDetailsComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
  }

  title = 'Análise sensorial de preparações funcionais desenvolvidas para escolares entre 09 e 15 anos, do município de Campinas/SP';
  type_presentation = 'Pôster'
  thematic_axis = 'Alimentação e saúde (AS)'
  
  key_words = ['Alimentos funcionais', 'alimentação escolar']

  autores = [
    'Galileo Galilei¹',
    'Berta Lange de Morretes²',
    'Isaac Newton³',
    'Cesar Lattes¹',
    'Stephen Hawking⁴'
  ]
  locais = [
    '¹Universidade Estadual de Campinas',
    '²Universidade de São Paulo',
    '³Instituto Nacional de Pesquisas Espaciais',
    '⁴Universidade Federal do Rio de Janeiro'
  ]
}

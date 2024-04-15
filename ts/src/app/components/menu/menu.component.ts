import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.scss'],
})
export class MenuComponent implements OnInit {
  menuItems = [
    { nome: 'Apresentação', isSelected: false },
    { nome: 'Comitês', isSelected: false },
    { nome: 'Autores', isSelected: false },
    { nome: 'Eixos temáticos', isSelected: false },
    { nome: 'Trabalhos', isSelected: true },
    { nome: 'Contato', isSelected: false },
  ];

  constructor() {}

  ngOnInit(): void {}
}

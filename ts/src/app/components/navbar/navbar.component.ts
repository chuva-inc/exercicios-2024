import { Component, OnInit } from '@angular/core';
import NavLink from 'src/interfaces/NavLink';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.scss'],
})
export class NavbarComponent implements OnInit {
  logo: string = 'assets/images/logo.png';

  links: NavLink[] = [
    {
      path: '/',
      label: 'Apresentação',
    },
    {
      path: '/comites',
      label: 'Comitês',
    },
    {
      path: '/autores',
      label: 'Autores',
    },
    {
      path: '/eixos-tematicos',
      label: 'Eixos Temáticos',
    },
    {
      path: '/trabalhos',
      label: 'Trabalhos',
      active: true,
    },
    {
      path: '/contato',
      label: 'Contato',
    },
  ];

  constructor() {}

  ngOnInit(): void {}
}

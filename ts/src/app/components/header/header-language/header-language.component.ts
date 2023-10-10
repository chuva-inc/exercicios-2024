import { Component, OnInit } from '@angular/core';
import { ILanguage } from 'src/app/interfaces';

@Component({
  selector: 'app-header-language',
  templateUrl: './header-language.component.html',
  styleUrls: ['./header-language.component.scss']
})
export class HeaderLanguageComponent implements OnInit {
  currentLanguage: ILanguage = 'pt-BR';

  constructor() {}
  ngOnInit(): void {}
}

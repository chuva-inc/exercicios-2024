import { Component, OnInit } from '@angular/core';
import { ITopic } from 'src/app/ITopic';

@Component({
  selector: 'app-card',
  templateUrl: './card.component.html',
  styleUrls: ['./card.component.scss'],
})
export class CardComponent implements OnInit {
  topic: ITopic = {
    subject: 'Assunto da pergunta aparece aqui',
    author: 'Carlos Henrique Santos',
    phrase:
      'Comecinho da pergunta aparece aqui resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo...',
    likes: 1,
    answers: 1,
  };

  constructor() {}

  ngOnInit(): void {}
}

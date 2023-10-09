import { Component, Input, OnInit } from '@angular/core';
import { IComment } from 'src/app/IComment';
import { ITopic } from 'src/app/ITopic';

@Component({
  selector: 'app-card',
  templateUrl: './card.component.html',
  styleUrls: ['./card.component.scss'],
})
export class CardComponent implements OnInit {
  isExpanded: boolean = false;
  @Input() commentsOn: boolean = false;

  @Input() topic: ITopic = {
    subject: 'Assunto da pergunta aparece aqui',
    author: 'Carlos Henrique Santos',
    phrase:
      'Comecinho da pergunta aparece aqui resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo...',
    likes: 1,
    answers: 1,
  };

  comments: IComment[] = [
    {
      isAuthor: true,
      isCoAuthor: false,
      name: 'Adriano da Silva',
      comment:
        'Resposta do autor é aqui. Relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo.',
    },
    {
      isAuthor: false,
      isCoAuthor: false,
      name: 'Carlos Henrique Santos',
      comment:
        'Consegui entender melhor agora! Parece que a variação da análise da dimensão e impacto de processo formativo situado impacto de processo formativo. <br><br>Obrigada pela resposta, muito interessante o seu trabalho!',
    },
    {
      isAuthor: false,
      isCoAuthor: true,
      name: 'Carmila Ferreira Andrade',
      comment:
        'Também ínteressante lembrar que o relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo.<br><br> Situado impacto de processo formativo processo resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo.',
    },
    {
      isAuthor: false,
      isCoAuthor: true,
      name: 'Ana Carolina',
      comment:
        'Resposta do autor é aqui. Relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo.',
    },
  ];

  constructor() {}

  ngOnInit(): void {}
}

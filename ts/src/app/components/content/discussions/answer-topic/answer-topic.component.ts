import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-answer-topic',
  templateUrl: './answer-topic.component.html',
  styleUrls: ['./answer-topic.component.scss']
})
export class AnswerTopicComponent implements OnInit {

  comments = [
    {
      author: 'Adriano da Silva',
      role: 'Autor',
      text: 'Resposta do autor é aqui. Relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo.',
    },
    {
      author: 'Carlos Henrique Santos',
      role: null,
      text: 'Consegui entender melhor agora! Parece que a variação da análise da dimensão e impacto de processo formativo situado impacto de processo formativo. <br> Obrigada pela resposta, muito interessante o seu trabalho!',
    },
    {
      author: 'Carmila Ferreira Andrade',
      role: 'Coautor',
      text: 'Também ínteressante lembrar que o relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo. <br>Situado impacto de processo formativo processo resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo.',
    },
    {
      author: 'Ana Carolina',
      role: 'Coautor',
      text: 'Resposta do autor é aqui. Relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo.',
    },
  ]
  constructor() { }

  ngOnInit(): void {
  }

}

import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-comment-answear',
  templateUrl: './comment-answear.component.html',
  styleUrls: ['./comment-answear.component.scss']
})
export class CommentAnswearComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
  }

  @Input() comment: any;

  //owners_question = 'Adriano da Silva'
  //text = 'Resposta do autor é aqui. Relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo.'
  //owner_status='Autor'
  bgColor = ''


  getStyle() {
    let style = {
      // Estilos padrão
      'border': '1px solid #E7E7E7',
      'margin-left': '20px',
      'margin-right': '20px',
      'padding': '10px',
      'text-align': 'left',
      // Estilos condicionais
      'background-color': this.comment.owner_status === '' ? '' : '#E7E7E7'
    };
    return style;
  }
}

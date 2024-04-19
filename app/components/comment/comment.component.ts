import { Component, OnInit, Input } from '@angular/core';
import { SharedService } from './../../shared.service-create-comment'

@Component({
  selector: 'app-comment',
  templateUrl: './comment.component.html',
  styleUrls: ['./comment.component.scss']
})
export class CommentComponent implements OnInit {

  constructor( public sharedService: SharedService ) { }

  ngOnInit(): void {
  }
  @Input() comment_status: any;
  
  question_subject = 'Assunto da pergunta aparece aqui';
  owners_question = 'Carlos Henrique Santos';
  question = 'Comecinho da pergunta aparece aqui resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo...';
  num_likes = 4;
  answearsDisplay = 'none';

  commentsList = [
    {
      owner: "Adriano da Silva",
      text: "Resposta do autor é aqui. Relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo.",
      owner_status: "Autor",
    },
    {
      owner: "Carlos Henrique Santos",
      text: "Consegui entender melhor agora! Parece que a variação da análise da dimensão e impacto de processo formativo situado impacto de processo formativo.Obrigada pela resposta, muito interessante o seu trabalho! ",
      owner_status: ""
    },
    {
      owner: "Carmila Ferreira Andrade",
      text: "Também ínteressante lembrar que o relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo.Situado impacto de processo formativo processo resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo.",owner_status: "Coautor"
    },
    {
      owner: "Ana Carolina",
      text: "Resposta do autor é aqui. Relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo.",
      owner_status: "Coautor"
    },
  ]
  
  num_answears = this.commentsList.length;
  liked = false

  showAnswears(){
    if(this.answearsDisplay == 'none'){
      this.answearsDisplay = 'block'
    }else{
      this.answearsDisplay = 'none'
    }
  }
  giveLike(){
    if(this.liked){
      this.liked = false
      this.num_likes = this.num_likes - 1
    }else{
      this.liked = true
      this.num_likes = this.num_likes + 1
    }
  }
}

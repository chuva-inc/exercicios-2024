import { Component } from '@angular/core';
import { Textos } from './textos';

interface Comentarios{
  contribuiente:string;
  relevancia?:string;
  texto:string;
}

@Component({
  selector: 'app-content',
  templateUrl: './content.component.html',
  styleUrls: ['./content.component.scss']
})
export class ContentComponent {
  textoDestalhes = '';
  textoResumo = '';
  btnShowMore = "ver mais";
  pontos:any;
  maisTexto:any;
  mostrarComentarios = false;
  openForm = 0;
  topicoSubmit = false;
  comentarios:Comentarios[] = [
    {contribuiente:'Adriano da Silva', relevancia:'Autor', 
      texto:`Resposta ao autor é aqui. Relato 
    inscreve-se no campo da análise da dimensão e impacto de processo formativo processo resente relato 
    inscreve-se no campo da análise da dimensão e impocto de processo formativo situado impascto de processo formativo processo.`},

    {contribuiente:'Carlos Henrique Santos', 
      texto:`Consegui entender melhor agora! 
    Parece que a variação da análise da dimensão e impacto de processo formativo sitado impacto de processo formativo.\n\n
    Obrigado pela resposta, muito interessante o seu trabalho!`},

    {contribuiente:'Carmila Ferreira Andrade', relevancia:'Coautor', 
      texto:`Também ínteressante lembrar que o relato inscreve-se no campo
     da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo resente relato inscreve-se no campo
      da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo.\n\n
      Situado impacto de processo formativo processo resente relato inscreve-se no campo da análise da dimensão 
      e impacto de processo formativo situaddo impacto de processo formativo processo.`,},
      
    {contribuiente:'Ana Carolina', relevancia:'Coautor', 
      texto:`Resposta do autor é aqui. Relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado 
      impacto de processo formativo processo resente relato inscreve-se no campo da análise da dimensão e 
      impacto de processo formativo situado impacto de processo formativo processo.`}
  ];
  
  constructor(private textos:Textos){
    this.textoResumo = this.textos.resumo;
  }

  public showMore(){
    this.pontos = document.getElementById("pontos");
    this.maisTexto = document.getElementById("mais")
    if(this.pontos.style.display == "none"){
      this.pontos.style.display = "inline";
      this.maisTexto.style.display = "none";
      this.btnShowMore = "ver mais";
    }else{
      this.pontos.style.display = "none";
      this.maisTexto.style.display = "inline";
      this.btnShowMore = ""
    }
  }
  public showComentarios(){
    this.mostrarComentarios = !this.mostrarComentarios;
  }

  public showRelevancia(relevancia:any){
    if(!relevancia || relevancia == '')
      return false;
    return true;
  }

  public criarTopico(){
    this.openForm = 1;
  }
  
  public submit(){
    this.closeForm();
  }

  public closeForm(){
    this.openForm = 2;
  }

  criarNovoTopico(){
    this.openForm = 1
  }
}

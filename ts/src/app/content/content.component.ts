import { Component, OnInit } from '@angular/core';
import { event } from 'cypress/types/jquery';


@Component({
  selector: 'app-content',
  templateUrl: './content.component.html',
  styleUrls: ['./content.component.scss']
})

export class ContentComponent implements OnInit {

  public ativado: boolean = false;
  public textoVisivel: boolean = false; // Flag to track full text visibility
  public comentarioVisivel: boolean = false;
  public formGroup: any;
  public formulario_ativo: boolean = false;
  public formulario_desativado: boolean = true;
  public seu_topico_foi_enviado: boolean = false


  constructor() { }

  ngOnInit(): void {
  }

  AtivarBotao() {
    this.ativado = !this.ativado;
    this.textoVisivel = !this.textoVisivel;
  }

  AtivarBotao2() {
    this.ativado = !this.ativado;
    this.comentarioVisivel = !this.comentarioVisivel;
  }

  limparPlaceholder(event: any) {
    const input = event.target as HTMLInputElement;
    if (input.placeholder === "Defina um tópico sucinto para notificar os autores...") {
      input.placeholder = "";
    }
  }

  ativar_formulario() {
    this.formulario_ativo = !this.formulario_ativo;
  }

  onSubmit(event: Event) {
    event.preventDefault();
  }

  formulario_nao_aparece() {
    this.formulario_desativado = false;
    console.log('funcionou');
    console.log(this.formulario_desativado)
    this.seu_topico_foi_enviado = true;
  }

  criar_novo_topico() {
    this.formulario_ativo = true;
    this.formulario_desativado = true;
    this.seu_topico_foi_enviado = false;
  }

}

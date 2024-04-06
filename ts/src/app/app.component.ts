import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'DevChuva';
  isExpanded: boolean = false;
  showFormulario: boolean = false;
  mostrarMensagemSucesso: boolean = false;
  mostrarMensagemAguardandoFeedback: boolean = false;
  mostrarNovoTopico: boolean = false;
  mostrarComentario: boolean = false;

  toggleExpand() {
    this.isExpanded = !this.isExpanded;
  }

  toggleFormulario() {
    this.showFormulario = !this.showFormulario;
  }

  enviarFormulario(): void {
    this.showFormulario = false;
    this.mostrarMensagemSucesso = true;
    this.mostrarMensagemAguardandoFeedback = true;
    this.mostrarNovoTopico = true;
  }

  toggleComments() {
    this.mostrarComentario = !this.mostrarComentario;
  }


}

import { style } from '@angular/animations';
import { Component } from '@angular/core';
import { event } from 'cypress/types/jquery';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'DevChuva';
  // esconde a faz aparecer alguns elementos
  visi = "none";
  butvisi = "flex";
  respostas = "block"
  adctopi = "none";
  remov = "block";
  img = "block";
  but = "";
  aler = "none";
  lin = "none";

  esconder() {
    if (this.visi === 'none' || this.butvisi === 'flex') {
      this.visi = 'block';
      this.butvisi = 'none';
    } else {
      this.visi = 'none';
      this.butvisi = 'flex';
    }
  }
  pergu() {
    if (this.respostas === 'block') {
      this.respostas = 'none';
    }
    else {
      this.respostas = 'block';
    }
  }

  addtop() {
    let p1 = <HTMLParagraphElement>document.getElementById('p1');
    p1.innerHTML = 'Tem uma dúvida ou sugestão? Compartilhe seu feedback com os autores!';
    if (this.remov === "block" || this.adctopi === "none") {
      this.remov = "none"
      this.adctopi = "flex"
      this.but = "none"
      this.img = "none"
      this.lin = "none"
      this.aler = "none"
    }

  }
  
  enviar(event: Event) {
    event.preventDefault();
    let p1 = <HTMLParagraphElement>document.getElementById('p1');
    p1.innerHTML = 'Seu tópico foi enviado com sucesso! :D';
    let p = <HTMLParagraphElement>document.querySelector('#phara');
    p.innerHTML = 'Agradecemos por sua contribuição, uma notificação será enviada ao seu email assim que seu tópico for respondido!';
    let but = <HTMLButtonElement>document.getElementById('addtopic');
    but.innerHTML = "criar novo tópico";
    if (this.remov === "none" || this.adctopi == "block") {
      this.but = "";
      this.adctopi = "none";
      this.remov = "block";
      this.lin = "block";
      this.aler = "block";
    }
    
  }
  // abre a caixa de assuntos
  // addtop() {
  //   let topics = <HTMLFormElement>document.getElementById('caixa');
  //   let ass = <HTMLLabelElement>document.createElement('label');
  //   let input = <HTMLInputElement>document.createElement('input');
  //   let cont = <HTMLLabelElement>document.createElement('label');
  //   let textar = <HTMLTextAreaElement>document.createElement('textarea');
  //   let span = <HTMLSpanElement>document.createElement('span');
  //   let but = <HTMLButtonElement>document.createElement('button');

  //   if (topics.childElementCount == 0) {
  //     ass.innerHTML = 'Assunto';
  //     input.placeholder = 'Defina um tópico sucinto para notificar os autores...';
  //     cont.innerHTML = 'Conteúdo';
  //     textar.cols = 30;
  //     textar.rows = 6;
  //     but.innerHTML = 'Enviar';
  //     span.appendChild(but);
  //     topics.appendChild(ass);
  //     topics.appendChild(input);
  //     topics.appendChild(cont);
  //     topics.appendChild(textar);
  //     topics.appendChild(span);

  //     but.addEventListener("click", this.enviar);
  //   }

  // }
  // // remove os filhos anteriores
  // remov() {
  //   let topics = <HTMLFormElement>document.getElementById('criartop');
  //   let p = <HTMLParagraphElement>document.querySelector('#criartop p:first-child');
  //   let p1 = <HTMLParagraphElement>document.getElementById('p1');
  //   let div = <HTMLDivElement>document.getElementById('icons');
  //   let but = <HTMLButtonElement>document.getElementById('addtopic');
  //   let hr = <HTMLHRElement>document.querySelector('hr');

  //   p1.innerHTML = 'Tem uma dúvida ou sugestão? Compartilhe seu feedback com os autores!';

  //   p.style.display = "none";
  //   div.style.display = "none";
  //   but.style.display = "none";
  //   hr.style.display = "none";
  // }

  // enviar() {
  //   let topics = <HTMLFormElement>document.getElementById('criartop');
  //   let p = <HTMLParagraphElement>document.querySelector('#criartop p:first-child');
  //   let p1 = <HTMLParagraphElement>document.getElementById('p1');
  //   let div = <HTMLDivElement>document.getElementById('icons');
  //   let but = <HTMLButtonElement>document.getElementById('addtopic');
  //   let hr = <HTMLHRElement>document.querySelector('hr');

  //   p.innerHTML = 'Seu tópico foi enviado com sucesso! :D';
  //   p1.innerHTML = 'Agradecemos por sua contribuição, uma notificação será enviada ao seu email assim que seu tópico for respondido!';
  //   but.innerHTML = 'criar novo tópico';

  //   div.style.display = "none";
  // }
}






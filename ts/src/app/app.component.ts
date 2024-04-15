import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'DevChuva';
    
  nome: string = 'alguem12@galoascience.com'
  exibir:boolean = false;
  criandoNovoTopico:boolean = false;
  carregandoTopico:boolean = false;
  expandido: boolean = false;
  resto: boolean = true;
  alturaPainel = 'auto';
  
  texto: string = this.gerarLoremIpsum(20);
  limite: number = 780;
  exibirTextoExpandido: boolean = false;

  clickExpandir() {
    this.exibirTextoExpandido = !this.exibirTextoExpandido;
  }
  
  gerarLoremIpsum(tamanho: number): string{
    const texto = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';

    return texto.repeat(tamanho);
  }

  exibirRespostas(){
    this.exibir = !this.exibir;
  }

  criarTopico(){
    this.carregandoTopico == true? this.carregandoTopico = !this.carregandoTopico : null;
    this.criandoNovoTopico = !this.criandoNovoTopico;
  }

  enviarTopico(){
    this.carregandoTopico = true;
    this.criandoNovoTopico = !this.criandoNovoTopico;
  }
}

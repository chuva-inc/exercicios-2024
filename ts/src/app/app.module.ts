import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { PainelDetalhesComponent } from './painel-detalhes/painel-detalhes.component';
import { FooterComponentComponent } from './footer-component/footer-component.component';
import { RespostasComponentComponent } from './respostas-component/respostas-component.component';

@NgModule({
  declarations: [
    AppComponent,
    PainelDetalhesComponent,
    FooterComponentComponent,
    RespostasComponentComponent
  ],
  imports: [
    BrowserModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { 
  
}

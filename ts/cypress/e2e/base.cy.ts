describe('checa elementos básicos', () => {
  beforeEach(() => {
    cy.visit('http://127.0.0.1:5500/src/app/app.component.html');
  });

  it('titulo do trabalho existe', () => {
    cy.get('h2').contains('Análise sensorial de preparações funcionais desenvolvidas para escolares entre 09 e 15 anos, do município de Campinas/SP');
    cy.compareSnapshot('Trabalho - Base');
  });

  it('botão de expandir resumo existe', () => {
    cy.get('#verMais').contains('ver mais');
    cy.compareSnapshot('Trabalho - Resumo expandido');
  });

  it('botão de criar tópico existe', () => {
    cy.get('#topic_button > img');
  });

  it('expandir tópico funciona', () => {
    cy.get('#var_answers').click();
    cy.get('.discussions_container > :nth-child(5)').should('exist');
    cy.compareSnapshot('Trabalho - Card de topico expandido');
  });

  it('clicar em `criar tópico` exibe o formulário', () => {
    cy.get('#topic_button > img').click();
    cy.get('#submit_button').contains('Enviar')
    cy.get('#form').contains('Assunto');
    cy.get('#form').contains('Conteúdo');
    cy.get('.subjetc_form')
    cy.compareSnapshot('Trabalho - Criando novo topico');
  });

  it('enviar o formulário exibe mensagem de sucesso', () => {
    cy.get('#topic_button > img').click();
    cy.get('#submit_button').click();
    cy.get('body').contains('Aguardando feedback dos autores');
    cy.compareSnapshot('Trabalho - Topico enviado');
  });

})
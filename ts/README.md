# Página de Trabalho
Na parte de html/scss/ts preparamos um protótipo de alta fidelidade de uma tela para você implementar o HTML + CSS. Você pode fazer em CSS puro, utilizar pré-processadores CSS (SASS, LESS, etc), ou mesmo utilizar um framework (Bootstrap, Foundation, Ant, etc), utilize a ferramenta que você se sentir melhor e que lhe traga o melhor resultado.)

### Como rodar

Dependências:

* Node/npm
* Cypress

Rode o seguinte comando para instalar o ambiente:

```
npm install
```

Para rodar os testes, rode o seguinte comando:

```
npm run test
```


Para rodar desenvolver, rode os seguintes comandos:

Para ligar o ambiente
```
ng serve
```

Para rodar a UI de testes
```
npx cypress open --env type=base
```

### Dicas de resolução

Pra facilitar sua vida, nosso repositório já vem com pronto pra consumo, e mesmo que você não for familiar com o Angular ou Typescript, dá pra só colocar o html e o scss nos arquivos corretos, e vai funcionar (inclusive os testes automatizados vão passar).

Não esqueca de commitar os screenshots que o cypress gera, utilizaremos eles na correção do exercício.
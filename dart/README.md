# Programação
Na parte de dart preparamos um [protótipo de alta fidelidade no figma]() de uma tela para você implementar em Flutter.

Tenha em mente que seu código deve :
1. implementar o mais próximo visualmente que conseguir,
2. consumir o arquivo [JSON]() fornecido para renderizar os dados
3. persistir quais atividades foram favoritadas entre execuções diferentes do app.

Nós fornecemos um main.dart bobinho, só pra que nossos testes de integração possam rodar, esperamos que você organize sua codebase adequadamente.

Além disso, falando em dependências é recomendado que utilize:
- cached_network_image
- dio
- from_css_color
- go_router
- json_annotation


![Screenshot Figma]()
-> [Link para o Protótipo]()

-> [Link para o Editável]()


### Como rodar os testes

```
flutter test --update-goldens integration_test/
```

### Dicas de resolução

Não esqueca de commitar os screenshots que o teste gera, utilizaremos eles na correção do exercício.

Pra facilitar sua vida, nosso repositório já vem com pronto pra consumo!

# Programação
Na parte de dart preparamos um protótipo de alta fidelidade no figma de uma tela para você implementar em Flutter.

Tenha em mente que seu código deve :
1. implementar o mais próximo visualmente que conseguir,
2. consumir o arquivo [JSON](https://raw.githubusercontent.com/chuva-inc/exercicios-2023/master/dart/assets/activities.json) fornecido para renderizar os dados (note que são dois arquivos json com paginação).
3. persistir quais atividades foram favoritadas entre execuções diferentes do app.

Nós fornecemos um main.dart bobinho, só pra que nossos testes de integração possam rodar, esperamos que você organize sua codebase adequadamente.

Além disso, falando em dependências é recomendado que utilize:
- cached_network_image
- dio
- from_css_color
- go_router
- json_annotation


![Screenshot Figma]()
-> [Link para o Protótipo](https://www.figma.com/proto/imY9QQgNfBzPga9gkGLSRd/Chuva---Exerc%C3%ADcio-dart?page-id=0%3A1&type=design&node-id=5-21&viewport=909%2C1756%2C0.19&t=EjI9RpPgW5loDrNH-1&scaling=scale-down&starting-point-node-id=5%3A21&mode=design)

-> [Link para o Editável](https://www.figma.com/file/imY9QQgNfBzPga9gkGLSRd/Chuva---Exerc%C3%ADcio-dart?type=design&node-id=0%3A1&mode=design&t=ckIi2VmeiZfBmT6v-1)


### Como rodar os testes
```
flutter test --update-goldens integration_test/
```

### Dicas de resolução

Não esqueca de commitar os screenshots que o teste gera, utilizaremos eles na correção do exercício.

Pra facilitar sua vida, nosso repositório já vem com pronto pra consumo!

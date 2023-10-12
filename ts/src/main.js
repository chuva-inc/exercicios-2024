function mais() {
  let pontos = document.getElementById("pontos")
  let maistexto = document.getElementById("vermais")
  let btnvermais = document.querySelector(".btn-show-more")
  const element = document.querySelector("#content")
  const menu = document.getElementById("side-menu")
  const elementHeight = element.clientHeight

  if (pontos.style.display === "none") {
    pontos.style.display = "inline"
    maistexto.style.display = "none"
    btnvermais.innerHTML = "ver mais"
    let altura = parseInt(elementHeight) - 178
    menu.style.height = altura+"px"
  }

  else {
    pontos.style.display = "none"
    maistexto.style.display = "inline"
    btnvermais.innerHTML = "ver menos"
    let altura = parseInt(elementHeight) + 362
    menu.style.height = altura+"px"
  }
}

function abreform() {
  let topico = document.getElementById("caixa-topico")
  let atual = document.getElementById("form-topico")

  topico.style.display = "none"
  atual.style.display = "inline"
}

function novotopico() {
  let topico = document.getElementById("form-topico")
  let atual = document.getElementById("novo-topico")

  let hidden = document.getElementById("hidden")
  let assuntotxt = document.getElementById("assuntotxt")
  let conteudotxt = document.getElementById("conteudotxt")

  topico.style.display = "none"
  atual.style.display = "inline"
  hidden.style.display = "inline-block"

  assuntotxt.value = ""
  conteudotxt.value = ""
}

function abreresposta () {
  let comentarios = document.querySelector(".comments-container")

  if (comentarios.style.display != "none") {
    comentarios.style.display = "none"
  }
  else {
    comentarios.style.display = "inline"
  }
}

function voltartopico() {
  let topico = document.getElementById("novo-topico")
  let atual = document.getElementById("form-topico")
  let hidden = document.getElementById("hidden")

  hidden.style.display = "none"
  topico.style.display = "none"
  atual.style.display = "inline"
}


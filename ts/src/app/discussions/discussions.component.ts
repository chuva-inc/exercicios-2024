import { Component, OnInit } from '@angular/core';
import { card } from '../models/card.model';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-discussions',
  templateUrl: './discussions.component.html',
  styleUrls: ['./discussions.component.scss']
})
export class DiscussionsComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
  }

  cards: card[] = [
    {
      title: 'Titulo da Pergunta 1',
      author: 'Eduarda Elisa',
      question: 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA',
      like: 1,
      questions: [
        {
          author: 'João',
          answer: 'BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB',
          isAuthor: true,
          isCoauthor: false
        },
        {
          author: 'Eduarda Elisa',
          answer: 'CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC',
          isAuthor: false,
          isCoauthor: false
        },
        {
          author: 'Meg Lenny',
          answer: 'DDDDDDDDDDDDDDDDDDDDDDDDDDDDD',
          isAuthor: false,
          isCoauthor: true
        }
      ],
      isExpanded: false
    },
    {
      title: 'Titulo da Pergunta 2',
      author: 'Eduarda Elisa',
      question: 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA',
      like: 1,
      questions: [
        {
          author: 'João',
          answer: 'BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB',
          isAuthor: true,
          isCoauthor: false
        },
        {
          author: 'Eduarda Elisa',
          answer: 'CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC',
          isAuthor: false,
          isCoauthor: false
        },
        {
          author: 'Meg Lenny',
          answer: 'DDDDDDDDDDDDDDDDDDDDDDDDDDDDD',
          isAuthor: false,
          isCoauthor: true
        }
      ],
      isExpanded: false
    }
  ]

  expandCreateTopic(){
    const containerComments: HTMLElement = document.querySelector('.discussions__container__middle')!

    let style = window.getComputedStyle(containerComments);
    let display = style.getPropertyValue('display')

    if(display == 'flex'){
      containerComments.style.display = 'none'
    }
    else{
      containerComments.style.display = 'flex'
    }
  }

  createTopic(){
    const form: HTMLFormElement  = document.querySelector('.discussions__container__middle__form')!
    const formAssunto: HTMLInputElement = document.querySelector('.discussions__container__middle__ass')!
    const formConteudo: HTMLInputElement = document.querySelector('.discussions__container__middle__cont')!

    form.addEventListener('submit', e => {

      e.preventDefault()

      let card: card = {
        title: formAssunto.value,
        author: 'Eduarda Elisa',
        question: formConteudo.value,
        like: 0,
        questions: [],
        isExpanded: false
      };
  
      this.cards.push(card)

      Swal.fire({
        text: "Aguardando feedback dos autores",
        icon: "success"
      });
  
    })


  }

  expandAnswers(card: card){
    card.isExpanded = !card.isExpanded
  }



}

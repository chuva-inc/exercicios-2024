import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-page-main-content',
  templateUrl: './page-main-content.component.html',
  styleUrls: ['./page-main-content.component.scss']
})
export class PageMainContentComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
  }

  showForm() {
    let newForm = document.querySelector(".discuss-content");

    if(newForm) {
      newForm.innerHTML = `
      <div class="create-new-topic-wrapper">
        <span class="create-new-topic-title">
          Tem uma dúvida ou sugestão? Compartilhe seu feedback com os autores!
        </span>

        <div class="topic-subject-wrapper">
          <span class="new-topic-subject">Assunto</span>
            <br>
          <input type="text" name="newSubjectTitle" id="newSubjectTitle">
        </div>
        
        <div class="topic-content-wrapper">
          <span class="new-topic-content">Conteúdo</span>
            <br>
          <input type="text" name="newSubjectContent" id="newSubjectContent">

          <div class="submit-subject-button-wrapper">
            <div class="subject-submit-button">
              <p id="submit-subject">Enviar<p>
            </div>
          </div>
        </div>
      </div>`;
    }
  } 
}
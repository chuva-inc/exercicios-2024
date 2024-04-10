import { Component, OnInit } from '@angular/core';
import {FormsModule} from '@angular/forms';

@Component({
  selector: 'app-page-main-content',
  templateUrl: './page-main-content.component.html',
  styleUrls: ['./page-main-content.component.scss']
})
export class PageMainContentComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
  }

  expandResume() {
    let resumeContentWrapper = document.querySelector(".resume-text-content") as HTMLElement;
    let colapsedResume = document.querySelector(".colapsed-text") as HTMLElement;
    let expandedResume = document.querySelector(".expanded-text") as HTMLElement;

    
    colapsedResume.style.display = 'none';
    expandedResume.style.display = 'block';
    resumeContentWrapper.style.height = '66.12rem';
  }

  colapseResume() {
    let resumeContentWrapper = document.querySelector(".resume-text-content") as HTMLElement;
    let colapsedResume = document.querySelector(".colapsed-text") as HTMLElement;
    let expandedResume = document.querySelector(".expanded-text") as HTMLElement;

    
    colapsedResume.style.display = 'block';
    expandedResume.style.display = 'none';
    resumeContentWrapper.style.height = '66.12rem';
  }

  showForm() {
    let shareIdeas = document.querySelector(".share-ideas") as HTMLElement;
    let newForm = document.querySelector(".create-new-topic-wrapper") as HTMLElement;

    // shareIdeas.style.display = 'none';
    // newForm.style.display = 'block';
    shareIdeas.style.position = 'relavite';
    newForm.style.position = 'absolute';
  }

  submitForm(event:any) {
    if(event) event.preventDefault();
    
    let discuss = document.querySelector("#discuss") as HTMLElement;
    let discussContent = document.querySelector(".discuss-content") as HTMLElement;
    let newForm = document.querySelector(".create-new-topic-wrapper") as HTMLElement;
    let submitedForm = document.querySelector(".submited-subject") as HTMLElement;
    let waitingFeedback = document.querySelector(".waiting-feedback") as HTMLElement;
    
    
    discuss.style.height = '49rem';
    discussContent.style.height = '16.2rem' ? '11.81rem' : '16.2rem';
    newForm.style.display = 'block' ? 'none' : 'block';
    submitedForm.style.display = 'none' ? 'block' : 'none';
    waitingFeedback.style.display = 'none' ? 'block' : 'none';
  }

  submitedForm() {
    let discuss = document.querySelector("#discuss") as HTMLElement;
    let discussContent = document.querySelector(".discuss-content") as HTMLElement;
    let submitedForm = document.querySelector(".submited-subject") as HTMLElement;
    let newForm = document.querySelector(".create-new-topic-wrapper") as HTMLElement;
    let waitingFeedback = document.querySelector(".waiting-feedback") as HTMLElement;
    
    
    discuss.style.height = '40.5rem';
    discussContent.style.height = '16.2rem' ? '14.3rem' : '16.2rem';
    submitedForm.style.display = 'block' ? 'none' : 'block';
    newForm.style.display = 'none' ? 'block' : 'none';
    waitingFeedback.style.display = 'block' ? 'none' : 'block';
  }
}
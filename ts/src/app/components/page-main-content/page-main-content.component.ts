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
    let shareIdeas = document.querySelector(".share-ideas") as HTMLElement;
    let newForm = document.querySelector(".create-new-topic-wrapper") as HTMLElement;

    shareIdeas.style.display = 'block' ? 'none' : 'block';
    newForm.style.display = 'none' ? 'block' : 'none';
  } 
}
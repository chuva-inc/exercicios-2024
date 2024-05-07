import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-summary',
  templateUrl: './summary.component.html',
  styleUrls: ['./summary.component.scss']
})
export class SummaryComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
  }

  expand(){
    const divSummary: HTMLElement = document.querySelector('.summary')!
    const span: HTMLElement = document.querySelector('#span')!

    let style = window.getComputedStyle(divSummary);
    let height = style.getPropertyValue('height')

    if(height == '150px'){
      divSummary.style.height = '480px'
      span.style.display = 'none'
    }
    else{
      divSummary.style.height = '150px'
      span.style.display = 'inline'
    }

  }

}

import { Component, EventEmitter, OnInit } from '@angular/core';

@Component({
  selector: 'app-topic-component',
  templateUrl: './topic-component.component.html',
  styleUrls: ['./topic-component.component.scss']
})
export class TopicComponentComponent implements OnInit {
  showResponse:boolean = false;
  showResponseValidForm = new EventEmitter<boolean>();

  constructor() { }

  ngOnInit(): void {
  }

  showResponseForm() {
    this.showResponse = !this.showResponse;
    this.showResponseValidForm.emit(this.showResponse);

    if(this.showResponse) {
      this.showResponseValidForm.emit(false);
    }
  }
}

import { Component, OnInit, EventEmitter, Output } from '@angular/core';

@Component({
  selector: 'app-form-discussions',
  templateUrl: './form-discussions.component.html',
  styleUrls: ['./form-discussions.component.scss'],
})
export class FormDiscussionsComponent implements OnInit {
  @Output() formSubmitted = new EventEmitter<void>();

  constructor() {}

  ngOnInit(): void {}

  submit(): void {
    this.formSubmitted.emit();
  }
}

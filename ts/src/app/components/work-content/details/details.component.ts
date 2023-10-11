import { Component, OnInit, Input } from '@angular/core';
import { IWorkDetails } from 'src/app/interfaces';

@Component({
  selector: 'app-details',
  templateUrl: './details.component.html',
  styleUrls: ['./details.component.scss']
})
export class DetailsComponent implements OnInit {
  @Input() details!: IWorkDetails;

  constructor() {}

  ngOnInit(): void {}
}

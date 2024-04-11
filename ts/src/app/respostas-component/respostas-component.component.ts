import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-respostas-component',
  templateUrl: './respostas-component.component.html',
  styleUrls: ['./respostas-component.component.scss']
})
export class RespostasComponentComponent implements OnInit {

  @Input() tag?: string;
  @Input() nome?: string;

  constructor() { }

  ngOnInit(): void {
  }

}

import { Component, OnInit, Input } from '@angular/core';
import { faCheckDouble } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-respostas-component',
  templateUrl: './respostas-component.component.html',
  styleUrls: ['./respostas-component.component.scss']
})
export class RespostasComponentComponent implements OnInit {

  doubleCheckIcon = faCheckDouble;

  @Input() tag?: string;
  @Input() nome?: string;

  constructor() { }

  ngOnInit(): void {
  }

}

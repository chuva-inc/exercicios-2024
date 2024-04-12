import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'card',
  templateUrl: './card.component.html',
  styleUrls: ['./card.component.scss'],
})
export class CardComponent implements OnInit {
  @Input() isOpen: boolean = true;
  @Input() likes?: string;
  @Input() response?: string;
  @Output() toggle: EventEmitter<void> = new EventEmitter<void>();
  constructor() {}
  toggleInfo(): void {
    this.toggle.emit();
  }
  ngOnInit(): void {}
}

import { Component, Input, OnInit } from '@angular/core';
import { IReply, Role } from '../replies.interface';

@Component({
  selector: 'app-answer',
  templateUrl: './answer.component.html',
  styleUrls: ['./answer.component.scss'],
})
export class AnswerComponent implements OnInit {
  @Input()
  replies: IReply[] = [];

  isAutorOrCoautor(role: Role): boolean {
    return role === Role.AUTOR || role === Role.COAUTOR;
  }

  adminClass(role: Role): string {
    return this.isAutorOrCoautor(role) ? 'admin' : '';
  }

  constructor() {}

  ngOnInit(): void {}
}

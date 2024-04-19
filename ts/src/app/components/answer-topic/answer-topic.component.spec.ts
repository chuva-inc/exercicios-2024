import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AnswerTopicComponent } from './answer-topic.component';

describe('AnswerTopicComponent', () => {
  let component: AnswerTopicComponent;
  let fixture: ComponentFixture<AnswerTopicComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AnswerTopicComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AnswerTopicComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

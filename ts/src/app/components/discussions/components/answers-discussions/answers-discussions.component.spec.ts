import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AnswersDiscussionsComponent } from './answers-discussions.component';

describe('AnswersDiscussionsComponent', () => {
  let component: AnswersDiscussionsComponent;
  let fixture: ComponentFixture<AnswersDiscussionsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AnswersDiscussionsComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AnswersDiscussionsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

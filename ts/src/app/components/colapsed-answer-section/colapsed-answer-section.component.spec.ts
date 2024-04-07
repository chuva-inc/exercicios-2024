import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ColapsedAnswerSectionComponent } from './colapsed-answer-section.component';

describe('ColapsedAnswerSectionComponent', () => {
  let component: ColapsedAnswerSectionComponent;
  let fixture: ComponentFixture<ColapsedAnswerSectionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ColapsedAnswerSectionComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ColapsedAnswerSectionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

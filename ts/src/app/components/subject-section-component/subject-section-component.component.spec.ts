import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SubjectSectionComponentComponent } from './subject-section-component.component';

describe('SubjectSectionComponentComponent', () => {
  let component: SubjectSectionComponentComponent;
  let fixture: ComponentFixture<SubjectSectionComponentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ SubjectSectionComponentComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(SubjectSectionComponentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SubjectSectionFooterComponentComponent } from './subject-section-footer-component.component';

describe('SubjectSectionFooterComponentComponent', () => {
  let component: SubjectSectionFooterComponentComponent;
  let fixture: ComponentFixture<SubjectSectionFooterComponentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ SubjectSectionFooterComponentComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(SubjectSectionFooterComponentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SectionTopicsComponent } from './section-topics.component';

describe('SectionTopicsComponent', () => {
  let component: SectionTopicsComponent;
  let fixture: ComponentFixture<SectionTopicsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ SectionTopicsComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(SectionTopicsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

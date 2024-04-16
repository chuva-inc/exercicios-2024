import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SectionTopicComponent } from './section-topic.component';

describe('SectionTopicComponent', () => {
  let component: SectionTopicComponent;
  let fixture: ComponentFixture<SectionTopicComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ SectionTopicComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(SectionTopicComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

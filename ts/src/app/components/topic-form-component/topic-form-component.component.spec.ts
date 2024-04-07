import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TopicFormComponentComponent } from './topic-form-component.component';

describe('TopicFormComponentComponent', () => {
  let component: TopicFormComponentComponent;
  let fixture: ComponentFixture<TopicFormComponentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TopicFormComponentComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TopicFormComponentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

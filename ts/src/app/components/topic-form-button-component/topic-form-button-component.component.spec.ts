import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TopicFormButtonComponentComponent } from './topic-form-button-component.component';

describe('TopicFormButtonComponentComponent', () => {
  let component: TopicFormButtonComponentComponent;
  let fixture: ComponentFixture<TopicFormButtonComponentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TopicFormButtonComponentComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TopicFormButtonComponentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

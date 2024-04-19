import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormTopicComponent } from './form-topic.component';

describe('FormTopicComponent', () => {
  let component: FormTopicComponent;
  let fixture: ComponentFixture<FormTopicComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FormTopicComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(FormTopicComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

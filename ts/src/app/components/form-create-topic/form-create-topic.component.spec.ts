import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormCreateTopicComponent } from './form-create-topic.component';

describe('FormCreateTopicComponent', () => {
  let component: FormCreateTopicComponent;
  let fixture: ComponentFixture<FormCreateTopicComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FormCreateTopicComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(FormCreateTopicComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

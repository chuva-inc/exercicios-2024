import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ConfirmedNewTopicComponent } from './confirmed-new-topic.component';

describe('ConfirmedNewTopicComponent', () => {
  let component: ConfirmedNewTopicComponent;
  let fixture: ComponentFixture<ConfirmedNewTopicComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ConfirmedNewTopicComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ConfirmedNewTopicComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

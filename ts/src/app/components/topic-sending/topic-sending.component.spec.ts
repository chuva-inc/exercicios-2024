import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TopicSendingComponent } from './topic-sending.component';

describe('TopicSendingComponent', () => {
  let component: TopicSendingComponent;
  let fixture: ComponentFixture<TopicSendingComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TopicSendingComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TopicSendingComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TopicSentComponent } from './topic-sent.component';

describe('TopicSentComponent', () => {
  let component: TopicSentComponent;
  let fixture: ComponentFixture<TopicSentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TopicSentComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TopicSentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

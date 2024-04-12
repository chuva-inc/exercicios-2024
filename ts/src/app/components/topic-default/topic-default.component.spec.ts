import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TopicDefaultComponent } from './topic-default.component';

describe('TopicDefaultComponent', () => {
  let component: TopicDefaultComponent;
  let fixture: ComponentFixture<TopicDefaultComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [TopicDefaultComponent],
    }).compileComponents();

    fixture = TestBed.createComponent(TopicDefaultComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

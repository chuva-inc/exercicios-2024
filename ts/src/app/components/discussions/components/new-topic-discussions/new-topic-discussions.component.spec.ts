import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewTopicDiscussionsComponent } from './new-topic-discussions.component';

describe('NewTopicDiscussionsComponent', () => {
  let component: NewTopicDiscussionsComponent;
  let fixture: ComponentFixture<NewTopicDiscussionsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewTopicDiscussionsComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(NewTopicDiscussionsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

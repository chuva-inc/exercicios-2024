import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ExpandTopicDiscussionsComponent } from './expand-topic-discussions.component';

describe('ExpandTopicDiscussionsComponent', () => {
  let component: ExpandTopicDiscussionsComponent;
  let fixture: ComponentFixture<ExpandTopicDiscussionsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ExpandTopicDiscussionsComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ExpandTopicDiscussionsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

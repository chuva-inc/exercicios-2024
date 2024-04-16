import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DiscussionTopicsComponent } from './discussion-topics.component';

describe('DiscussionTopicsComponent', () => {
  let component: DiscussionTopicsComponent;
  let fixture: ComponentFixture<DiscussionTopicsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ DiscussionTopicsComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(DiscussionTopicsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

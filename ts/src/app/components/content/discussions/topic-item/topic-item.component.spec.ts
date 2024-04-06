import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TopicItemComponent } from './topic-item.component';

describe('TopicItemComponent', () => {
  let component: TopicItemComponent;
  let fixture: ComponentFixture<TopicItemComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TopicItemComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TopicItemComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

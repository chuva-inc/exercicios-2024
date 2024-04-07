import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TopicComponentComponent } from './topic-component.component';

describe('TopicComponentComponent', () => {
  let component: TopicComponentComponent;
  let fixture: ComponentFixture<TopicComponentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TopicComponentComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TopicComponentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

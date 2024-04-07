import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TopicButtonComponentComponent } from './topic-button-component.component';

describe('TopicButtonComponentComponent', () => {
  let component: TopicButtonComponentComponent;
  let fixture: ComponentFixture<TopicButtonComponentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TopicButtonComponentComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TopicButtonComponentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

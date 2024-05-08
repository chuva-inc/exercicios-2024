import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DiscussionsComponent } from './discussions.component';

describe('DiscussionsComponent', () => {
  let component: DiscussionsComponent;
  let fixture: ComponentFixture<DiscussionsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ DiscussionsComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(DiscussionsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

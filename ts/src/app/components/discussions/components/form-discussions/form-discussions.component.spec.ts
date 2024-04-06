import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormDiscussionsComponent } from './form-discussions.component';

describe('FormDiscussionsComponent', () => {
  let component: FormDiscussionsComponent;
  let fixture: ComponentFixture<FormDiscussionsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FormDiscussionsComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(FormDiscussionsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

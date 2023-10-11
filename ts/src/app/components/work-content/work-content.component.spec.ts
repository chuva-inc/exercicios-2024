import { ComponentFixture, TestBed } from '@angular/core/testing';

import { WorkContentComponent } from './work-content.component';

describe('WorkContentComponent', () => {
  let component: WorkContentComponent;
  let fixture: ComponentFixture<WorkContentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ WorkContentComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(WorkContentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

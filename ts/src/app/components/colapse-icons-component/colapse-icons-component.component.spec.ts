import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ColapseIconsComponentComponent } from './colapse-icons-component.component';

describe('ColapseIconsComponentComponent', () => {
  let component: ColapseIconsComponentComponent;
  let fixture: ComponentFixture<ColapseIconsComponentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ColapseIconsComponentComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ColapseIconsComponentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

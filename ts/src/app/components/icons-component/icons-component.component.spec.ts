import { ComponentFixture, TestBed } from '@angular/core/testing';

import { IconsComponentComponent } from './icons-component.component';

describe('IconsComponentComponent', () => {
  let component: IconsComponentComponent;
  let fixture: ComponentFixture<IconsComponentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ IconsComponentComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(IconsComponentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

import { ComponentFixture, TestBed } from '@angular/core/testing';

import { LeftSideNavMenuComponent } from './left-side-nav-menu.component';

describe('LeftSideNavMenuComponent', () => {
  let component: LeftSideNavMenuComponent;
  let fixture: ComponentFixture<LeftSideNavMenuComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ LeftSideNavMenuComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(LeftSideNavMenuComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

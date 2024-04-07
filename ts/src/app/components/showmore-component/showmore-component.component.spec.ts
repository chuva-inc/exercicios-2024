import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ShowmoreComponentComponent } from './showmore-component.component';

describe('ShowmoreComponentComponent', () => {
  let component: ShowmoreComponentComponent;
  let fixture: ComponentFixture<ShowmoreComponentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ShowmoreComponentComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ShowmoreComponentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
 });
});

import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RespostasComponentComponent } from './respostas-component.component';

describe('RespostasComponentComponent', () => {
  let component: RespostasComponentComponent;
  let fixture: ComponentFixture<RespostasComponentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ RespostasComponentComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(RespostasComponentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

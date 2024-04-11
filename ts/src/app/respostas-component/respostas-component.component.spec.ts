import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RespostasComponentComponent } from './respostas-component.component';
import { NO_ERRORS_SCHEMA } from '@angular/core';

describe('RespostasComponentComponent', () => {
  let component: RespostasComponentComponent;
  let fixture: ComponentFixture<RespostasComponentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ RespostasComponentComponent ],
      schemas: [NO_ERRORS_SCHEMA]
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

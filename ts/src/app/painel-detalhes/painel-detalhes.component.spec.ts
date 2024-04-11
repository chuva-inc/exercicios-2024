import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PainelDetalhesComponent } from './painel-detalhes.component';

describe('PainelDetalhesComponent', () => {
  let component: PainelDetalhesComponent;
  let fixture: ComponentFixture<PainelDetalhesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ PainelDetalhesComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(PainelDetalhesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

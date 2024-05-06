import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CommentAnswearComponent } from './comment-answear.component';

describe('CommentAnswearComponent', () => {
  let component: CommentAnswearComponent;
  let fixture: ComponentFixture<CommentAnswearComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CommentAnswearComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(CommentAnswearComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

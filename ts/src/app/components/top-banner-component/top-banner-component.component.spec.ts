import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TopBannerComponentComponent } from './top-banner-component.component';

describe('TopBannerComponentComponent', () => {
  let component: TopBannerComponentComponent;
  let fixture: ComponentFixture<TopBannerComponentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TopBannerComponentComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TopBannerComponentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

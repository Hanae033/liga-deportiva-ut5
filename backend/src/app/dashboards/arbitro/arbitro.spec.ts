import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Arbitro } from './arbitro';

describe('Arbitro', () => {
  let component: Arbitro;
  let fixture: ComponentFixture<Arbitro>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [Arbitro]
    })
    .compileComponents();

    fixture = TestBed.createComponent(Arbitro);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

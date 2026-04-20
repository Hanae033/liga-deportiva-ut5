import { ComponentFixture, TestBed } from '@angular/core/testing';

import { IndexAdministrador } from './index-administrador';

describe('IndexAdministrador', () => {
  let component: IndexAdministrador;
  let fixture: ComponentFixture<IndexAdministrador>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [IndexAdministrador]
    })
    .compileComponents();

    fixture = TestBed.createComponent(IndexAdministrador);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

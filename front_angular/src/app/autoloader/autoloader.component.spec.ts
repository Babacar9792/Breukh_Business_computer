import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AutoloaderComponent } from './autoloader.component';

describe('AutoloaderComponent', () => {
  let component: AutoloaderComponent;
  let fixture: ComponentFixture<AutoloaderComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [AutoloaderComponent]
    });
    fixture = TestBed.createComponent(AutoloaderComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

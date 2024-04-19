import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class SharedService {
  private censorshipDisplaySubject: BehaviorSubject<string> = new BehaviorSubject<string>('none');
  public censorshipDisplay$: Observable<string> = this.censorshipDisplaySubject.asObservable();

  constructor() { }

  setCensorshipDisplay(value: string): void {
    this.censorshipDisplaySubject.next(value);
  }
}

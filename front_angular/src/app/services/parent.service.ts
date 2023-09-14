import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable, tap } from 'rxjs';
import { ResponseData } from '../interfaces/response-data';

@Injectable({
  providedIn: 'root'
})
export class ParentService {

  constructor(private http : HttpClient) { }

  public  getAll<T>(uri : string) : Observable<ResponseData<T>>{
    return this.http.get<ResponseData<T>>(uri);
  }
}

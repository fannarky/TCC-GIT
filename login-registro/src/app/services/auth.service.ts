import { Injectable } from '@angular/core';
import { Funcionario } from '../Models/Funcionario';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { environment } from 'src/environments/environment';
import { Observable } from 'rxjs';

const httpOptions = {
  headers: new HttpHeaders({ 'Content-Type': 'application/json' })
};

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  constructor(private http: HttpClient) { }
  private url = environment.urlApi; 

  validaLogin(funcionario: Funcionario): Observable<Funcionario>{
    
    return this.http.post<Funcionario>(this.url + 'gestor/login', funcionario, httpOptions);

  }

}

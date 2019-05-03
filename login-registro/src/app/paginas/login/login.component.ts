import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { AuthService } from 'src/app/services/auth.service';
import { Funcionario } from 'src/app/Models/Funcionario';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  formulario: FormGroup;
  constructor(
    private formBuilder: FormBuilder,
    private auth: AuthService) { 
    }
    
  func: Funcionario = new Funcionario();
    
  quandoClica(){
    
    this.func.email = this.formulario.get('email').value;
    this.func.senha = this.formulario.get('senha').value;

    this.auth.validaLogin(this.func)
      .subscribe(data => console.log(data));
  }
  
  ngOnInit() {
    //formulário gerado, para fazer validações basta colocar funcoes dentro da []
    this.formulario = this.formBuilder.group({
      senha: ['3277372', [Validators.required, Validators.minLength(3), Validators.maxLength(20)]],
      email: ['joao123@email.com', [Validators.required, Validators.email]],
    });

    //pegar o valor de uma variavel do formulario
    //console.log(this.formulario.get('email').value);
  }

}

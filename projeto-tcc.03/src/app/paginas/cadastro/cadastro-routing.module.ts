import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { CadastroComponent } from './cadastro.component';

const routes: Routes = [
  {
    path: '',
    component: CadastroComponent
    //,
    //children: [
    //  {
        //exemplo
        //path: "signin",
        //component: SigninComponent,
        //data: {
        //  breadcrumb: "Sign In"
        //}
    //  },
      
    //]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class CadastroRoutingModule { }

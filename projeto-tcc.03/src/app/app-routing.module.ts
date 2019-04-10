import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

const routes: Routes = [
  { path: 'login', loadChildren: 'src/app/paginas/login/login.module#LoginModule' },
  { path: 'cadastro', loadChildren: 'src/app/paginas/cadastro/cadastro.module#CadastroModule' },
  { path: 'dashboard', loadChildren: 'src/app/paginas/dashboard/dashboard.module#DashboardModule' }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

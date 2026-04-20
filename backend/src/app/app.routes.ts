import { LoginComponent } from './auth/login/login';
import IndexAdministradorComponent from './roles/index_administrador';
import IndexCapitanComponent from './roles/index_capitan';
import IndexArbitroComponent from './roles/index_arbitro';
import IndexUsuarioComponent from './roles/index_usuario';

export const routes = [
  { path: 'login', component: LoginComponent },
  { path: 'index_administrador', component: IndexAdministradorComponent },
  { path: 'index_capitan', component: IndexCapitanComponent },
  { path: 'index_arbitro', component: IndexArbitroComponent },
  { path: 'index_usuario', component: IndexUsuarioComponent },
  { path: '', redirectTo: 'login', pathMatch: 'full' },
  { path: '**', redirectTo: 'login' }
];





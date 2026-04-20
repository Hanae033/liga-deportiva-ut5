import { bootstrapApplication } from '@angular/platform-browser';
import App from './app/app';
import { provideRouter } from '@angular/router';
import { provideHttpClient } from '@angular/common/http';

import { LoginComponent } from './app/auth/login/login';
import IndexAdministradorComponent from './app/roles/index_administrador';
import IndexCapitanComponent from './app/roles/index_capitan';
import IndexArbitroComponent from './app/roles/index_arbitro';
import IndexUsuarioComponent from './app/roles/index_usuario';

bootstrapApplication(App, {
  providers: [
    provideRouter([
      { path: 'login', component: LoginComponent },
      { path: 'index_administrador', component: IndexAdministradorComponent },
      { path: 'index_capitan', component: IndexCapitanComponent },
      { path: 'index_arbitro', component: IndexArbitroComponent },
      { path: 'index_usuario', component: IndexUsuarioComponent },
      { path: '', redirectTo: 'login', pathMatch: 'full' },
      { path: '**', redirectTo: 'login' }
    ]),
    provideHttpClient()
  ]
}).catch(err => console.error(err));




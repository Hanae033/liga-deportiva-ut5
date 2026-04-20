import { ApplicationConfig } from '@angular/core';
import { provideRouter } from '@angular/router';
import { provideHttpClient } from '@angular/common/http';

import { HomeComponent } from './pages/home/home';
import { NoticiasComponent } from './pages/noticias/noticias';
import { EquiposComponent } from './pages/equipos/equipos';
import { ResultadosComponent } from './pages/resultados/resultados';
import { ClasificacionesComponent } from './pages/clasificaciones/clasificaciones';
import { JugadoresComponent } from './pages/jugadores/jugadores';
import { ArbitrosComponent } from './pages/arbitros/arbitros';
import { Contacto } from './pages/contacto/contacto';

import { LoginComponent } from './auth/login/login';
import { RegisterComponent } from './auth/register/register';

import { Admin } from './dashboards/admin/admin';
import { Usuario } from './dashboards/usuario/usuario';
import { Capitan } from './dashboards/capitan/capitan';
import { Arbitro } from './dashboards/arbitro/arbitro';

export const appConfig: ApplicationConfig = {
  providers: [
    provideHttpClient(),
    provideRouter([

      { path: '', component: HomeComponent },
      { path: 'noticias', component: NoticiasComponent },
      { path: 'equipos', component: EquiposComponent },
      { path: 'resultados', component: ResultadosComponent },
      { path: 'clasificaciones', component: ClasificacionesComponent },
      { path: 'jugadores', component: JugadoresComponent },
      { path: 'arbitros', component: ArbitrosComponent },
      { path: 'contacto', component: Contacto },

      { path: 'login', component: LoginComponent },
      { path: 'registro', component: RegisterComponent },

      { path: 'admin', component: Admin },
      { path: 'usuario', component: Usuario },
      { path: 'capitan', component: Capitan },
      { path: 'arbitro-panel', component: Arbitro },

      { path: '**', redirectTo: '' }

    ])
  ]
};



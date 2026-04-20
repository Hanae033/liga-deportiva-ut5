import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { Router } from '@angular/router';
import { AuthService } from '../../services/auth.service';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [FormsModule, HttpClientModule],
  templateUrl: './login.html',
  styleUrls: ['./login.css'] // opcional
})
export class LoginComponent {   
  username: string = '';
  password: string = '';

  constructor(private authService: AuthService, private router: Router) {}

  onLogin() {
    this.authService.login({ username: this.username, password: this.password })
      .subscribe({
        next: (res: any) => {
          if(res && res.tipo){
            switch(res.tipo){
              case 'admin': this.router.navigate(['/index_administrador']); break;
              case 'capitan': this.router.navigate(['/index_capitan']); break;
              case 'arbitro': this.router.navigate(['/index_arbitro']); break;
              default: this.router.navigate(['/index_usuario']); break;
            }
          } else {
            alert('Usuario o contraseña incorrectos');
          }
        },
        error: err => alert('Error al iniciar sesión')
      });
  }
}



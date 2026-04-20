import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { Router } from '@angular/router';
import { AuthService } from '../../services/auth.service';

@Component({
  selector: 'app-register',
  standalone: true,
  imports: [FormsModule, HttpClientModule],
  templateUrl: './register.html',
  styleUrls: ['./register.css'] // opcional
})
export class RegisterComponent {
  username: string = '';
  password: string = '';
  role: string = 'normal';

  constructor(private authService: AuthService, private router: Router) {}

  onRegister() {
    this.authService.register({ username: this.username, password: this.password, tipo: this.role })
      .subscribe({
        next: res => {
          alert('Usuario registrado correctamente');
          this.router.navigate(['/login']);
        },
        error: err => {
          console.error(err);
          alert('Error al registrar usuario');
        }
      });
  }
}




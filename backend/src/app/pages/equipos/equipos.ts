import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-equipos',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './equipos.html',
  styleUrls: ['./equipos.css']
})
export class EquiposComponent {
  equipos = [
    { nombre: 'CD Tormeta IES', deporte: 'Fútbol', capitan: 'Juan Pérez' },
    { nombre: 'Hoop Stars', deporte: 'Baloncesto', capitan: 'Marta Gómez' },
    { nombre: 'Racket Club', deporte: 'Tenis', capitan: 'Raúl López' }
  ];
}


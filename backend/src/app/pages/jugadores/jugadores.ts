import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-jugadores',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './jugadores.html',
  styleUrls: ['./jugadores.css']
})
export class JugadoresComponent {
  jugadores = [
    { nombre: 'Juan Pérez', equipo: 'CD Tormeta IES' },
    { nombre: 'Marta Gómez', equipo: 'Hoop Stars' },
    { nombre: 'Raúl López', equipo: 'Racket Club' }
  ];
}


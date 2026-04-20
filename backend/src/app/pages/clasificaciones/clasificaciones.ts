import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-clasificaciones',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './clasificaciones.html',
  styleUrls: ['./clasificaciones.css']
})
export class ClasificacionesComponent {
  clasificacion = [
    { equipo: 'Hoop Stars', puntos: 25 },
    { equipo: 'CD Tormeta IES', puntos: 22 },
    { equipo: 'Dunkers', puntos: 17 }
  ];
}


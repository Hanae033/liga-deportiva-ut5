import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-noticias',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './noticias.html',
  styleUrls: ['./noticias.css']
})
export class NoticiasComponent {
  noticias = [
    { titulo: 'Gran victoria del equipo C', texto: 'Partido emocionante...', fecha: '20/10/2026' },
    { titulo: 'Convocatoria de árbitros', texto: 'Se abre el plazo...', fecha: '15/10/2026' },
    { titulo: 'Nueva equipación', texto: 'Nueva temporada...', fecha: '01/10/2026' }
  ];
}


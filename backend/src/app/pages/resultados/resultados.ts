import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-resultados',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './resultados.html',
  styleUrls: ['./resultados.css']
})
export class ResultadosComponent {
  resultados = [
    { dep: 'Fútbol', partido: 'Tormeta vs Sporting', resultado: '3 - 1' },
    { dep: 'Baloncesto', partido: 'Hoop vs Dunkers', resultado: '62 - 58' }
  ];
}

import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-arbitros',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './arbitros.html',
  styleUrls: ['./arbitros.css']
})
export class ArbitrosComponent {
  arbitros = [
    { nombre: 'Carmelo Ruiz', exp: 5 },
    { nombre: 'Carmen Martínez', exp: 3 }
  ];
}


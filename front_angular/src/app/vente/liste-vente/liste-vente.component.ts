import { Component, Input } from '@angular/core';
import { Produit } from 'src/app/interfaces/produit';
import { Utilisateur } from 'src/app/interfaces/utilisateur';

@Component({
  selector: 'app-liste-vente',
  templateUrl: './liste-vente.component.html',
  styleUrls: ['./liste-vente.component.css']
})
export class ListeVenteComponent {
  @Input() user : Utilisateur = <Utilisateur>{};
  @Input() produitPanier : Produit[] = [];


}

import { Component, OnInit } from '@angular/core';
import { VenteService } from '../services/vente.service';
import { environment } from 'src/environments/environment.development';
import { ResponseData } from '../interfaces/response-data';
import { Utilisateur } from '../interfaces/utilisateur';
import { Produit } from '../interfaces/produit';

@Component({
  selector: 'app-vente',
  templateUrl: './vente.component.html',
  styleUrls: ['./vente.component.css']
})
export class VenteComponent implements OnInit {
  user: Utilisateur = <Utilisateur>{};
  produitsBySuccursale: Produit[] = [];
  produitPanier: Produit[] = [];
  constructor(private venteService: VenteService) {

  }
  ngOnInit(): void {
    let venteSubsribe = this.venteService.getAll<Utilisateur[]>(environment.api.url + 'utilisateur/1').subscribe({
      next: (value) => {
        this.user = value.data[0]
        this.produitsBySuccursale = value.data[0].succursale.produits

      },
      error: (error) => { console.log(error) },
      complete: () => { console.log("completed") }


    })
    setTimeout(() => {
      venteSubsribe.unsubscribe();
    }, 5000);
  }

  addProductToPanier(event : Produit){
    this.produitPanier.push(event);
    this.produitsBySuccursale = this.produitsBySuccursale.filter((element : Produit) => element.code !== event.code);
  }
}

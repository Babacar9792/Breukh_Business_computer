import { Component, ElementRef, EventEmitter, Input, Output, ViewChild } from '@angular/core';
import { Produit } from 'src/app/interfaces/produit';
import { environment } from 'src/environments/environment.development';

@Component({
  selector: 'app-form-vente',
  templateUrl: './form-vente.component.html',
  styleUrls: ['./form-vente.component.css']
})
export class FormVenteComponent {
  @Input() produitsBySuccursale : Produit[] = [];
  @Output() addProductToPanier = new EventEmitter<Produit>();
                
  @ViewChild('ref') ref !: ElementRef;
  loader : boolean = true;
  produitFound : Produit=<Produit>{} 
 imageProduit : string = environment.defaultLaptop;
  getProduitByReference(event : Event){
    let input = event.target as HTMLInputElement;
    this.imageProduit = environment.defaultLaptop
    let produitSearched : Produit[]  = this.produitsBySuccursale.filter((element : Produit) => element.code.toLowerCase() === input.value.toLowerCase());
    this.loader = false;
    this.produitFound = <Produit>{};
    if(produitSearched.length != 0){
      this.imageProduit = produitSearched[0].photo
      this.produitFound = produitSearched[0]
      this.loader = true;
    }    
  }
  addPanier(produit : Produit){
    this.addProductToPanier.emit(produit);
    this.vider();
  }

  public vider(){
    this.produitFound = <Produit>{};
    this.imageProduit = environment.defaultLaptop;
    this.ref.nativeElement.value = '';
  }
}

import { Produit } from "./produit";

export interface Succursale {
    id: number,
    nom: string,
    telephone: string,
    adresse: string,
    reduction: number | null,
    produits : Produit[]
}

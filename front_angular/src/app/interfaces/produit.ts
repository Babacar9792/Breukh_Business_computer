export interface Produit {
    "id": number,
    "libelle": string,
    "description": string | null,
    "code": string,
    "photo": string,
    "pivot": {
        "succursale_id": number,
        "produit_id": number,
        prix : number,
        stock : number
    }
}


<?php
//1-

function initialiserCategories() {
    return [
        [
            'nom' => 'alimentaire',
            'code' => 'C01',
            'produits' => [
                [
                    'nom' => 'lait',
                    'reference' => 'ref1',
                    'prix' => 150,
                    'quantite' => 200
                ],
                [
                    'nom' => 'sucre',
                    'reference' => 'ref2',
                    'prix' => 50,
                    'quantite' => 1000
                ]
            ]
        ],
        [
            'nom' => 'hygiene',
            'code' => 'C02',
            'produits' => []
        ]
    ];
}


//2-
 function afficherCategorieSansProduit(array $categories): void{
    foreach ($categories as  $categorie ) {
        if (empty($categorie["produits"])) {
            echo $categorie["nom"]."\n";
        }
    }
 }

 //3-

function codeExiste(array $categories, string $code): bool{
    foreach ($categories as $categorie) {
        if ($categorie['code'] == $code) {
            return true;
        }
    }
    return false;
}


function saisirChampObligatoire(string $message): string
{
    do {
        $valeur = readline($message);
        if (empty($valeur)) {
            echo "Champ obligatoire.\n";
        }
    } while (empty($valeur));
 
    return $valeur;
}

function saisirCodeCategorie(array $categories): string
{
    do {
        $code = readline("entrer le code : ");
        if (empty($code)) {
            echo "champs obligatoire \n";
        } elseif (codeExiste($categories, $code)) {
            echo "le code existe deja \n";
        }
    } while (empty($code) || codeExiste($categories, $code));
 
    return $code;
}

function creerCategorie(string $nom, string $code): array
{
    return [
        'nom' => $nom,
        'code' => $code,
        'produits' => [],
    ];
}


function ajouterCategorie(array &$categories): void
{
    $code = saisirCodeCategorie($categories);
    $nom = saisirChampObligatoire("Entrer le nom : ");
 
    $categories[] = creerCategorie($nom, $code);
 
    echo "Catégorie enregistrée avec succès.\n";
}
 

//4-

function trouverIndexCategorie(array $categories, string $code): int
{
    foreach ($categories as $index => $categorie) {
        if ($categorie['code'] == $code) {
            return $index;
        }
    }
    return -1;
}

function referenceExiste(array $categories, string $reference, array $produitSupp = []): bool
{
    foreach ($categories as $categorie) {
        foreach ($categorie['produits'] as $produit) {
            if ($produit['reference'] == $reference) {
                return true;
            }
        }
    }
 
    foreach ($produitSupp as $produit) {
        if ($produit['reference'] == $reference) {
            return true;
        }
    }
 
    return false;
}

function saisirReference(array $categories, array $produitSupp = []): string
{
    do {
        $reference = readline("Entrer la référence : ");
        if (empty($reference)) {
            echo "Champ obligatoire.\n";
        } elseif (referenceExiste($categories, $reference, $produitSupp)) {
            echo "Cette référence existe déjà.\n";
        }
    } while (empty($reference) || referenceExiste($categories, $reference, $produitSupp));
 
    return $reference;
}


function saisirEntierPositif(string $message): int
{
    do {
        $valeur = (int) readline($message);
        if ($valeur <= 0) {
            echo "La valeur doit être positive.\n";
        }
    } while ($valeur <= 0);
 
    return $valeur;
}

function creerProduit(string $nom, string $reference, int $prix, int $quantite): array
{
    return [
        'nom' => $nom,
        'reference' => $reference,
        'prix' => $prix,
        'quantite' => $quantite,
    ];
}

function ajouterProduitDansCategorie(array &$categories): void
{
    $codeCategorie = readline("Entrer le code de la catégorie a recherche: ");
    $indexCategorie = trouverIndexCategorie($categories, $codeCategorie);
 
    if ($indexCategorie == -1) {
        echo "Catégorie introuvable.\n";
        return;
    }
 
    $reference = saisirReference($categories);
    $nom = saisirChampObligatoire("Entrer le nom du produit : ");
    $prix = saisirEntierPositif("Entrer le prix : ");
    $quantite = saisirEntierPositif("Entrer la quantité : ");
 
    $categories[$indexCategorie]['produits'][] = creerProduit($nom, $reference, $prix, $quantite);
 
    echo "Produit ajouté avec succès.\n";
}

//5-

function ajouterCategorieAvecProduits(array &$categories): void
{
    $code = saisirCodeCategorie($categories);
    $nom = saisirChampObligatoire("Entrer le nom : ");
 
    $nouvelleCategorie = creerCategorie($nom, $code);
 
    do {
        
        $reference = saisirReference($categories, $nouvelleCategorie['produits']);
        $nomProduit = saisirChampObligatoire("Entrer le nom du produit : ");
        $prix = saisirEntierPositif("Entrer le prix : ");
        $quantite = saisirEntierPositif("Entrer la quantité : ");
 
        $nouvelleCategorie['produits'][] = creerProduit($nomProduit, $reference, $prix, $quantite);
 
        $reponse = strtolower(readline("Voulez-vous ajouter un autre produit ? (oui/non) : "));
    } while ($reponse == "oui");
 
    $categories[] = $nouvelleCategorie;
 
    echo "Catégorie enregistrée avec succès.\n";
}



$categories = initialiserCategories();
 
afficherCategorieSansProduit($categories);
ajouterCategorie($categories);
ajouterProduitDansCategorie($categories);
ajouterCategorieAvecProduits($categories);

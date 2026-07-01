
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

$categories = initialiserCategories();
print_r($categories);

//2-
 function afficheCategorieSansProduit(array $categories): void{
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
 



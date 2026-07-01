<?php
//1-
$categories =[
            0=> [
                'nom'=>'alimentaire',
                'code'=> 'C01',
                'produits'=>[
                        0=>[
                            'nom'=>'lait',
                            'reference'=>'ref1',
                            'prix'=> 150,
                            'quantite'=>200
                        ],
                        1=>[
                            'nom'=>'sucre',
                            'reference'=>'ref2',
                            'prix'=> 50,
                            'quantite'=>1000
                        ],
                ],
            ],
            1=> [
                'nom'=>'hygiene',
                'code'=> 'C02',
                'produits'=>[]   
            ]

];

//2- 

foreach ($categories as $index => $categorie) {
    if(empty($categorie['produits'])){
        echo "la categorie ".$categorie['nom']." n'a pas de produit\n";
    }
    
}

//3 

do {
    $codeExiste = false;
    $code = readline("entrer le code ");
    if(empty($code)){
        echo "champs obligatoire \n";
    }else{
        foreach ($categories as $key => $categorie) {
           if($categorie['code']==$code){
                $codeExiste = true;
               echo "le code exist ";
           }
        }
    }

} while (empty($code) || $codeExiste);

do {
    $nom = readline("Entrer le nom : ");

    if (empty($nom)) {
        echo "Champ obligatoire.\n";
    }

} while (empty($nom));

$categories[] = [
    'nom' => $nom,
    'code' => $code,
    'produits' => []
];

echo "Catégorie enregistrée avec succès.\n";

//4-
//a
$codeCategorie = readline("Entrer le code de la catégorie a recherche: ");

$categorieTrouvee = -1;

foreach ($categories as $index => $categorie) {
    if ($categorie['code'] == $codeCategorie) {
        $categorieTrouvee = $index;
        break;
    }
}

if ($categorieTrouvee == -1) {
    echo "Catégorie introuvable.\n";
    exit;
}
//b
do {
    $referenceExiste = false;
    $reference = readline("Entrer la référence : ");

    if (empty($reference)) {
        echo "Champ obligatoire.\n";
    } else {
        foreach ($categories as $categorie) {
            foreach ($categorie['produits'] as $produit) {
                if ($produit['reference'] == $reference) {
                    $referenceExiste = true;
                    echo "Cette référence existe déjà.\n";
                }
            }
        }
    }

} while (empty($reference) || $referenceExiste);
//c
do {
    $nom = readline("Entrer le nom du produit : ");

    if (empty($nom)) {
        echo "Champ obligatoire.\n";
    }

} while (empty($nom));
//d
do {
    $prix = (int) readline("Entrer le prix : ");

    if ($prix <= 0) {
        echo "Le prix doit être positif.\n";
    }

} while ($prix <= 0);
//e
do {
    $quantite = (int) readline("Entrer la quantité : ");

    if ($quantite <= 0) {
        echo "La quantité doit être positive.\n";
    }

} while ($quantite <= 0);
//f
$categories[$categorieTrouvee]['produits'][] = [
    'nom' => $nom,
    'reference' => $reference,
    'prix' => $prix,
    'quantite' => $quantite
];

echo "Produit ajouté avec succès.\n";

//-5
do {
    $codeExiste = false;
    $code = readline("entrer le code ");
    if(empty($code)){
        echo "champs obligatoire \n";
    }else{
        foreach ($categories as $key => $categorie) {
           if($categorie['code']==$code){
                $codeExiste = true;
               echo "le code exist ";
           }
        }
    }

} while (empty($code) || $codeExiste);

do {
    $nom = readline("Entrer le nom : ");

    if (empty($nom)) {
        echo "Champ obligatoire.\n";
    }

} while (empty($nom));

$nouvelleCategorie= [
    'nom' => $nom,
    'code' => $code,
    'produits' => []
];

do {

   
    do {
        $referenceExiste = false;
        $reference = readline("Entrer la référence : ");

        if (empty($reference)) {
            echo "Champ obligatoire.\n";
        } else {
            foreach ($categories as $categorie) {
                foreach ($categorie['produits'] as $produit) {
                    if ($produit['reference'] == $reference) {
                        $referenceExiste = true;
                        echo "La référence existe déjà.\n";
                    }
                }
            }

            foreach ($nouvelleCategorie['produits'] as $produit) {
                if ($produit['reference'] == $reference) {
                    $referenceExiste = true;
                    echo "La référence existe déjà.\n";
                }
            }
        }

    } while (empty($reference) || $referenceExiste);

    // Nom
    do {
        $nomProduit = readline("Entrer le nom du produit : ");

        if (empty($nomProduit)) {
            echo "Champ obligatoire.\n";
        }

    } while (empty($nomProduit));

    // Prix
    do {
        $prix = (int) readline("Entrer le prix : ");

        if ($prix <= 0) {
            echo "Le prix doit être positif.\n";
        }

    } while ($prix <= 0);

    // Quantité
    do {
        $quantite = (int) readline("Entrer la quantité : ");

        if ($quantite <= 0) {
            echo "La quantité doit être positive.\n";
        }

    } while ($quantite <= 0);

    // Ajout du produit
    $nouvelleCategorie['produits'][] = [
        'nom' => $nomProduit,
        'reference' => $reference,
        'prix' => $prix,
        'quantite' => $quantite
    ];

    $reponse = strtolower(readline("Voulez-vous ajouter un autre produit ? (oui/non) : "));

} while ($reponse == "oui");

$categories[] = $nouvelleCategorie;

echo "Catégorie enregistrée avec succès.\n";
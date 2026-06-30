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
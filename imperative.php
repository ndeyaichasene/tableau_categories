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

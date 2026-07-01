
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

<?php 

return [
    [
        "name" => "Kepala",
        "flag" => "HeadtoToe",
        "label" => "Kepala",
        "childs" => [
            [
                "name" => "Tengkorak",
                "flag" => "SkullAnatomy",
                "label" => "Tengkorak",
                "childs" => [],
            ],
            include __DIR__.'/head-to-toe/wajah.php',            
        ]
    ],
    [
        "name" => "Leher",
        "flag" => "HeadtoToe",
        "label" => "Leher",
        "childs" => [
            [ "name" => "Tenggorokan", "flag" => "ThroatAnatomy", "label" => "Tenggorokan", "childs" => [] ],
            [ "name" => "Laring", "flag" => "LarynxAnatomy", "label" => "Laring", "childs" => [] ],
            [ "name" => "Kelenjar Tiroid", "flag" => "ThyroidGlandAnatomy", "label" => "Kelenjar Tiroid", "childs" => [] ]
        ]
    ],
    [
        "name" => "Dada",
        "flag" => "HeadtoToe",
        "label" => "Dada",
        "childs" => [
            [ "name" => "Paru-paru", "flag" => "LungsAnatomy", "label" => "Paru-paru", "childs" => [] ],
            [ "name" => "Jantung", "flag" => "HeartAnatomy", "label" => "Jantung", "childs" => [] ],
            [
                "name" => "Payudara (Perempuan)",
                "flag" => "BreastAnatomy",
                "label" => "Payudara",
                "childs" => [
                    [
                        "name" => "Payudara Kiri",
                        "flag" => "BreastAnatomy",
                        "label" => "Payudara Kiri",
                        "childs" => []
                    ],
                    [
                        "name" => "Payudara Kanan",
                        "flag" => "BreastAnatomy",
                        "label" => "Payudara Kanan",
                        "childs" => []
                    ]
                ]
            ]
        ]
    ],
    [
        "name" => "Abdomen",
        "flag" => "HeadtoToe",
        "label" => "Perut",
        "childs" => [
            [ "name" => "Lambung", "flag" => "StomachAnatomy", "label" => "Lambung", "childs" => [] ],
            [ "name" => "Hati", "flag" => "LiverAnatomy", "label" => "Hati", "childs" => [] ],
            [ "name" => "Usus", "flag" => "IntestinesAnatomy", "label" => "Usus", "childs" => [] ],
            [ "name" => "Pankreas", "flag" => "PancreasAnatomy", "label" => "Pankreas", "childs" => [] ],
            [ "name" => "Limpa", "flag" => "SpleenAnatomy", "label" => "Limpa", "childs" => [] ]
        ]
    ],
    [
        "name" => "Panggul",
        "flag" => "HeadtoToe",
        "label" => "Panggul",
        "childs" => [
            [ "name" => "Kandung Kemih", "flag" => "BladderAnatomy", "label" => "Kandung Kemih", "childs" => [] ],
            [ "name" => "Organ Reproduksi", "flag" => "ReproductiveOrgansAnatomy", "label" => "Organ Reproduksi", "childs" => [] ],
            [ "name" => "Rektum", "flag" => "RectumAnatomy", "label" => "Rektum", "childs" => [] ]
        ]
    ],
    [
        "name" => "Ekstremitas Atas",
        "flag" => "HeadtoToe",
        "label" => "Ekstremitas Atas",
        "childs" => [
            [ "name" => "Bahu", "flag" => "ShouldersAnatomy", "label" => "Bahu", "childs" => [] ],
            [ "name" => "Lengan Atas", "flag" => "ArmsAnatomy", "label" => "Lengan Atas", "childs" => [] ],
            [ "name" => "Siku", "flag" => "ElbowsAnatomy", "label" => "Siku", "childs" => [] ],
            [ "name" => "Lengan Bawah", "flag" => "ForearmsAnatomy", "label" => "Lengan Bawah", "childs" => [] ],
            [ "name" => "Pergelangan Tangan", "flag" => "WristsAnatomy", "label" => "Pergelangan Tangan", "childs" => [] ],
            [ "name" => "Tangan", "flag" => "HandsAnatomy", "label" => "Tangan", "childs" => [] ],
            [ "name" => "Jari", "flag" => "FingersAnatomy", "label" => "Jari", "childs" => [] ]
        ]
    ],
    [
        "name" => "Ekstremitas Bawah",
        "flag" => "HeadtoToe",
        "label" => "Ekstremitas Bawah",
        "childs" => [
            [ "name" => "Panggul", "flag" => "HipsAnatomy", "label" => "Panggul", "childs" => [] ],
            [ "name" => "Paha", "flag" => "ThighsAnatomy", "label" => "Paha", "childs" => [] ],
            [ "name" => "Lutut", "flag" => "KneesAnatomy", "label" => "Lutut", "childs" => [] ],
            [ "name" => "Betis", "flag" => "CalvesAnatomy", "label" => "Betis", "childs" => [] ],
            [ "name" => "Pergelangan Kaki", "flag" => "AnklesAnatomy", "label" => "Pergelangan Kaki", "childs" => [] ],
            [ "name" => "Kaki", "flag" => "FeetAnatomy", "label" => "Kaki", "childs" => [] ],
            [ "name" => "Jari Kaki", "flag" => "ToesAnatomy", "label" => "Jari Kaki", "childs" => [] ]
        ]
    ],
    [
        "name" => "Punggung",
        "flag" => "HeadtoToe",
        "label" => "Punggung",
        "childs" => [
            [ "name" => "Punggung Atas", "flag" => "UpperBack", "label" => "Punggung Atas", "childs" => [] ],
            [ "name" => "Punggung Bawah", "flag" => "LowerBack", "label" => "Punggung Bawah", "childs" => [] ],
            [ "name" => "Tulang Belakang", "flag" => "Spine", "label" => "Tulang Belakang", "childs" => [] ]
        ]
    ]
];

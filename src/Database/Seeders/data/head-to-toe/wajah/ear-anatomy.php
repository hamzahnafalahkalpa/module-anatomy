<?php 

return [ 
    "name" => "Telinga", 
    "flag" => "EarAnatomy", 
    "label" => "Telinga", 
    "childs" => [
        [
            "name" => "Telinga Luar",
            "flag" => "EarAnatomy",
            "label" => "Telinga Luar",
            "childs" => [
                [ "name" => "Pinna", "flag" => "Pinna", "label" => "Pinna", "childs" => [] ],
                [ "name" => "Saluran Telinga", "flag" => "EarCanal", "label" => "Saluran Telinga", "childs" => [] ]
            ]
        ],
        [
            "name" => "Telinga Tengah",
            "flag" => "EarAnatomy",
            "label" => "Telinga Tengah",
            "childs" => [
                [ "name" => "Gendang Telinga", "flag" => "Eardrum", "label" => "Gendang Telinga", "childs" => [] ],
                [
                    "name" => "Ossicles",
                    "flag" => "Ossicles",
                    "label" => "Ossicles",
                    "childs" => [
                        [ "name" => "Malleus", "flag" => "Malleus", "label" => "Malleus", "childs" => [] ],
                        [ "name" => "Incus", "flag" => "Incus", "label" => "Incus", "childs" => [] ],
                        [ "name" => "Stapes", "flag" => "Stapes", "label" => "Stapes", "childs" => [] ]
                    ]
                ]
            ]
        ],
        [
            "name" => "Telinga Dalam",
            "flag" => "EarAnatomy",
            "label" => "Telinga Dalam",
            "childs" => [
                [ "name" => "Koklea", "flag" => "Cochlea", "label" => "Koklea", "childs" => [] ],
                [ "name" => "Vestibular", "flag" => "Vestibular", "label" => "Vestibular", "childs" => [] ]
            ]
        ]
    ] 
];
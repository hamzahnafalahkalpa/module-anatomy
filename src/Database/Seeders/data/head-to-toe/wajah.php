<?php 

return [
    "name" => "Wajah",
    "flag" => "Face",
    "label" => "Wajah",
    "childs" => [
        include __DIR__.'/wajah/eye-anatomy.php',
        include __DIR__.'/wajah/ear-anatomy.php',
        include __DIR__.'/wajah/nose-anatomy.php',
        [
            "name" => "Mulut",
            "flag" => "Mouth",
            "label" => "Mulut",
            "childs" => [
                [
                    "name" => "Gigi",
                    "flag" => "DentalAnatomy",
                    "label" => "Gigi",
                    "childs" => include __DIR__.'/wajah/dental-anatomy.php',            
                ],
                [ "name" => "Lidah", "flag" => "Tongue", "label" => "Lidah", "childs" => [] ],
                [ "name" => "Langit-langit", "flag" => "Palate", "label" => "Langit-langit", "childs" => [] ],
                [ "name" => "Tonsil", "flag" => "Tonsil", "label" => "Tonsil", "childs" => [] ]
            ]
        ]
    ]
];
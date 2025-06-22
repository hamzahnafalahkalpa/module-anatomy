<?php 

return [
    "name" => "Hidung",
    "flag" => "NoseAnatomy",
    "label" => "Hidung",
    "childs" => [
        [
            "name" => "Bagian Luar",
            "flag" => "NoseAnatomy",
            "label" => "External Nose",
            "childs" => [
                [ "name" => "Pangkal Hidung", "flag" => "NoseAnatomy", "label" => "Nasal Root", "childs" => [] ],
                [ "name" => "Batang Hidung", "flag" => "NoseAnatomy", "label" => "Nasal Bridge", "childs" => [] ],
                [ "name" => "Ujung Hidung", "flag" => "NoseAnatomy", "label" => "Nasal Tip", "childs" => [] ],
                [ "name" => "Lubang Hidung", "flag" => "NoseAnatomy", "label" => "Nares", "childs" => [] ],
                [ "name" => "Sayap Hidung", "flag" => "NoseAnatomy", "label" => "Alae", "childs" => [] ]
            ]
        ],
        [
            "name" => "Rongga Hidung",
            "flag" => "NoseAnatomy",
            "label" => "Nasal Cavity",
            "childs" => [
                [ "name" => "Septum Nasi", "flag" => "NoseAnatomy", "label" => "Nasal Septum", "childs" => [] ],
                [ "name" => "Konka Nasi", "flag" => "NoseAnatomy", "label" => "Nasal Concha", "childs" => [] ],
                [ "name" => "Meatus Nasi", "flag" => "NoseAnatomy", "label" => "Nasal Meatus", "childs" => [] ]
            ]
        ],
        [
            "name" => "Nasofaring",
            "flag" => "NoseAnatomy",
            "label" => "Nasopharynx",
            "childs" => [
                [ "name" => "Tuba Eustachius", "flag" => "NoseAnatomy", "label" => "Eustachian Tube", "childs" => [] ],
                [ "name" => "Atap Nasofaring", "flag" => "NoseAnatomy", "label" => "Nasopharyngeal Roof", "childs" => [] ]
            ]
        ]
    ]
];

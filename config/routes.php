<?php
    return array(
        "user/([a-z]+-*[a-z]*)/" => "user/$1",
        "products/([a-z]+-*[a-z]*)/([a-z]+-*[a-z]*)/([0-9]+)" => "products/showProduct/$1/$2/$3",
        "products/([a-z]+-*[a-z]*)/([a-z]+-*[a-z]*)" => "products/showProducts/$1/$2",
        "products/search/" => "products/search",
        "products/filter/" => "products/filter",
        "products/([a-z]+-*[a-z]*)" => "products/showCategories/$1",
        "main" => "main/showMain"
    );
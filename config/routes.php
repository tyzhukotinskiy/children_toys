<?php
    return array(
        "products/([a-z]+-*[a-z]*)/([a-z]+-*[a-z]*)/([0-9]+)" => "products/showProduct/$1/$2/$3",
        "products/([a-z]+-*[a-z]*)/([a-z]+-*[a-z]*)" => "products/showProducts/$1/$2",
        "products/([a-z]+-*[a-z]*)" => "products/showCategories/$1",
        "main" => "main/showMain"
    );
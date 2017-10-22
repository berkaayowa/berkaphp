<?php


$paths = array(

    "route"=>[
        "BerkaPhp/Router/Dispacher/"
    ],

    "database"=> [
        "BerkaPhp/Database/"
    ],

    "controllers"=> [
        "BerkaPhp/Controllers/",
        "Controllers/Default/"
    ],

    "components"=> [
        "BerkaPhp/Controllers/Components/",
        "Controllers/Components/"
    ],

    "model"=> [
        "BerkaPhp/Models/",
        "Models/"
    ],

    "views"=> [
        "BerkaPhp/Template/"
    ],

    "helpers"=> [
        "BerkaPhp/Helpers/"
    ]
);

?>






























































<?php

foreach($paths as $path) {
    foreach($path as $fileInfo => $filePath) {
        foreach (glob($filePath."*.php") as $filename)
        {
            if(file_exists($filename)) {
                require_once($filename);
            } else {

            }
        }
    }
}

?>


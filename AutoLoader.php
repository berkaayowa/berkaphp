<?php


$paths = array(

    "route"=>[
        "berkaPhp/Router/Dispacher/"
    ],

    "database"=> [
        "berkaPhp/Database/"
    ],

    "controllers"=> [
        "berkaPhp/Controllers/",
        "Controllers/Default/"
    ],

    "components"=> [
        "berkaPhp/Controllers/Components/",
        "Controllers/Components/"
    ],

    "model"=> [
        "berkaPhp/Models/",
        "Models/"
    ],

    "views"=> [
        "berkaPhp/Template/"
    ],

    "helpers"=> [
        "berkaPhp/Helpers/"
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


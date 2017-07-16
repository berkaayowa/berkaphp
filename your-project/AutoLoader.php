<?php


$paths = array(

    "route"=>[
        "berkaPhp/config/Router/"
    ],

    "database"=> [
        "berkaPhp/database/"
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
        "berkaPhp/models/",
        "Models/"
    ],

    "views"=> [
        "berkaPhp/template/"
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


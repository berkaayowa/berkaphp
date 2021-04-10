<?php


$paths = array(

    "route"=>[

        "BerkaPhp/Router/Dispatcher/",
        "Config/Route/",
        "BerkaPhp/Framework/Config/Route/",
    ],

    "errors"=> [
        "Config/Redirect/",
        "BerkaPhp/Error/"
    ],

    "database"=> [
        "BerkaPhp/Database/",
        "BerkaPhp/ThirdParty/"
    ],

    "baseViews"=> [
        "BerkaPhp/View/"
    ],

    "controllers"=> [
        "BerkaPhp/Controller/",
        "BerkaPhp/Framework/Controllers/Framework/",
        "Controllers/Client/",
        "Controllers/Admin/",
        "Controllers/Share/"
    ],

    "components"=> [
        "BerkaPhp/Controller/Components/",
        "Controller/Components/",
        "Controller/Components/ComponentFiles/Email/",
        "Controller/Components/ComponentFiles/PayFast/",
        "Controller/Components/ComponentFiles/PayPal/"
    ],

    "model"=> [
        "BerkaPhp/Model/",
        "Models/"
    ],

    "views"=> [
        "BerkaPhp/Template/"
    ],

    "helpers"=> [
        "BerkaPhp/Helper/"
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


<?php
namespace Controller\Framework;
use BerkaPhp\Controller\BerkaPhpController;
use BerkaPhp\Helper\Debug;

class PageController extends BerkaPhpController
{

    function __construct() {
        parent::__construct(false);
    }

    /* Display all users from database
    *  Client action in this controller
    *  @author berkaPhp
    */

    function index() {

        $this->view->render();

    }

    function action() {

        $this->view->render();

    }

    function controller() {

        $this->view->render();

    }

    function view() {

        $this->view->render();

    }

    function setup() {

        $this->view->render();

    }

    function layout() {

        $this->view->render();

    }


    function onResourceReady($resource)
    {
        //Debug::PrintOut($resource);
        return $resource;
    }


}

?>
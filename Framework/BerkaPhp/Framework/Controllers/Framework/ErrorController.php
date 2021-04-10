<?php
namespace Controller\Framework;
use BerkaPhp\Controller\BerkaPhpController;
use BerkaPhp\Helper\Debug;

class ErrorController extends BerkaPhpController
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

    function no_found($params = '') {
        $details = $params['args']['query'];
        $this->view->set("params", $details);
        $this->view->render();
    }

    function templatenotfound($params) {

        $details = $params['args']['query'];
        $this->view->set("params", $details);

    }

    function controllernotfound($params) {

        $details = $params['args']['query'];
        $this->view->set("params", $details);
        $this->view->render();

    }

    function actionnotfound($params) {

        $details = $params['args']['query'];
        $this->view->set("params", $details);
        $this->view->render();

    }

    function modelnotfound($params) {

        $details = $params['args']['query'];
        $this->view->set("params", $details);
        $this->view->render();

    }

    function componentnotfound($params) {
        $details = $params['args']['query'];
        $this->view->set("params", $details);
        $this->view->render();
    }

    function onResourceReady($resource) {
        return $resource;
    }


}

?>
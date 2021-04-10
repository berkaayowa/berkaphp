<?php
	namespace Controller\Client;
	use BerkaPhp\Controller\BerkaPhpController;
    use BerkaPhp\Helper\Debug;
    use BrkORM\T;


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

        function onResourceReady($resource){
           // Debug::PrintOut($resource);
            return $resource;
        }


	}

?>
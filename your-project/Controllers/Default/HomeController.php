<?php
	namespace controller;
	require_once('AutoLoader.php');
	use autoload\AppClassLoader;
	AppClassLoader::loadControllerRequires();
	use berkaPhp\Controller\AppController;
	use berkaPhp\template\AppView;

	class HomeController extends AppController
	{
		private $flash;
		private $paginate;

		function __construct() {
			parent::__construct();
			$this->flash = $this->load_component('Flash');
			$this->paginate = $this->load_component('Paginate');
		}

		function index() {
            //$testimonials = $this->load_model('Testimonials')->fetch_all();
            //$our_team = $this->load_model('Our_team')->fetch_all();
            $services = $this->load_model('Services')->fetch_all();
            //$about = $this->load_model('About_us')->fetch_all();
            //$social_media = $this->load_model('Social_media')->fetch_all();

            //$this->appView->set('testimonials', $testimonials);
			//$this->appView->set('our_team', $our_team);
           // $this->appView->set('About_us', $about);
            $this->appView->set('services', $services);
			//$this->appView->set('social_media', $social_media);


			$this->appView->render();
		}

	}

?>
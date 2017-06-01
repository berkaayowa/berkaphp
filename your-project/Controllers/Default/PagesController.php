<?php
	namespace controller;
	require_once('AutoLoader.php');
	use autoload\AppClassLoader;
	AppClassLoader::loadControllerRequires();
	use berkaPhp\Controller\AppController;
	use berkaPhp\template\AppView;

	class PagesController extends AppController
	{
        private $open_graph;
		function __construct() {
			parent::__construct();
            $this->open_graph = $this->load_component("Opengraph");
		}

		function view($params) {
			$page_link = $params['params'];

			$result = $this->model->fetch_by(['page_link'=>$page_link]);

            $meta_tags = $this->open_graph->meta_tags([
                ['property' => 'fb:app_id', 'content' => FBK_APP_KEY],
                ['name' => 'description', 'content' => $result[0]['page_subtitle']],
                ['property' => 'og:url', 'content' => SITE_URL."/pages/views/{$result[0]['page_link']}"],
                ['property' => 'og:type', 'content' => "article"],
                ['property' => 'og:title', 'content' => $result[0]['page_title']],
                ['property' => 'og:description', 'content' => $result[0]['page_subtitle']],
                ['property' => 'og:image', 'content' => 'http://www.hypebot.com/.a/6a00d83451b36c69e201bb095cd81a970d-600wi']
            ]);

            $this->appView->set_meta_tag($meta_tags);
            $this->appView->set('title',$result[0]['page_title']);
			$this->appView->set('page',$result);
			$this->appView->render();
		}


		function search() {
			$tag = $this->get_POST_key('search');
			$result = $this->model->fetch_like($tag);
			$this->appView->set('pages',$result);
			$this->appView->run_render('index');
		}

	}

?>
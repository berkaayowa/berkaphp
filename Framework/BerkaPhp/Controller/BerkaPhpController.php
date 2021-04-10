<?php
namespace BerkaPhp\Controller;

use BerkaPhp\Helper\Debug;
use Config\Router\Error;

class BerkaPhpController
{
    protected $view;
    protected $variable;
    protected $session;
    protected $cookie;
    private $resource;

    function __construct()
    {
        $this->session = new \BerkaPhp\Helper\SessionHelper();
        $this->cookie = new \BerkaPhp\Helper\CookieHelper();

        $this->resource = array();
        $this->variable = array();

        $this->view = new \BerkaPhp\Template\AppView();

    }

    public function setResource($resource = array())
    {
        $this->resource = $this->onResourceReady($resource);
        $this->resource['resources']['template']['path'] = $this->setLayout($this->resource['resources']['template']['path']);
        $this->view->setResource($this->resource);
    }

    protected function onResourceReady($resource)
    {
        return $resource;
    }

    function overWriteView($path)
    {
        $this->resource['resources']['view']['path'] = 'Views'.$path;
        $this->view->setResource($this->resource);
    }

    function overWriteLayout($path)
    {
        $this->resource['resources']['template']['path'] = 'Views'.$path;
        $this->view->setResource($this->resource);
    }

    protected function setLayout($path)
    {
        return $path;
    }

    protected function console($value) {
        $this->view->set('flash',$value);
    }
    /* fetches all data from database
    * @access public
    * @param  [$query] query to be executed
    * @return [array] array of customers
    * @author berkaPhp
    */
    protected function LoadModel($model_name) {
        $model = "models\\".$model_name."Model";
        return  new $model();
    }
    /* fetches all data from database
    * @access public
    * @param  [$query] query to be executed
    * @return [array] array of customers
    * @author berkaPhp
    */
    private function getCurrentModel($current_model) {
        $current_model = str_replace('Controller','',$current_model);
        $current_model = str_replace('controller','',$current_model);
        $current_model = str_replace(PREFIX,'',$current_model);
        $current_model = str_replace('\\','',$current_model);
        return trim($current_model);
    }

    /* fetches all data from database
    * @access public
    * @param  [$query] query to be executed
    * @return [array] array of customers
    * @author berkaPhp
    */
    /**
     * @param $component_name
     */
    protected function LoadComponent($component_name) {

        $path = 'Controllers/Components/'.$component_name.'Component.php';

        if(\BerkaPhp\Helper\FileStream::fileExist($path)) {
            $component = "\\controller\\component\\".$component_name."Component";
            return  new $component();
        } else {

            Error::OnComponentNotFound('?path='.$path.'&name='.$component_name);
        }

    }

    /* fetches all data from database
    * @access public
    * @param  [$query] query to be executed
    * @return [array] array of customers
    * @author berkaPhp
    */
    protected function getPost() {
        return $_POST;
    }
    /* fetches all data from database
    * @access public
    * @param  [$query] query to be executed
    * @return [array] array of customers
    * @author berkaPhp
    */
    protected function getPostKey($key, $default = '') {
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }
    /* fetches all data from database
    * @access public
    * @param  [$query] query to be executed
    * @return [array] array of customers
    * @author berkaPhp
    */
    protected function jsonFormat($values) {
        $this->view->autoRender = false;
        return print(json_encode($values));

    }

    private function checkModelExist($path, $name='') {

        if(\BerkaPhp\Helper\FileStream::fileExist($path)) {
            return true;
        } else {
            Error::OnModelNotFound('?path='.$path.'&name='.$name);
        }

    }


}

?>
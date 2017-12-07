<?php
/**
 * Created by PhpStorm.
 * User: berka
 * Date: 2017/11/24
 * Time: 01:09
 */

namespace berkaPhp\views\elment;

class BerkaPhpForm {

    private $formFields;
    private $buttons;
    private $action;
    private $url;

    public function _construct() {
        $this->formFields = "";
        $this->url = "";
        $this->action = "";
        $this->buttons = "";
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }



    public function addField($colView) {
        $this->formFields.=$colView;
    }
}

?>
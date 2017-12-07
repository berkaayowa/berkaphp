<?php
/**
 * Created by PhpStorm.
 * User: berka
 * Date: 2017/11/23
 * Time: 23:49
 */
namespace berkaPhp\views;
use berkaPhp\model\BerkaPhpModel;
use berkaPhp\views\elment\BerkaPhpColumnTemplate;
use berkaPhp\views\elment\BerkaPhpForm;

class  BerkaPhpEditView {

    private $columns;
    private $title;
    private $form;

    function __construct()
    {
        $this->columns = array();
        $this->form = new \BerkaPhpForm();
    }

    public function applySettingsOnColumns($columns) {
        return $columns;
    }

    private function setColumnView() {
        foreach($this->columns as $column) {

           switch($column->getType()) {

           }

            $this->form->addField($column->getView());

        }
    }




}

?>
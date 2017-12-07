<?php
/**
 * Created by PhpStorm.
 * User: berka
 * Date: 2017/11/23
 * Time: 23:53
 */

namespace berkaPhp\model\column;

class BerkaPhpColumn {

    private $value;
    private $Name;
    private $IsForeignKey;
    private $refrenceTable;
    private $isPrimaryKey;
    private $type;
    private $label;
    private $view;

    function _construct() {

        $this->Name = "";
        $this->value = "";
        $this->isPrimaryKey = false;
        $this->IsForeignKey = false;
        $this->refrenceTable = array();
        $this->type = "";
        $this->label = "";
        $this->$view = "";

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param mixed $Name
     */
    public function setName($Name)
    {
        $this->Name = $Name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param mixed $view
     */
    public function setView($view)
    {
        $this->view = $view;
    }

    /**
     * @return mixed
     */
    public function getReferenceTable()
    {
        return $this->refrenceTable;
    }

    /**
     * @param mixed $refrenceTable
     */
    public function setReferenceTable($refrenceTable)
    {
        $this->refrenceTable = $refrenceTable;
    }

    /**
     * @return mixed
     */
    public function getIsPrimaryKey()
    {
        return $this->isPrimaryKey;
    }

    /**
     * @param mixed $isPrimaryKey
     */
    public function setIsPrimaryKey($isPrimaryKey)
    {
        $this->isPrimaryKey = $isPrimaryKey;
    }

    /**
     * @return mixed
     */
    public function getIsForeignKey()
    {
        return $this->IsForeignKey;
    }

    /**
     * @param mixed $IsForeignKey
     */
    public function setIsForeignKey($IsForeignKey)
    {
        $this->IsForeignKey = $IsForeignKey;
    }


}
?>
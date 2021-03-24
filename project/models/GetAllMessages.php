<?php


namespace project\models;


use core\Model;

class GetAllMessages extends Model
{
    private $table = 'messages';
    public function getDataMessages(){
        $this->setTable($this->table);
        return ($this->getDataList());
    }
}
<?php


namespace core;

use R;

abstract class Model
{
    private $data;
    private $table;
    private $query;

    public function __construct()
    {
        R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . '', DB_USER, DB_PASS);
        if (!R::testConnection()) {
            exit ('Нет подключения к БД');
        }
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setTable($table)
    {
        $this->table = $table;
    }

    public function setQuery($query)
    {
        $this->query = $query;
    }


    public function getData()
    {
        return R::findOne($this->table, $this->query, array($this->data));
    }

    public function getDataList()
    {
        return R::findAll($this->table);
    }

    public function save()
    {
        R::store($this->data);
    }

    public function delete()
    {
    }
}

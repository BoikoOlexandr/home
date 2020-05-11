<?php


namespace core\components;


use core\components\dataBase\queryBuilder;

class dataBase
{
    private $di;
    private $pdo;
    private $queryBuilder;
    private $dataBaseConfig;
    private $data;

    public function __construct($di)
    {
        $this->di = $di;
        $this->queryBuilder = new queryBuilder();
        $this->Connect();
    }

    public function InitDi()
    {

    }


    private function Connect()
    {
        $confPath = dir.ds.'core'.ds.'components'.ds.'dataBase'
            .ds.'dataBaseConfig.php';
        $this->dataBaseConfig = require_once $confPath;

        $dsn = $this->dataBaseConfig['baseType'].':dbname='.
            $this->dataBaseConfig['baseName'].';host='.
            $this->dataBaseConfig['host'];
        $this->pdo = new \PDO(
            $dsn,
            $this->dataBaseConfig['user'],
            $this->dataBaseConfig['password']
        );
    }

    //return array in di->data by query method
    public function Query($sql)
    {
        $res = $this->pdo->query($sql);
        $this->di->SetData('Query', $res->fetchAll());
    }

    public function SetProp($sql)
    {
       $this->pdo->query($sql);
    }
    //return array in di->data by execute method
    public function Execute($sql, array $data = [])
    {
        $res = $this->pdo->prepare($sql);
        $res->execute($data);
        if (isset($data)) {
            $this->di->SetData('Execute', $res->fetchAll());
            return true;
        }
        else return false;
    }

    public function Save($sql, array $data = [])
    {
        $res = $this->pdo->prepare($sql);
        foreach ($data as $key=>$value){
            $res->bindParam(':'.$key, $value);
        }

       // $this->pdo->beginTransaction();
        $res->execute($data);

    }



    /**
     * @return queryBuilder
     */
    public function GetQueryBuilder(): queryBuilder
    {
        return $this->queryBuilder;
    }

}
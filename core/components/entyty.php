<?php


namespace core\components;


class entyty
{
    private $di;
    private $dataBase;
    private $table;
    private $data;

    public function __construct($di)
    {
        $this->di = $di;
    }

    public function InitDi()
    {

        $this->dataBase = $this->di->Get('dataBase');
    }

    private function SaveData()
    {
        $this->di->setData('entyty', $this->data);
    }
    //get col names from db
    public function SetTable($tableName)
    {
        $this->data = [];
        $this->table = $tableName;
            $sql = 'SHOW COLUMNS FROM '.$tableName;
        $this->dataBase->Query($sql);
        $this->GetFieldsName($this->di->getDataByKey('Query'));
        return $this;
    }

    public function GetAllFromTables()
    {
        $sql = $this->dataBase->GetQueryBuilder()->
        Start()->
        Select()->
        From($this->table)->
        GetSql();
        print_r($sql);
        $this->dataBase->Execute($sql);
        foreach ($this->di->getDataByKey('Execute') as $key => $value)
            $this->PrepareData(
                $value, $key
            );
        $this->SaveData();
    }

    private function GetFieldsName($data = [])
    {

        foreach ($data as $key => $value ) {
            $this->data[$value['Field']] = null;
        }
        $this->SaveData();
    }

    public function SetData($key, $value)
    {
        if(array_key_exists($key, $this->data))
        {
            $this->data[$key] = $value;
            $this->SaveData();
            return $this;
        }
        else print_r('Key '.$key.' is not exist in '.$this->table);
        return 0;
    }

    public function GetData($key)
    {
        if(isset($this->data[$key]))
        {
            return $this->data[$key];
        }
        else print_r('Key '.$key.' is not exist in '.$this->table);
        return 0;
    }

    public function GetFromTable($all = false)
    {
        foreach ($this->data as $key=>$value)
        {
            if($this->data[$key] != null)
            $data[$key] = $this->data[$key];
        }
        $sql = $this->dataBase->GetQueryBuilder()->
            Start()->
            Select()->
            From($this->table)->
            WhereEx($data)->
            GetSql();
        $this->dataBase->Execute($sql, $data);
        if($all){
            foreach ($this->di->getDataByKey('Execute') as $key => $value)
                $this->PrepareData(
                    $value, $key
                );
        }else {
            $this->PrepareData(
                $this->di->getDataByKey('Execute')[0]
            );
            if ($this->data['ID'] == '') {
                unset($this->data);
                $this->data['error'] = 'empty result';
            };
        }
        $this->SaveData();
    }
    //delete old and rewrite new
    public function Save($old = false)
    {
        if($old) {
            $this->Delete();
        }
        foreach($this->data as $key=>$value) {
            if ($value == null) {
                unset($this->data[$key]);
            }
        }

        $sql = $this->dataBase->GetQueryBuilder()->
        Start()
            ->InsertEx($this->table, $this->data)
            ->GetSql();
        $this->dataBase->Save($sql, $this->data);
    }
    public function Delete()
    {
        $sql = $this->dataBase->GetQueryBuilder()->
        Start()
            ->Delete($this->table)
            ->Where(['ID'=>$this->data['ID']])
            ->GetSql();
        $this->dataBase->Save($sql, $this->data);
    }

    private function PrepareData($data, $num = -1)
    {
        if($num != -1)
        {
            foreach ($this->data as $key => $value) {
                $this->data[$num][$key] = $data[$key];
            }
        }
        else {
            foreach ($this->data as $key => $value) {
                $this->data[$key] = $data[$key];
            }
        }
    }
}
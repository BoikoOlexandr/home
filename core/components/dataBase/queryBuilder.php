<?php


namespace core\components\dataBase;


class queryBuilder
{
    private $sql = "";

    public function getSql()
    {
        return $this->sql;
    }

    public function Start()
    {
        $this->sql = '';
        return $this;
    }

    public function Select($str = '*')
    {
        $this->sql .= "SELECT ".$str;
        return $this;
    }

    public function Delete($str = '*')
    {
        $this->sql .= "DELETE FROM ".$str;
        return $this;
    }

    public function Update($str = '*')
    {
        $this->sql .= "UPDATE ".$str.' ';
        return $this;
    }

    public function Set($data)
    {
        $this->sql .= "SET ";
        foreach ($data as $key=> $value)
        {
            if ($key === array_key_last($data)){
                $this->sql .= $this->Key($key, ' =').$this->Value($value, ' ');
            }else
            $this->sql .= $this->Key($key, ' =').$this->Value($value, ', ');
        }
        return $this;
    }



    public function SetEx($data)
    {
        $this->sql .= "SET ";
        foreach ($data as $key=> $value)
        {
            if ($key === array_key_last($data)){
                $this->sql .= $this->Key($key, ' =').' :'.$key.' ';
            }else
                $this->sql .= $this->Key($key, ' =').' :'.$key.', ';
        }
        return $this;
    }

    public function From($str)
    {
        $this->sql .= " FROM ".$str;
        return $this;
    }
    public function Insert($tableName, array $data)
    {
        $this->sql .= 'INSERT INTO '.$tableName.' (';
        foreach ($data as $key=>$value)
        {

            if ($key === array_key_last($data))
                $this->sql .=  $this->Key($key, '');
            else
                $this->sql .=  $this->Key($key, ', ');
        }
        $this->sql .= ') VALUES (';
        foreach ($data as $key=>$value)
        {
            if ($key == array_key_last($data))
                $this->sql .=  $this->Value($value);
            else
                $this->sql .= $this->Value($value, ',');
        }
        $this->sql .= ') ';
        return $this;
    }

    public function InsertEx($tableName, array $data)
    {
        $this->sql .= 'INSERT INTO `'.$tableName.'` (';
        foreach ($data as $key=>$value)
        {
            if ($key === array_key_last($data))
                $this->sql .=  $this->Key($key, '');
            else
                $this->sql .=  $this->Key($key, ', ');
        }
        $this->sql .= ') VALUES (';
        foreach ($data as $key=>$value)
        {
            if ($key == array_key_last($data))
                $this->sql .=  ' :'.$key;
            elseif($value == 'null')
            {
                $this->sql .= ' NULL,';
            }
            else
                $this->sql .= ' :'.$key.',';
        }
        $this->sql .= ') ';
        return $this;
    }

    public function WhereEx(array $data)
    {
        $this->sql .= ' WHERE ';
        foreach ($data as $key=>$value)
        {
            if ($key == array_key_first($data)) {
                $this->sql .=  $this->Key($key).
                    ' = :'.$key;
                if(count($data) == 1)
                {
                    break;
                }
                continue;
            }

            $this->sql .= ' '.'AND'.' ';


            $this->sql .= $this->Key($key).
                ' = :'.$key;

        }
        return $this;
    }


    public function Where(array $data,   $priopity = 'AND', $operator = '=')
    {
        $this->sql .= ' WHERE ';
        foreach ($data as $key=>$value)
        {
            if ($key == array_key_first($data)) {
                $this->sql .=  $this->Key($key).
                    $operator.
                    $this->Value($value);
                if(count($data) == 1)
                {
                    break;
                }
                continue;
            }

            $this->sql .= ' '.$priopity.' ';


            $this->sql .= $this->Key($key).
                $operator.
                $this->Value($value);

        }
        return $this;
    }



    public function isNotNull($str)
    {
        $this->sql .= ' WHERE '.$str.' iS NOT NULL';
        return $this;
    }


    private function Key($key, $str = ' ')
    {
        return '`'.$key.'`'.$str;
    }

    private function Value($value, $str = ' ')
    {
        return " '".$value."'".$str;
    }


}
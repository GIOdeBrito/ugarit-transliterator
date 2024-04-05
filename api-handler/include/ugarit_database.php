<?php

class __UgaritDB
{
    protected $pdo = NULL;
    
    function __construct ()
    {
        try
        {
            $this->pdo = new PDO("sqlite:".$this->db);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $err)
        {
            echo "DB ERROR: ".$err->getMessage();
        }
    }

    function __destruct ()
    {
        $this->pdo = NULL;
    }

    function query ($cmd, $args = array())
    {
        $res = $this->pdo->prepare($cmd);

        if(!empty($args))
        {
            foreach($args as $param => $value)
            {
                $res->bindParam($param, $value, PDO::PARAM_STR);
            }
        }

        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    function exec ($cmd, $args)
    {
        $res = $this->pdo->prepare($cmd);
        $this->pdo->beginTransaction();

        if(!empty($args))
        {
            foreach($args as $param => $value)
            {
                $res->bindParam($param, $value, PDO::PARAM_STR);
            }
        }

        try
        {
            $res->execute();
            $this->pdo->commit();
            return true;
        }
        catch(Exception $ex)
        {
            $this->pdo->rollback();
            return false;
            //echo $ex->getMessage();
        }
    }
}

class UDatabase extends __UgaritDB
{
    protected $db = './sql/ugarit_database.db';
}

?>
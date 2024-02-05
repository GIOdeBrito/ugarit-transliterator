<?php

class UDatabase
{
    protected $db = '../sql/ugarit_words_base.db';
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

    function query ($cmd)
    {
        $res = $this->pdo->prepare($cmd);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
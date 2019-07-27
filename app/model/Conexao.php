<?php

namespace app\model;

abstract class Conexao
{
    protected $pdo;
    public function __construct()
    {

        //$host   = 'localhost';
        $host   = 'postgres-app';
        $port   = 5432;
        $user   = 'postgres';
        $pass   = 'crud';
        $dbname = 'crud';

        $dsn = "pgsql:host={$host};dbname={$dbname};port={$port}";

        $this->pdo = new \PDO($dsn,$user,$pass);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }
}
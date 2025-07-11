<?php

class Conexao {
    private $server = "localhost";
    private $banco = "enderecos";
    private $usuario = "root";
    private $senha = "bancodedados"; //senha do mysql, phpmyadmin, o bancodedados e a senha do lab

    function conectar(){
        try {
            $conn = new PDO(
                "mysql:host=" . $this->server . ";dbname=" . $this->banco, $this->usuario, $this->senha
            );
            return $conn;
        } catch (Exception $e) {
            echo "Erro ao conectar com o Banco de dados: " . $e->getMessage();
        }
    }
}

(new Conexao())->conectar();
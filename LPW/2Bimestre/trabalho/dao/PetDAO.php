<?php

require_once("util/Conexao.php");
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

class PetDAO
{
    public function Cadastar($objeto)
    {
        $con = Conexao::getConexao();
        $sql = "INSERT INTO pet (nome, raca, cor, genero, porte, foto, curiosidade)
        VALUES
        (?, ?, ?, ?, ?, ?, ?)";
        $stm = $con->prepare($sql);
        return $stm->execute([
            $objeto->getNome(),
            $objeto->getRaca(),
            $objeto->getCor(),
            $objeto->getGenero(),
            $objeto->getPorte(),
            $objeto->getFoto(),
            $objeto->getCuriosidade()
        ]);
    }


    public function Listar()
    {
        $sql = "SELECT * FROM pet";
        $con = Conexao::getConexao();

        $stm = $con->prepare($sql);
        $stm->execute();
        $pets = $this->MapPets($stm->fetchAll());
        return $pets;
    }

    public function Buscar($id)
    {
        $sql = "SELECT * FROM pet WHERE id = ?";

        $con = Conexao::getConexao();
        $stm = $con->prepare($sql);
        $stm->execute([$id]);
        $pets = $this->mapPets($stm->fetchAll());

        if (count($pets)) {
            return $pets[0];
        } else {
            return null;
        }
    }

    public function MapPets(array $arrayAssoc)
    {
        //Vai mapear os dados do banco para o objeto, pois os dados estão ainda como um array associativo
        $pets = array();
        foreach ($arrayAssoc as $array) {
            $pet = new Pet(
                $array['nome'],
                $array['raca'],
                $array['cor'],
                $array['genero'],
                $array['porte'],
                $array['foto'],
                $array['curiosidade'],
                $array['id']
            );
            array_push($pets, $pet);
        }
        return $pets;
    }

    public function Excluir($id)
    {
        $con = Conexao::getConexao();
        //prepara o comando sql -> preparar a stm -> executar com array passando o parametro id
        $sql = "DELETE FROM pet WHERE id = ?;";
        $stm = $con->prepare($sql);
        return $stm->execute([$id]);
    }
}

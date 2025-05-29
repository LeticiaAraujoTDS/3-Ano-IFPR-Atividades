<?php
include "conexao.php";
//não precisa mudar o nome da clsse, pode ser CriaClasses1 em todas elas, que não vai interfirir
class CriaClasses3
{
    private $con;
    function __construct()
    {
        $this->con = (new Conexao())->conectar(); //faz a conexão com o banco
    }

    function ClassesModel()
    {
        if (!file_exists("sistema")) { //verifica se o diretório sistema existe - essa função verifica se existe diretório ou arquivo, vale para os dois
            mkdir("sistema"); //cria o diretório
            if (!file_exists("sistema/model")) //verifica se existe o diretório model
                mkdir("sistema/model"); //cria o diretório model
        }
        $sql = "SHOW TABLES"; //comando mysql que retorna as tabelas do banco
        $query = $this->con->query($sql);
        $tabelas = $query->fetchAll(PDO::FETCH_OBJ);

        foreach ($tabelas as $tabela) {
            $nomeTabela = ucfirst(array_values((array) $tabela)[0]);// o (array) vai verificar se o valor recebido pode ser convertido para array, e ai intrepreta e passa para a $tabela o valor recebido como array -> como se convertesse
            //pode ser qualquer tipo, (int), (string), (bool) e etc.
            $conteudo = <<<EOT
<?php
class {$nomeTabela} {
}
?>
EOT;

            file_put_contents("sistema/model/{$nomeTabela}.php", $conteudo);
        }
    }
}

(new CriaClasses3())->ClassesModel();
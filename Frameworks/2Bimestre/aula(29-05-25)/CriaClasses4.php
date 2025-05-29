<?php
include "conexao.php";
//não precisa mudar o nome da clsse, pode ser CriaClasses1 em todas elas, que não vai interfirir
class CriaClasses1
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
        $tabelas = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tabelas as $tabela) {
            $nomeTabela = array_values((array) $tabela)[0];
            $sql = "SHOW COLUMNS FROM ".$nomeTabela;
            $atributos = $this->con->query($sql)->fetchAll(PDO::FETCH_OBJ);
            $nomeAtributos = "";
            foreach ($atributos as $atributo) {
                $nomeAtributos.="private \${$atributo->Field};\n";

            }
            $nomeTabela = ucfirst($nomeTabela);
            $conteudo = <<<EOT
<?php
class {$nomeTabela} {
{$nomeAtributos}
}
?>
EOT;

            file_put_contents("sistema/model/{$nomeTabela}.php", $conteudo);
        }
    }
}

(new CriaClasses1())->ClassesModel();
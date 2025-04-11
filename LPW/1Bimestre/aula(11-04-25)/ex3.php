<?php

if (isset($_GET['cor'])) {
    $cor = $_GET['cor'];
    if ($cor != "") {
        echo "<body style='background-color: {$cor};'></body>";
    } else {
        echo "Passe o valor do parâmetro cor!<br>";
    }
} else {
    echo "Passe o parâmetro cor!<br>";
}

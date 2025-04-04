<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_erros', 1);
// error_reporting(E_ALL);

require_once("modelo/Link.php");
echo "<link rel='stylesheet' href='botao_imagem.css'>";

function desenhaBotao($array, $tema)
{
    echo "<div class='dropdown'>";
    echo "<button class='dropbtn'>" . $tema . "</button>";
    echo "<div class='dropText'>";
    foreach ($array as $valor) {
        echo "<span><img src='" . $valor->getLinkImg() . "' width='20' height='20'>" . $valor->getInfo() . "</span>";
    }
    echo "</div>";
    echo "</div>";
}

$botao1 = array(
    new Link("https://i.pinimg.com/736x/1f/d0/7e/1fd07e1786e734eea0a974cf90080861.jpg", "Scuderia Ferrari"),
    new Link("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOjvv8Uydf_1B9K5YA4SDtN6lzEQWqV7aRUw&s", "Mclaren"),
    new Link("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRinjKEJFGC22ZBsvRRuVC-t4vwl4kTXA_yFA&s", "Mercedes"),
    new Link("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2LZoPhXWE0koRyVnnoi5GDFzuMcsdzaxWvgVmntzHqzez7KczPFXPUSlKzbE4nwSAZEE&usqp=CAU", "Red Bull")
);

echo desenhaBotao($botao1, "Times de F1");

$botao2 = array(
    new Link("https://assets.pokemon.com/assets/cms2/img/pokedex/detail/001.png", "Bulbassauro"),
    new Link("https://assets.pokemon.com/assets/cms2/img/pokedex/detail/004.png", "Charmander"),
    new Link("https://assets.pokemon.com/assets/cms2/img/pokedex/detail/006.png", "Charizard"),
    new Link("https://assets.pokemon.com/assets/cms2/img/pokedex/detail/008.png", "Wartortle")
);

echo desenhaBotao($botao2, "Pokemons");

$botao3 = array(
    new Link("https://e7.pngegg.com/pngimages/499/851/png-clipart-musa-tecna-logo-winx-club-season-1-winx-text-logo-thumbnail.png", "Winx"),
    new Link("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZzfNSy1F6ugf90N8zqFzLlKhWLiPhv2SAiA&s", "Três Espiãs Demais"),
    new Link("https://wallpapers.com/images/hd/bubble-guppies-logo-design-h8tsynldt9guff3m.jpg", "Bubble Guppies")
);

echo desenhaBotao($botao3, "Desenhos");

$botao4 = array(
    new Link("https://img.elo7.com.br/product/zoom/37C7613/matriz-bordado-escudos-times-de-futebol-matriz.jpg", "Flamengo"),
    new Link("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPSw-EL3a2yU6xy627SYAo5Z51Rv_bgDZ6HA&s", "Palmeiras"),
    new Link("https://img.elo7.com.br/product/zoom/274E5E8/escudos-de-times-d-futebol-do-brasil-51-matrizes-d-bordado.jpg", "Cruzeiro"),
    new Link("https://logodownload.org/wp-content/uploads/2016/11/corinthians-logo-0.png", "Corinthians")
);

echo desenhaBotao($botao4, "Times de Futebol");

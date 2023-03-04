<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Vaga;

//BUSCA
$busca = filter_input(INPUT_GET, 'busca', FILTER_VALIDATE_REGEXP, array(
    "options" => array(
        "regexp" => "/^[\w\sáàâãéèêíïóôõöúçñ]+$/u",
    ),
));


//CONDIÇÕES SQL
$condicoes = [
                                      //Tudo que for espaço será substítuido por % dentro de $busca.          
    strlen($busca) ? 'titulo LIKE "%'.str_replace(' ', '%', $busca).'%"' : NULL
];

//CLAÚSULA WHERE
$where = implode(' AND ', $condicoes);

/*echo "<pre>"; 
print_r($condicoes); 
echo "</pre>"; 
*/

//OBTEM AS VAGAS
$vagas = Vaga::getVagas($where);
//echo "<pre>"; print_r($vagas); echo "</pre>"; exit; 

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem.php';
include __DIR__ . '/includes/footer.php';
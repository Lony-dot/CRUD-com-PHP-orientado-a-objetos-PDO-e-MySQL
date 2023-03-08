<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Vaga;
use \App\Db\Pagination;

//BUSCA
$busca = filter_input(INPUT_GET, 'busca', FILTER_VALIDATE_REGEXP, array(
    "options" => array(
        "regexp" => "/^[\w\sáàâãéèêíïóôõöúçñ]+$/u",
    ),
));

//FILTRO DE STATUS
$filtroStatus = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_SPECIAL_CHARS);
    $filtroStatus = in_array($filtroStatus,['s','n']) ? $filtroStatus : '';
/*echo "<pre>"; 
print_r($filtroStatus); 
echo "</pre>";*/


//CONDIÇÕES SQL
$condicoes = [
//Tudo que for espaço será substítuido por % dentro de $busca.          
    strlen($busca) ? 'titulo LIKE "%'.str_replace(' ', '%', $busca).'%"' : NULL,
    strlen($filtroStatus) ? 'ativo = "'.$filtroStatus.'"' : null
];


//REMOVE POSIÇÕES VAZIAS
$condicoes = array_filter($condicoes);


//CLAÚSULA WHERE
$where = implode(' AND ', $condicoes);

//QUANTIDADE TOTAL DE VAGAS
$quantidadeVagas = Vaga::getQuantidadeVagas($where);

//PAGINAÇÃO
$obPagination = new Pagination($quantidadeVagas, $_GET['pagina'] ?? 1, 10);



//OBTEM AS VAGAS
$vagas = Vaga::getVagas($where,null,$obPagination->getLimit());
//echo "<pre>"; print_r($vagas); echo "</pre>"; exit; 

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem.php';
include __DIR__ . '/includes/footer.php';
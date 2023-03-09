<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Session\login;

//OBRIGA O USUÁRIO A NÃO ESTAR LOGADO
Login::requireLogout();


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario-login.php';
include __DIR__ . '/includes/footer.php';
<?php

use App\Config\Security;
use App\DB\ConnectionDB;

ConnectionDB::getConnection();
echo json_encode(Security::createTokenJwt(Security::secretKey(), ['hola']));

// $pass = Security::createPassowrd('ELKIN');

// if(Security::validatePassword('ELKIN', $pass)){
//     echo json_encode('TODO ESTA BIEN');
// }else{
//     echo json_encode('ALGO SALIO MAL');
// }

// echo json_encode(Security::createPassowrd('ELKIN'));

?>
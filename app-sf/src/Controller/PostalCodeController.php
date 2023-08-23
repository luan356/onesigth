<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



 class PostalCodeController extends AbstractController{
    

public function getCep($bd,$cep){

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://viacep.com.br/ws/{$cep}/json/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Erro ao fazer a requisição: ' . curl_error($ch);
} else {
    $data = json_decode($response, true);
    
    if (isset($data['erro'])) {
        echo 'CEP não encontrado';
    } else {
        $Postalcode = new \App\Entity\Postalcode();
        $Postalcode->setLogradouro($data['logradouro']);
        $Postalcode->setBairro($data['bairro']);
        $Postalcode->setLocalidade($data['localidade']);
        $Postalcode->setEstado($data['uf']);

        $bd->persist($Postalcode); //salvar a persistencia em nivel de memoria
        $bd->flush();//executa em definitivo no banco de dados
        $msg= "PostalCode cadastrado com Sucesso";

        // echo 'Logradouro: ' . $data['logradouro'] . '<br>';
        // echo 'Bairro: ' . $data['bairro'] . '<br>';
        // echo 'Cidade: ' . $data['localidade'] . '<br>';
        // echo 'Estado: ' . $data['uf'] . '<br>';
    }
}

curl_close($ch);
}
}

// $cp= new PostalCodeController;
// $cp->getCep('60353190');
// 
?>

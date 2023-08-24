<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostalCodeController extends AbstractController{

    // Classe responsável por controlar as ações relacionadas aos códigos postais

    public function getCep($bd, $cep){

        // Método para obter informações de um CEP da API VIACEP e armazená-las no banco de dados

        $ch = curl_init();
        // Inicia uma nova sessão CURL

        curl_setopt($ch, CURLOPT_URL, "https://viacep.com.br/ws/{$cep}/json/");
        // Define a URL da API VIACEP com o CEP específico

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // Configuração para retornar o resultado da requisição em vez de imprimi-lo diretamente

        $response = curl_exec($ch);
        // Executa a requisição CURL e obtém a resposta da API VIACEP

        if (curl_errno($ch)) {
            // Se houver um erro durante a requisição CURL
            $msg = 'Erro ao fazer a requisição: ' . curl_error($ch);
        } else {
            $data = json_decode($response, true);
            // Decodifica a resposta JSON em um array associativo

            if (isset($data['erro']) || $data == null ) {
                // Se o CEP não for encontrado ou houver um erro na resposta
                $msg = 'CEP não encontrado';
            } else {
                echo 'Logradouro: ' . $data['logradouro'] . '<br>';
                echo 'Bairro: ' . $data['bairro'] . '<br>';
                echo 'Cidade: ' . $data['localidade'] . '<br>';
                echo 'Estado: ' . $data['uf'] . '<br>';

                // Exibe informações relevantes do CEP na saída
                
                $Postalcode = new \App\Entity\Postalcode();
                // Cria uma nova instância da entidade Postalcode (não está claro se é uma entidade real)
                
                $Postalcode->setLogradouro($data['logradouro']);
                $Postalcode->setBairro($data['bairro']);
                $Postalcode->setLocalidade($data['localidade']);
                $Postalcode->setEstado($data['uf']);

                // Define os atributos da instância Postalcode com as informações do CEP
                
                $bd->persist($Postalcode); // Salva a instância em memória para persistência futura
                $bd->flush(); // Executa a persistência definitivamente no banco de dados
                
                $msg = "PostalCode consultado na VIACEP e cadastrado com sucesso";
            }
        }
        echo $msg;

        curl_close($ch);
        // Fecha a sessão CURL
    }
}

// Cria uma instância da classe PostalCodeController
// $cp = new PostalCodeController;
// Chama o método getCep com o CEP '60353190'
// $cp->getCep('60353190');

?>

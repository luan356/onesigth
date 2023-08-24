<?php
namespace App\Controller;

use App\Entity\Postalcode;
use App\Form\CepType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Definy um namespace para a classe, indicando sua localização no projeto

class index extends AbstractController{

    // Define a clase 'index' que herda da clase base 'AbstractController'

    public function consultacep(Request $request, EntityManagerInterface $bd): Response{
   
        // Define um método chamado 'consultacep' que recebe uma requisição e um EntityManager como parâmetros e retorna una Response

        $form = $this->createForm(CepType::class);
        // Cria um formulario do tipo 'CepType'

        $form->hundleRequest($request);
        // Trata a requsição HTTP com o formulario, populando-o com os dados recebidos da requsição
        
        if ($form->isSubmitted() && $form->isValid()) {          
            // Verifica se o formulario foi submetido e se é válido
                
            $cep = $form->getData(); // Obtem os dados do formulario, que incluem o CEP
            $cepValue = $cep['cep'];
            // Obtem o valor do campo de CEP do formulario

            $postalCodeController = new PostalCodeController;
            // Cria uma instançia da clase PostalCodeController (não está claro se esta é una clase personalizada ou de algum framework)

            $postalCodeController->getCep($bd, $cepValue);
            // Chama o metodo getCep da instançia criada, passando o EntityManager e o valor do CEP como parâmetros

            return new Response();
            // Retorna una nova Response vazia (isso pode estar incompleto, já que geralmente se deseja retornar algum conteudo)
        }

        $data['titulo'] = "Consultar Cep";
        $data['form'] = $form;
        // Define dados para serem usados na renderização do template

        return $this->renderForm('cep/cep.html.twig', $data);
        // Renderiza o template 'cep.html.twig', passando os dados definidos
    }
}

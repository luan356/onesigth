<?php
namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

 
class index extends AbstractController{
/**
*@Route("/index/{cep}", name="index")
*/
public function index(EntityManagerInterface $bd, $cep) :Response{

     $postalCodeController= new PostalCodeController;
     $postalCodeController->getCep($bd, $cep);

return new Response();

}


}
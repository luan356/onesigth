<?php
namespace App\Controller;

use App\Entity\Produto;
use App\Form\ProdutoType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProdutoController extends AbstractController{
/**
*@Route("/produto", name="produto")
*/
public function index(EntityManagerInterface $bd) :Response{
    
    $produto = new Produto();
    $produto->setNome('celuar');
    $produto->setDescricao('notebook preto, teclado branco');
    $msg = "";
try{

    $bd->persist($produto); //salvar a persistencia em nivel de memoria
    $bd->flush();//executa em definitivo no banco de dados
$msg= "Produto cadastrado com Sucesso";
}
catch(Exception $e){
    $msg= "Erro ao cadastrar Prpdito";
}
return new Response('<h1> '.$msg.'</h1>');

}


}
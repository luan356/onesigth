<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CepType extends AbstractType{

    // Classe que define um formulário personalizado para consultar um CEP

    public function buildForm(FormBuilderInterface $builder, array $options){
        // Método que constrói o formulário, recebendo um construtor de formulários e opções

        $builder
        ->add('cep', TextType::class, ['label' => 'cep'])
        // Adiciona um campo de texto para inserir o CEP, com um rótulo personalizado 'cep'

        ->add('Consultar', SubmitType::class);
        // Adiciona um botão de envio com a etiqueta 'Consultar'
    }
}

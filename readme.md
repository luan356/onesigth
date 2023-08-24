
Este é um exemplo de aplicativo Symfony que permite consultar informações de CEP usando a API VIACEP. Ele consiste em um controlador `PostalCodeController` para fazer a consulta e salvar as informações no banco de dados, e um formulário personalizado `CepType` para coletar o CEP do usuário.

## Requisitos

- PHP 7.4 ou superior
- Composer
- Symfony
-mariaDB
-Twig
-Git

## Instalação


Abra o navegador e acesse a URL do aplicativo 127.0.0.1:8000/consultacep

Preencha o campo de CEP no formulário e clique no botão "Consultar".

As informações do CEP serão exibidas na página e serão salvas no banco de dados.

Estrutura dos Arquivos
src/Controller/PostalCodeController.php: Controlador responsável por consultar o CEP e salvar as informações.
src/Form/CepType.php: Formulário personalizado para coletar o CEP.
templates/cep/cep.html.twig: Template para exibir o formulário e as informações do CEP.
config/packages/doctrine.yaml: Configurações do Doctrine para conexão com o banco de dados.
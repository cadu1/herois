###################
Projeto Heróis
###################

Este projeto tem como objetivo listar e cadastrar informações de personagens como parte requisitante do grupo NewWay para avaliação.

*******************
Informções
*******************

Projeto desenvolvido utilizando framework CodeIgniter, Bootstart, JQuery. Com a possibilidade de receber e retornar informações através de requisições REST.

*******************
Banco de Dados
*******************

Na raiz da aplicação há o arquivo "script" com a estrutura de um pequeno banco para a execução da aplicação, há também o MER.
As configurações de conexão estão disponíveis no arquivo "database.php" dentro da pasta "config".

**************************
Configurações
**************************

A aplicação foi desenvolvida considerando um ambiente local, ou seja, no servidor foi criado uma pasta chamada "herois". O acesso é realizado através da URL base: "http://localhost/herois", todos os termos após a URL Base são considerados parâmetros, ex: "http://localhost/megasena/{controller}/{método}".

*******************
Obs.
*******************

Necessário ter habilitado o módulo de URL amigáveis "mod_rewrite".

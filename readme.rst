###################
Projeto Heróis
###################

Este projeto tem como objetivo listar e cadastrar informações de personagens como parte requisitante do grupo NewWay para avaliação.

*******************
Informações
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

A aplicação foi desenvolvida considerando um ambiente local, ou seja, no servidor foi criado uma pasta chamada "herois". O acesso é realizado através da URL base: "http://localhost/herois", todos os termos após a URL Base são considerados parâmetros, ex: "http://localhost/herois/{controller}/{método}".

*******************
Obs.
*******************

Necessário ter habilitado o módulo de URL amigáveis "mod_rewrite".

*******************
API
*******************

Para acessar a API, utilize os seguintes endereços:

[GET] http://localhost/herois/rest/heroi/heroi/{id} = Para recuperar as informações de um único personagem
[GET] http://localhost/herois/rest/heroi/lista = Para listar as informações de todos os personagens cadastrados
[POST] http://localhost/herois/rest/heroi/atualiza = Atualiza as informações de um determinado personagem, segue abaixo os campos:

    'id' => Código do Personagem
    'nome' => Nome
    'vida' => Quantidade de Vida(inteiro)
    'defesa' => Quantidade de Defesa(inteiro)
    'dano' => Quantidade de Dano(inteiro)
    'vel_ataque' => Velocidade de ataque(Decimal)
    'vel_mov' => Velocidade de movimento(inteiro)
    'tipo' => Tipo do personagem(inteiro)
    'avatar' => Imagem do personagem(Arquivo)
    'especialidades' => Código das especialidades separado por ","

Obs: Se for enviar o avatar é necessário mudar a requisição para multipart/form-data, e com exceção do "avatar" TODOS OS DEMAIS CAMPOS SÃO OBRIGATÓRIOS.

[POST] http://localhost/herois/rest/heroi/novo = Insere um novo personagem, os campos são os mesmos que no "atualiza", porém o "id" não é necessário
[DELETE] http://localhost/herois/rest/heroi/apaga/{id} = Remove um personagem com base no ID

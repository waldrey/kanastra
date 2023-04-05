<p align="center">
  <img src="https://github.com/waldrey/kanastra/blob/develop/public/docs/logo.png?raw=true" width="120" alt="Kanastra Logo"></a>
</p>

# Kanastra Hiring Challenge
| Desenvolver um sistema de cobrança que recebe um CSV e baseado nos inputs do CSV precisamos disparar uma criação de boleto e enviando email do mesmo para a lista sobre a cobrança. Além disso criar um endpoint que vai servir como webhook para os alertas do banco que ocorreu um pagamento da cobrança X

### Sobre API
Foi desenvolvida utilizando PHP (8.1) juntamente com framework Laravel (10), ideia foi abstrair máximo das regras de negócio (camada de domínio) da aplicação, não utilizei a abstração de email do Laravel para criar um adapter capaz de simular envio de e-mail para cliente sobre a disponibilidade do boleto. Trabalhei com **Events/Listeners** do Laravel para tratar a geração de um boleto e envio de e-mail após a cobrança ser registrada no banco dados.

### Como rodar o projeto?

1. Clone o repositório;
2. Acesse a pasta do projeto;
2. Copie .env.example para .env `cp .env.example .env`;
3. Abra o terminal e execute ```docker-compose up -d``` na pasta para criar os containers de desenvolvimento;
4. Acesse o container da aplicação `docker container exec -ti kanastra-app bash` e execute os seguintes comandos;
  * `composer install`;
  * `php artisan key:generate`;
  * `php artisan migrate`;
6. Para acessar a documentação basta [clicar aqui para acessar](http://localhost:8888/docs/).

### Para executar os testes

1. Acesse o container da aplicação com `docker container exec -ti kanastra-app bash`;
2. Execute o comando `php artisan test`.

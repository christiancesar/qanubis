# QAnubis

Ferramenta web open source de apoio à análise qualitativa, com codificação (coding) de arquivos PDF. Construída com Laravel.

Este repositório é um fork de [gilischmidt/qanubis](https://github.com/gilischmidt/qanubis), mantido para apoiar a análise qualitativa de uma pesquisa de mestrado e evoluir a ferramenta a partir do uso real. A ferramenta é descrita no artigo *QAnubis: Uma Ferramenta Web de Apoio ao Processo de Análise Qualitativa* (SBES 2025).

As regras de contribuição do fork estão em [AGENTS.md](AGENTS.md): toda mudança nasce de uma issue com justificativa e entra por pull request.

## Ambiente de desenvolvimento (Docker)

Requer apenas Docker com Docker Compose. PHP, Composer e MySQL rodam nos containers.

```bash
cp docker/env.example .env
docker compose up -d --build
docker compose exec -u "$(id -u):$(id -g)" -e COMPOSER_HOME=/tmp/composer app composer install
docker compose exec -u "$(id -u):$(id -g)" app php artisan key:generate
docker compose exec -u "$(id -u):$(id -g)" app php artisan migrate
```

A aplicação fica em http://localhost:8090. O banco (MariaDB) fica exposto em `localhost:3307`.

O cadastro exige verificação de e-mail. Em ambiente local o e-mail vai para o log (`MAIL_MAILER=log`), então o mais simples é criar um usuário já verificado:

```bash
docker compose exec -u "$(id -u):$(id -g)" -e HOME=/tmp app php artisan tinker --execute \
  'App\Models\User::create(["name"=>"Seu nome","email"=>"voce@example.com","password"=>"sua-senha","email_verified_at"=>now()]);'
```

A senha é passada em texto puro: o model `User` aplica o hash ao salvar.

Para parar: `docker compose down`. Os dados do banco ficam no volume `qanubis-db`.

### Observações

- A imagem usa PHP 8.0, porque o `composer.lock` trava pacotes que exigem PHP 8.0.2 ou superior.
- A imagem base usa Debian 11, cujos repositórios foram movidos para `archive.debian.org`; o `docker/Dockerfile` já aponta para eles.
- O Apache roda com o UID e o GID do host (variáveis `UID` e `GID`, padrão 1000) para conseguir escrever em `storage/` com o projeto montado como volume.
- Os assets compilados (`public/js`, `public/css`) são versionados. Só é preciso Node para alterar `resources/js` ou `resources/sass` (`npm install` e `npm run prod`).

## Deploy em servidor

Requisitos: PHP 8.0, MySQL ou PostgreSQL, Composer 2.

### Primeiro deploy

1. Copie `.env.example` para `.env` e ajuste as configurações, principalmente o banco de dados.
2. `composer install --optimize-autoloader --no-dev`
3. `npm install` e `npm run prod`, se os assets tiverem sido alterados.
4. `php artisan key:generate`
5. `php artisan route:cache`, `php artisan view:cache` e `php artisan config:cache`
6. `php artisan migrate`

### Atualização

1. Atualize os arquivos da aplicação.
2. `composer install --optimize-autoloader --no-dev`
3. `npm install` e `npm run prod`, se os assets tiverem sido alterados.
4. `php artisan route:cache`, `php artisan view:cache` e `php artisan config:cache`
5. `php artisan migrate`

Mais detalhes sobre deploy de aplicações Laravel: https://laravel.com/docs/8.x/deployment.

## Licença

Apache 2.0, conforme o projeto original.

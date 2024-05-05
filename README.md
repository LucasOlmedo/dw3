# Projeto API DW3

## Configuração

Para instalar e configurar este projeto, é necessário que o Docker esteja instalado em sua máquina.

Clone este repositório para o seu computador:

```bash
git clone https://github.com/LucasOlmedo/dw3.git
```

Entre na pasta do projeto:

```bash
cd .\dw3
```

Com o `Docker` instalado em sua máquina, rode os seguintes comandos:

1. Derrube as imagens Docker:
```bash
docker-compose down
```

2. Construa as imagens e inicie os contêineres Docker:
```bash
docker-compose up -d --build
```

3. Após a criação dos contêineres, acesse o `bash` do contêiner PHP:
````bash
docker-compose exec php bash
````

4. Dentro do contêiner PHP, execute o comando do composer para instalar os pacotes necessários:
```bash
composer install
```

5. Após a instalação dos pacotes, gere a chave Laravel e adicione o arquivo `.env`. Após adicioná-lo, configure as chaves de Banco de Dados do seu ambiente:
```bash
php artisan key:generate && cp .env.example .env
```

6. Execute as `migrations` e `seeds` para configurar e popular o Banco de Dados. Caso ocorra algum erro, confira se a configuração no `.env` está correta, ou se o contêiner do `mysql` está ativo:
```bash
php artisan migrate --seed
```

7. Por último, ajuste as permissões dos diretórios `storage` e `bootstrap/cache`:
```bash
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
```

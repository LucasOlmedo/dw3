#!/bin/bash

# Derrubar todas as imagens Docker
docker-compose down

# Construir as imagens Docker
docker-compose build

# Iniciar os contêineres Docker
docker-compose up -d
sleep 3

# Instalar as dependências do Laravel
docker-compose exec php composer install

# Copiar o arquivo de ambiente de exemplo e gerar a chave de aplicativo
docker-compose exec php cp .env.example .env
docker-compose exec php php artisan key:generate

# Executar as migrações do banco de dados
docker-compose exec php php artisan migrate --seed

# Ajustar as permissões dos diretórios storage e bootstrap/cache
docker-compose exec php chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Finalizado
echo "Projeto configurado!"
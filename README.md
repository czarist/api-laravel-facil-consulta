# API CMS controle de consultas e pacientes

## 📌 Passo 1: Criar ou Atualizar o `.env`
```sh
cp .env.example .env
```

## 📌 Passo 2: Criar a chave da aplicação
```sh
docker-compose run --rm app php artisan key:generate
```

## 📌 Passo 3: Subir os containers do Docker
```sh
docker-compose up -d --build
```

## 📌 Passo 4: Instalar as dependências do Laravel
```sh
docker-compose exec app composer install
```

## 📌 Passo 5: Instalar o pacote JWT
```sh
docker-compose exec app composer require tymon/jwt-auth
```

## 📌 Passo 6: Publicar a configuração do JWT
```sh
docker-compose exec app php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```

## 📌 Passo 7: Gerar a chave secreta do JWT
```sh
docker-compose exec app php artisan jwt:secret
```

## 📌 Passo 8: Rodar as migrações do banco
```sh
docker-compose exec app php artisan migrate --seed
```

## 📌 Passo 9: Testar a API do Laravel
```sh
curl -X POST http://localhost/api/login -d "email=admin@admin.com.com&password=admin123"
```


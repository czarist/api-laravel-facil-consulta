# API CMS controle de consultas e pacientes

## 📌 Passo 1: Criar ou Atualizar o `.env`
```sh
cp .env.example .env
```

## 📌 Passo 2: Subir os containers do Docker
```sh
docker-compose up -d --build
```

## 📌 Passo 3: Instalar as dependências do Laravel
```sh
docker-compose exec app composer install
```

## 📌 Passo 4: Criar a chave da aplicação
```sh
docker-compose run --rm app php artisan key:generate
```

## 📌 Passo 5: Gerar a chave secreta do JWT
```sh
docker-compose exec app php artisan jwt:secret
```

## 📌 Passo 6: Rodar as migrações do banco
```sh
docker-compose exec app php artisan migrate --seed
```

## 📌 Passo 7: Testar a API do Laravel
### /login
![image](https://github.com/user-attachments/assets/6a92dde9-06b5-4bc0-a7f5-fbe2b1523fab)

### /medicos & /medicos?={{nome}}
![image](https://github.com/user-attachments/assets/a6f33e94-8136-43ea-ac99-0de4520c9708)
![image](https://github.com/user-attachments/assets/f6f5e137-27ee-48da-a5aa-84372adbf107)

### /cidades/{{id_cidade}}/medicos
![image](https://github.com/user-attachments/assets/45109ef8-7d0a-48a9-95de-c19d59ab4920)

### /medicos/{{id_medico}}/pacientes
![image](https://github.com/user-attachments/assets/6aad0bac-0461-4af8-b94c-5832ea6453ea)

### /pacientes/{{id_paciente}}
![image](https://github.com/user-attachments/assets/15a4606d-dd4e-4f1a-87a9-26b4f7a9cd9d)

### /pacientes (store)
![image](https://github.com/user-attachments/assets/cf68da51-fbf5-4ca9-9a8a-754110fe5734)

### /cidades
![image](https://github.com/user-attachments/assets/3ea64574-415a-46dd-b039-6e59c8f4b2a3)

### /user
![image](https://github.com/user-attachments/assets/9b0b70bf-ca05-47b7-a750-94ef489f0c16)

### /medicos/consulta
![image](https://github.com/user-attachments/assets/91c721f0-d252-4951-bf66-ce9c4ccca5fc)

### /medicos (store)
![image](https://github.com/user-attachments/assets/52892bdc-141b-44d4-be42-fd1bea0be4b4)




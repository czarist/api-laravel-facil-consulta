# 📌 API CMS - Controle de Consultas e Pacientes

## Configuração Inicial

### 1️⃣ Criar ou Atualizar o `.env`
```sh
cp .env.example .env
```

### 2️⃣ Subir os containers do Docker
```sh
docker-compose up -d --build
```

### 3️⃣ Instalar as dependências do Laravel
```sh
docker-compose exec app composer install
```

### 4️⃣ Criar a chave da aplicação
```sh
docker-compose run --rm app php artisan key:generate
```

### 5️⃣ Gerar a chave secreta do JWT
```sh
docker-compose exec app php artisan jwt:secret
```

### 6️⃣ Rodar as migrações e seeders do banco de dados
```sh
docker-compose exec app php artisan migrate --seed
```

---

## Testando a API

### 🔑 Autenticação
**Endpoint:** `/login`

![Login](https://github.com/user-attachments/assets/6a92dde9-06b5-4bc0-a7f5-fbe2b1523fab)

---

### Médicos
**Buscar todos os médicos:** `/medicos`

**Buscar por nome:** `/medicos?={{nome}}`

![Médicos](https://github.com/user-attachments/assets/a6f33e94-8136-43ea-ac99-0de4520c9708)
![Médicos por Nome](https://github.com/user-attachments/assets/f6f5e137-27ee-48da-a5aa-84372adbf107)

**Buscar médicos por cidade:** `/cidades/{{id_cidade}}/medicos`

![Médicos por Cidade](https://github.com/user-attachments/assets/45109ef8-7d0a-48a9-95de-c19d59ab4920)

**Buscar pacientes de um médico:** `/medicos/{{id_medico}}/pacientes`

![Pacientes do Médico](https://github.com/user-attachments/assets/6aad0bac-0461-4af8-b94c-5832ea6453ea)
![Pacientes do Médico 2](https://github.com/user-attachments/assets/03fdd9cd-ff42-4d67-b434-f81bf962573a)
![Pacientes do Médico 3](https://github.com/user-attachments/assets/515fc98e-f158-4776-87e9-3b73f95c6076)

---

### Pacientes
**Buscar detalhes do paciente:** `/pacientes/{{id_paciente}}`

![Paciente](https://github.com/user-attachments/assets/15a4606d-dd4e-4f1a-87a9-26b4f7a9cd9d)

**Cadastrar um novo paciente:** `/pacientes (store)`

![Cadastrar Paciente](https://github.com/user-attachments/assets/cf68da51-fbf5-4ca9-9a8a-754110fe5734)

---

### Cidades
**Listar cidades disponíveis:** `/cidades`

![Cidades](https://github.com/user-attachments/assets/3ea64574-415a-46dd-b039-6e59c8f4b2a3)

---

### Usuário
**Buscar informações do usuário logado:** `/user`

![Usuário](https://github.com/user-attachments/assets/9b0b70bf-ca05-47b7-a750-94ef489f0c16)

---

### Consultas
**Buscar consultas dos médicos:** `/medicos/consulta`

![Consultas](https://github.com/user-attachments/assets/91c721f0-d252-4951-bf66-ce9c4ccca5fc)

**Cadastrar um novo médico:** `/medicos (store)`

![Cadastrar Médico](https://github.com/user-attachments/assets/52892bdc-141b-44d4-be42-fd1bea0be4b4)

---


# Serviço 2 – API de Logs (PHP / Laravel)

Este serviço faz parte da arquitetura distribuída do sistema de **TODO List**. Ele atua como uma API independente, responsável por receber, processar e registrar no banco de dados todos os eventos importantes gerados pelo Serviço 1 (criação de tarefas, erros, acessos indevidos, etc.).

## 🚀 Tecnologias Utilizadas
- **PHP 8+**
- **Laravel 11+** (Framework e API nativa)
- **Eloquent ORM** (Manipulação do banco de dados)
- **SQLite** (Banco de dados leve e embutido)

---

## ⚙️ Como rodar o projeto localmente

Como este projeto utiliza SQLite, você não precisa configurar um servidor MySQL complexo. Siga os passos abaixo:

**1. Clone o repositório**
\`\`\`bash
git clone https://github.com/LSCAlbion/servico-2-logs.git
cd servico-2-logs
\`\`\`

**2. Instale as dependências**
\`\`\`bash
composer install
\`\`\`

**3. Configure o ambiente (.env)**
Faça uma cópia do arquivo de exemplo para criar o seu próprio `.env`:
\`\`\`bash
cp .env.example .env
\`\`\`
Abra o arquivo `.env` recém-criado, **apague as configurações de banco de dados existentes (DB_...)** e deixe apenas a seguinte linha para ativar o SQLite:
\`\`\`env
DB_CONNECTION=sqlite
\`\`\`

**4. Crie as tabelas no banco de dados**
Rode o comando de migração. Se o terminal perguntar se deseja criar o arquivo `database.sqlite`, digite **yes**.
\`\`\`bash
php artisan migrate
\`\`\`

**5. Inicie o servidor (Porta 8081)**
Para evitar conflito de portas com o Serviço 1, rode esta API na porta 8081:
\`\`\`bash
php artisan serve --port=8081
\`\`\`

---

## 📡 Integração (Endpoints da API)

### Registrar um novo log
O Serviço 1 deve enviar uma requisição HTTP para este endpoint sempre que um evento ocorrer.

- **URL:** `http://127.0.0.1:8081/api/logs`
- **Método:** `POST`
- **Headers:** `Content-Type: application/json`

**Exemplo de Corpo da Requisição (JSON):**
\`\`\`json
{
  "acao": "criacao_tarefa",
  "detalhe": "Tarefa 'Estudar Laravel' criada com sucesso.",
  "usuarioId": 1
}
\`\`\`

**Exemplo de Resposta de Sucesso (201 Created):**
\`\`\`json
{
  "sucesso": true,
  "mensagem": "Log registrado com sucesso!",
  "dados": {
    "acao": "criacao_tarefa",
    "detalhe": "Tarefa 'Estudar Laravel' criada com sucesso.",
    "usuarioId": 1,
    "updated_at": "2024-05-20T14:30:00.000000Z",
    "created_at": "2024-05-20T14:30:00.000000Z",
    "id": 1
  }
}
\`\`\`
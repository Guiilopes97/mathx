# MathX — Projeto de Aula (Laravel)

Resumo
---
MathX é o projeto desenvolvido durante as aulas de Laravel na Udemy. Este repositório contém a base do aplicativo construída como exercício do curso, incluindo a configuração inicial, migrações, seeds e implementação das funcionalidades principais vistas em aula.

Sumário
---
- [Sobre](#sobre)
- [Funcionalidades](#funcionalidades)
- [Tecnologias](#tecnologias)
- [Requisitos](#requisitos)
- [Instalação](#instalação)
- [Configuração (.env)](#configuração-env)
- [Banco de dados](#banco-de-dados)
- [Executando o projeto](#executando-o-projeto)
- [Testes](#testes)
- [Contribuição](#contribuição)
- [Créditos](#créditos)
- [Licença](#licença)

Sobre
---
Projeto criado como exercício prático durante um curso de Laravel na Udemy. Serve como exemplo de fluxo de desenvolvimento: rotas, controllers, models, migrations, autenticação (se aplicável) e integração com frontend via Blade/Vue/Livewire conforme abordado no curso.

Funcionalidades (exemplos)
---
- CRUD de entidades (ex.: usuários, tarefas, problemas matemáticos)
- Autenticação básica (login / registro) — se implementada nas aulas
- Sistema de migrações e seeders para popular ambientes de desenvolvimento
- Layout responsivo com Blade (ou stack JavaScript usado no curso)

Tecnologias
---
- PHP (versão compatível com a versão do Laravel usada no curso)
- Laravel (versão usada nas aulas)
- Composer
- MySQL / MariaDB (ou outro banco suportado pelo Laravel)
- Node.js + npm (para assets, se aplicável)

Requisitos
---
- PHP >= 8.0 (verifique a versão do Laravel do curso)
- Composer
- MySQL / MariaDB (ou SQLite para desenvolvimento rápido)
- Node.js e npm (apenas se for necessário compilar assets)

Instalação
---
1. Clone o repositório:
```bash
git clone https://github.com/Guiilopes97/mathx.git
cd mathx
```

2. Instale dependências PHP:
```bash
composer install
```

3. Instale dependências JavaScript (se aplicável):
```bash
npm install
# ou
yarn
```

Configuração (.env)
---
1. Copie o exemplo de .env e gere a chave da aplicação:
```bash
cp .env.example .env
php artisan key:generate
```

2. Atualize as variáveis de ambiente no arquivo `.env`:
- APP_NAME, APP_URL
- DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
- MAIL_*, outros serviços usados (Redis, S3, etc.)

Banco de dados
---
1. Execute as migrações:
```bash
php artisan migrate
```

2. Rode os seeders (se existirem):
```bash
php artisan db:seed
# ou para refresh completo
php artisan migrate:fresh --seed
```

Executando o projeto
---
1. Para executar o servidor local:
```bash
php artisan serve
```
2. Para compilar assets em modo desenvolvimento:
```bash
npm run dev
# ou
npm run build
```

Testes
---
Se houver testes automatizados:
```bash
php artisan test
# ou
vendor/bin/phpunit
```

Boas práticas e dicas
---
- Verifique a versão do PHP e do Laravel usada nas aulas e ajuste seu ambiente.
- Use `migrate:fresh --seed` para resetar o banco em desenvolvimento.
- Configure variáveis sensíveis (API keys, credenciais) apenas em `.env` e não no repositório.

Contribuição
---
Contribuições são bem-vindas. Abra uma issue para discutir mudanças maiores ou envie um pull request com:
- Descrição clara das alterações
- Testes (se aplicável)
- Passos para reproduzir

Créditos
---
Projeto baseado nas aulas do curso de Laravel na Udemy. Obrigado(a) ao instrutor e aos materiais do curso que serviram de guia.

Licença
---
Este repositório pode ser licenciado como MIT por padrão; substitua conforme preferir.

Notas finais
---
Atualize este README com informações específicas do projeto (funcionalidades implementadas, rotas principais, screenshots, instruções de deploy, nome do curso/instrutor) para facilitar futuros colaboradores e sua própria referência.

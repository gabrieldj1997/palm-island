📋 Requisitos
Este projeto foi desenvolvido com foco em arquitetura limpa, domínio rico e separação clara de responsabilidades. Para rodá-lo localmente, você precisará de:
PHP 8.2+
Composer
MySQL 8+
Laravel 11
Git

Extensões PHP recomendadas:
pdo
pdo_mysql
mbstring
openssl
json

⚙️ Instalação e execução
Siga os passos abaixo para rodar o projeto localmente:

# Clone o repositório
git clone https://github.com/gabrieldj1997/palm-island.git

# Acesse o diretório do projeto
cd palm-island

# Instale as dependências PHP
composer install

# Crie o arquivo de ambiente
cp .env.example .env

# Gere a chave da aplicação
php artisan key:generate

Configure o banco de dados no arquivo .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=palm_island
DB_USERNAME=root
DB_PASSWORD=secret

Depois, execute:
# Rodar migrations e seeders
php artisan migrate --seed

# Subir o servidor local
php artisan serve

O projeto estará disponível em:

http://localhost:8000


🧠 Sobre o projeto

Este projeto é a implementação de um jogo de cartas inspirado em Palm Island, com foco total em Domain-Driven Design (DDD) e Clean Architecture.

Ele foi estruturado para tratar o domínio do jogo como a principal fonte de verdade, isolando regras de negócio da infraestrutura e do framework.

Principais conceitos aplicados:

GameState como Aggregate Root

Deck e CardState como entidades de domínio

Actions para representar intenções do jogador (ex: descartar carta, comprar ação)

Use Cases responsáveis apenas por orquestração e persistência

Imutabilidade no domínio, evitando efeitos colaterais

Validações de regras de jogo centralizadas no domínio

Separação clara entre domínio, aplicação e infraestrutura

Preparado para evolução (multiplayer, replay de partidas, WebSockets, IA, etc.)

O projeto foi pensado para:

Ser fácil de testar

Suportar evolução sem refatorações dolorosas

Refletir regras reais de jogo, não apenas CRUD
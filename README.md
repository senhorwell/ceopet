# Projeto CeoPet

#### Ferramentas
- PHP/Laravel
- Bootstrap
- Material UI
- MySQL

#### Funções
- Consultar pacientes
- Registrar atendimento
- Consultar atendimento
- Editar perfil e senha do usuario logado

#### Modo de usar
composer require laravel/ui
composer global require laravel/ui
php artisan ui vue --auth
npm install
npm run development
composer dump-autoload
php artisan migrate --seed
php artisan serve

#### Banco de dados
Configurar no arquivo .env o banco de dados conforme abaixo
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ceopet
DB_USERNAME=root
DB_PASSWORD=

Feito por Wellwlds
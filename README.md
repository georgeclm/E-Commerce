# eCom-en-laravel
💻 Install
Clone Repository
git clone https://github.com/zuramai/kelaskita.git
cd kelaskita
composer install
npm install
copy .env.example .env
Buka .env lalu ubah baris berikut sesuai dengan databasemu yang ingin dipakai
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
Instalasi website
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
Jalankan website
php artisan serve

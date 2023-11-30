# Doc Instalasi API Customer

API Backend ini menggunakan Laravel Versi 10.x

## Request Software
1. PHP versi >8.1
2. MySQL Server
3. Composer version 2.5.8

## Clone Project
1. Clone Project dengan link :

```shell
git clone https://github.com/IDrumahdev/crm-api-customers.git
```
2. Pindah ke folder project 
```shell
cd crm-api-customers
```
3. Buka dengan Visual Studio Code
```shell
code .
```
4. Buat file .env pada root folder
5. Copy paste konfigurasi .env
```shell
APP_NAME=CRMAPP
APP_ENV=local
APP_KEY=base64:979iJw0bps8ObirvILYReOp5M7GkxuDfth8m5MOdRfU=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=daily
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crmdb
DB_USERNAME=
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

```
- catatan : Sesuaikan konfigurasi database di antaranya nama DB_DATABASE crmdb , DB_USERNAME dan DB_PASSWORD dengan benar. Jika APP_KEY masih belum terisi ``` php artisan key:generate```

6. Jalankan perintah
```shell
composer install
```

7. Jalankan perintah
```shell
php artisan serve
```

8. Import database MySQL yang ada di link google drive dengan nama file crmdb.sql

9. Import api_crm.postman_collection.json kedalam aplikasi postman.
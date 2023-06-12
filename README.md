
## Instalasi
#### Via Git
```bash
git clone https://github.com/sandinur157/tuturial-membuat-aplikasi-point-of-sales.git
```

### Download ZIP
[Link](https://github.com/sandinur157/tuturial-membuat-aplikasi-point-of-sales/archive/refs/heads/main.zip)

### Setup Aplikasi
Jalankan perintah 
```bash
composer update
```
atau:
```bash
composer install
```
Copy file .env dari .env.example
```bash
cp .env.example .env
```
Konfigurasi file .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=example_app
DB_USERNAME=root
DB_PASSWORD=
```
Opsional
```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:QGRW4K7UVzS2M5HE2ZCLlUuiCtOIzRSfb38iWApkphE=
APP_DEBUG=true
APP_URL=http://example-app.test
```
Generate key
```bash
php artisan key:generate
```
Migrate database
```bash
php artisan migrate
```
Seeder table User, Pengaturan
```bash
php artisan db:seed
```
Menjalankan aplikasi
```bash
php artisan serve
```

## Link Tutorial

- [Youtube](https://www.youtube.com/playlist?list=PLaN75JfoGz0Okf9f_7GbGM5IFaLXWx-_C)
- [W2Learn](https://www.w2learn.com)

## License

[MIT license](https://opensource.org/licenses/MIT)

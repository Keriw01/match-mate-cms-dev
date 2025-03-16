npm install
npm run build
cp .env.example .env
php artisan key:generate

Wypełnić w .env :
DB_CONNECTION=mongodb
DB_URI="<connection string>"

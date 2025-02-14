//Clone the Repository
git clone <your-repo-url>
cd myinterviewproject
//Setup .env File
cp .env.example .env

//Database Credential 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

//Generate App Key
php artisan key:generate
//Run the migration to create the required table:
php artisan migrate

1st function how do run 
Upload CSV via Browser
http://127.0.0.1:8000/import
//Upload a CSV file with the following format:
name,email,mobile_no
John Doe,john@example.com,1234567890
Jane Smith,jane@example.com,9876543210
API                   endpoints
GET/import       Displays the CSV upload form
POST/importcsv   Processes CSV file and stores data

//3rd function run
API   Endpoint
GET  (http://127.0.0.1:8000/api/getsectionaniaml)

4th function run 
http://localhost:8000/testvalidationview  (for view show)
then submit show validation


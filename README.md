# CareMater TestApp
## Step 0: Install docker desktop and run docker with sail, please read more at [https://laravel.com/docs/10.x/sail#installation]
- **cd caremaster-testapp && ./vendor/bin/sail up**
## Step 1: Migrate database & init data
- **php artisan migrate:fresh --seed**
## Step 2: Seeding more into database
- Seeding companies table's data **php artisan db:seed --class=CompanySeeder** (10 records each time)
- Seeding employees table's data **php artisan db:seed --class=EmployeeSeeder** (10 records each time)
## Step 3: To send mail after company was created, let config env for mail sender, eg:
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=test
MAIL_PASSWORD=test
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="admin@caremaster.com.au"
MAIL_FROM_NAME="${APP_NAME}"
MAIL_TO_ADDRESS=recipient email
MAIL_TO_NAME="CUSTOMER"

## Step 4: Run tests
- php artisan test

### Note*: Sometimes there is a weird error of mysql connection, if that's happening, and if you're running migration or seeding data, please switch mysql DB_HOST=127.0.0.1 or DB_HOST=mysql if you're running web application

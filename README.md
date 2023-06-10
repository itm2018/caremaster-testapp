# CareMater TestApp
## Step 0: Install docker desktop and run docker with sail, please read more at [https://laravel.com/docs/10.x/sail#installation]
- **cd caremaster-testapp && ./vendor/bin/sail up**
## Step 1: Migrate database & init data
- **php artisan migrate:fresh --seed**
## Step 2: Seeding more into database
- Seeding companies table's data **php artisan db:seed --class=CompanySeeder** (10 records each time)
- Seeding employees table's data **php artisan db:seed --class=EmployeeSeeder** (10 records each time)
### Note*: Sometimes there is a weird error of mysql connection, if that's happening, and if you're running migration or seeding data, please switch mysql DB_HOST=127.0.0.1 or DB_HOST=mysql if you're running web application

# ESY-MVC-LV

# Set-up Commands
sail up -d

sail composer install

sail artisan migrate:fresh --seed

sail artisan optimize

sail npm i

sail npm run build



# Env File
Add APP_TAX, by default it's 0.2;

# Admin Account
Username:
test@example

Password:
testtest

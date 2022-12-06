php artisan migrate:fresh

php artisan db:seed --class=AccountSeeder

php artisan db:seed --class=SimCardSeeder

php artisan config:clear

php artisan config:cachephp artisan queue:work


When you visit home page, system would imiidiately try to send an SMS to active sim cards by initiating a Job or each sms.

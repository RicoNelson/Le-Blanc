## Installation

To open the web please do several steps:
1. Start Apache and MySQL in XAMPP and create database on ```localhost/phpmyadmin``` called ```leblanc_database```
2. Open vscode.
3. Run ```php artisan storage:link```
4. Run ```php artisan migrate:fresh --seed```
5. Run ```php artisan serve```

Note:<br>
Account for admin
- email: admin@admin.com
- password: password

Account for customer
- email: customer@customer.com
- password: password

- email: customer2@customer.com
- password: password
# PharmApp

PharmApp is a pharmacy management application that facilitates managing medicine stocks, sales, and orders for pharmacies.

## Installation

Follow these steps to install and run PharmApp locally.

### Prerequisites

Make sure you have the following installed on your system:

- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/) (8.1)
- [Laravel](https://www.laravel.com) (v10)

### Installation Steps

1. Clone this repository to your local machine using the following command:

   ```bash
   git clone https://github.com/emeryntumba/pharmapp.git
   ```

2. Navigate to the PharmApp directory:

   ```bash
   cd pharmapp
   ```

3. Install PHP dependencies via Composer:

   ```bash
   composer install
   ```

4. Copy the default environment file and configure your own values:

   ```bash
   cp .env.example .env
   ```

5. Generate a new application key:

   ```bash
   php artisan key:generate
   ```

6. Run migrations to create the database tables:

   ```bash
   php artisan migrate
   ```
7. Run seeder to create Admin role and Unknow customer
    
   ```bash
   php artisan db:seed
   ```

7. Start the development server:

   ```bash
   php artisan serve
   ```

8. Visit `http://localhost:8000` in your browser to access PharmApp.

## Features

- Management of medicine stocks.
- Tracking sales and orders.
- Management of seller users
- Low stock quantity notifications
- Generation of reports on sales and stocks.

## Production Version

The production version of PharmApp is available at [PharmApp](https://pharmapp.opencommonhealth.com).

## Contribution

Contributions are what make the open-source community such an amazing place to learn, inspire, and create. Any contributions you make are greatly appreciated.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement". Don't forget to give the project a star! Thanks again!

- Fork the Project
- Create your Feature Branch
- Commit your Changes 
- Push to the Branch 
- Open a Pull Request

## License

PharmApp is licensed under the [MIT License](LICENSE).

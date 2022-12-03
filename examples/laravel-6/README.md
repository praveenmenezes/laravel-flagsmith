Laravel Flagsmith a lightweight Flagsmith library which works on **Laravel 6+** and **PHP 7.4+**

Prerequisite:
- Signup on app.flagsmith.com and create an app
- On the left sidebar, navigate to your settings page and open Keys tab
- Generate a new Server-side Environment Keys
- Copy the key and assign it to *FLAGSMITH_API_KEY=<your key>* in your project .env or docker env

Docker steps:
docker compose up
docker compose exec app composer install

In your Laravel Project, refer to web.php route for examples
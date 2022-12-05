# Flagsmith library for Laravel 6+
Laravel Flagsmith is a lightweight Flagsmith library which works on **Laravel 6+** and **PHP 7.4+**

## Getting started
- Signup on [app.flagsmith.com](https://app.flagsmith.com) and create an app
- On the left sidebar, navigate to your settings page and open Keys tab
- Generate a new Server-side Environment Keys
- Copy the key and assign it to *FLAGSMITH_API_KEY=<your key>* in your project .env or docker env

## Installation
In your Laravel Project, perform the following steps

- Install the library using composer

```composer require praveenmenezes/laravel-flagsmith```

- (Optional) Register Kafka Service Provider in `config/app.php`

  `Note: This will be already loaded from composer.json`

```
'providers' => [
    ...,
    /**
    * Third party Service Providers
    */
   Menezes\LaravelFlagsmith\Providers\FlagsmithServiceProvider::class,
],

'alias' => [
    ...,
    // Third party aliases
    'Flagsmith' => Menezes\LaravelFlagsmith\Services\Flagsmith::class,
]
```

- Start using Flagsmith class as shown in below [examples](examples/laravel-6/README.md)

```
<?php
use Flagsmith;
// OR //
use Menezes\LaravelFlagsmith\Services\Flagsmith;


// Create your first feature. Let's call it "is_google_signup_enabled" and set it to true //
$flag = "is_google_signup_enabled";
$is_google_signup_enabled = Flagsmith::isEnabled($flag);
dump(compact("is_google_signup_enabled")); // true


// Creating another key "btn_lbl_google_sign_up" with a custom value //
$flag = "btn_lbl_google_sign_up";
$btn_lbl_google_sign_up = Flagsmith::getValue($flag);
dump(compact("btn_lbl_google_sign_up")); // Google


// |------- IDENTITY/USER BASED FLAGS -------| //

// This time we're creating an identitiy specific flag.
// We'll disable Google signup button for this user/identity in Flagsmith //
$flag = "is_google_signup_enabled";
$identity = "user_123456";
$is_google_signup_enabled = Flagsmith::isIdentityEnabled($flag, $identity);
dump(compact("is_google_signup_enabled")); // false


// Setting a custom value for this user/identity for "btn_lbl_google_sign_up" //
$flag = "btn_lbl_google_sign_up";
$identity = "user_123456";
$is_google_signup_enabled = Flagsmith::getIdentityValue($flag, $identity);
dump(compact("is_google_signup_enabled")); // Not Google
```

## Examples
Checkout [Laravel 6](examples/laravel-6/README.md) example

## License

The Laravel Flagsmith library is free software released under the MIT License. See [LICENSE.txt](LICENSE.txt) for details.
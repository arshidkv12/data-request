# DataRequest for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/arshidkv12/data-request.svg?style=flat-square)](https://packagist.org/packages/arshidkv12/data-request)
[![License: MIT](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE)
[![Tested Laravel Versions](https://img.shields.io/badge/laravel-10%20%7C%2011%20%7C%2012-orange.svg?style=flat-square)](#)

**DataRequest** is a base `FormRequest` laravel class for Laravel that auto-assigns validated input data to public typed properties — for cleaner, type-safe form handling.

---

## 🚀 Features

- ✅ Works with Laravel 10, 11, and 12
- 🧠 Automatically maps validated inputs to typed properties
- 🛠️ Includes `php artisan make:datarequest` generator command
- 💡 Cleaner controller code and better IDE autocomplete

---

## 📦 Installation

Install via Composer:

```bash
composer require arshidkv12/data-request
```

## 🧑‍💻 Usage
### 1. Generate a Typed Form Request
```php
<?php

namespace App\Http\Requests;

use Arshidkv12\DataRequest\FormDataRequest;

class RegisterUserForm extends FormDataRequest
{
    public string $name;
    public string $email;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ];
    }
}
```


## 3. Use in Controller
```php
use App\Http\Requests\RegisterUserForm;

public function store(RegisterUserForm $request)
{
    $name = $request->name;
    $email = $request->email;

    // ...
}
```

### 📄 License
MIT License © Arshid KV
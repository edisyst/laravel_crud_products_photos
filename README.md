### Pagination con Bootstrap
Glielo specifico nell'AppServiceProvider


### Helpers
```php
composer require laravel/helpers
```

Così posso usare

    str_limit($product->details, 70)
al posto di

    \Illuminate\Support\Str::limit($product->details, 70)


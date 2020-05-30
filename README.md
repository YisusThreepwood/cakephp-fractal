CakePHP Fractal
---------
Basic data transformation for responding from your API.

The package provide a simple wrapper around [Factral](https://fractal.thephpleague.com/) for your CakePHP 3 applications,
inspired by [Laravel fractal](https://github.com/spatie/laravel-fractal).

Requirements
___
 + PHP >=7.2

Installation
___
Via Composer

```
$ composer install chustilla/cakephp-fractal
```

Usage
___
For simpler usage, the package provide a helper
```php
#src/Controller/VideoGamesController.php

public function index()
{
    return fractal(
        $this->VideoGames->find(),
        new VideoGameTransformer()
    )->respond();
}
```

where VideoGameTransformes is a [Fractal Tranformer](https://fractal.thephpleague.com/transformers/)

For complex data structures you can use [includes](https://fractal.thephpleague.com/transformers/#including-data)

```php
fractal(
        $this->VideoGames->find()->contain([]),
        new VideoGameTransformer()
    )->parseIncludes(['platform'])
    ->respond();
```

License
___
The MIT License (MIT). Please see [License File](./LICENSE) for more information.

![browser screen](https://raw.githubusercontent.com/izica/php-browser-log/master/screen.png "browser screen")
## Install
```
composer require izica/php-browser-log
```

## Usage
You need to use this debug in html view.
You will see result in browser console(F12, Inspect mode console);
```php
    PhpBrowserLog::log($arg1);
    PhpBrowserLog::log($arg1, $arg2);
    PhpBrowserLog::log(...any args count);
```

or Aliases
```php
    PhpBrowserLog::pre($arg1);
    pre($arg1, $arg2);
```

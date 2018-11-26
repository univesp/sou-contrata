# NoLock
get rid of this error on laravel 5.1 : file_put_contents(): Exclusive locks are not supported for this stream

### Installation
```
composer require gilak/nolock
```

### Usage

replace the filesystem service provider in config/app.php
find 
```php
Illuminate\Filesystem\FilesystemServiceProvider::class,
```
replace it with 
```php
NoLock\FileSystemWithNoLockServiceProvider::class,
```

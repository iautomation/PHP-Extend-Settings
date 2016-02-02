#PHP-Dynamic-Html
An extensible and dynamic HTML helper library for PHP

## Introduction
A settings class to be used with other classes.

The most common problem in development is re-writing code that has already been written many times before, perhaps by the same person.

*This extendable class provides _recommended_ methods to accessing public variables inside of the extends class.*

## Example Usage

### For staticly called classes
```php
class Example extends \Settings\StaticSettings {
	public $var1 = 1;
}

Example::setSetting('var1', '1.1');
echo Example::getSetting('var1'); // 1.1
```

### For non-staticly called classes
```php
class Example extends \Settings\Settings {
	public $var1 = 1;
}

$example = new Example();
$example->setSetting('var1', '1.1');
echo $example->getSetting('var1'); // 1.1
```
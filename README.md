# Symfony Cron Bundle

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A Cron Bundle for Symfony

## Install

Via Composer

``` bash
$ composer require loevgaard/cron-bundle
```

## Usage

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new Loevgaard\CronBundle\LoevgaardCronBundle(),
        );

        // ...
    }

    // ...
}
```

```yaml
doctrine:
    dbal:
        types:
            money: Loevgaard\CronBundle\Type\CronExpressionType
```


## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email joachim@loevgaard.dk instead of using the issue tracker.

## Credits

- [Joachim Loevgaard][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/loevgaard/cron-bundle.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/loevgaard/cron-bundle/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/loevgaard/cron-bundle.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/loevgaard/cron-bundle.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/loevgaard/cron-bundle.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/loevgaard/cron-bundle
[link-travis]: https://travis-ci.org/loevgaard/cron-bundle
[link-scrutinizer]: https://scrutinizer-ci.com/g/loevgaard/cron-bundle/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/loevgaard/cron-bundle
[link-downloads]: https://packagist.org/packages/loevgaard/cron-bundle
[link-author]: https://github.com/loevgaard
[link-contributors]: ../../contributors

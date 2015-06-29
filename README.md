[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/tonis-io/response-time/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/tonis-io/response-time/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/tonis-io/response-time/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/tonis-io/response-time/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/tonis-io/response-time/badges/build.png?b=master)](https://scrutinizer-ci.com/g/tonis-io/response-time/build-status/master)

# Tonis\ResponseTime

Tonis\ResponseTime is simple middleware that adds a `X-Response-Time` header to responses.

Composer
--------

```
composer require tonis-io/response-time
```

Usage
-----

```php
$responseTime = new \Tonis\ResponseTime;

// add $responseTime to your middleware queue
```

Configuration
-------------

`Tonis\ResponseTime` optionally takes an array of options.

  * digits: the number of digits to have in the response (default: 3)
  * header: the header to use (default: X-Response-Time)
  * suffix: include suffix output (default: true)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/tonis-io/tonis/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/tonis-io/tonis/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/tonis-io/tonis/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/tonis-io/tonis/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/tonis-io/tonis/badges/build.png?b=master)](https://scrutinizer-ci.com/g/tonis-io/tonis/build-status/master)

# Tonis\ResponseTime

Tonis\ResponseTime is simple middleware that adds a `X-Response-Time` header to responses.

Usage
-----

```php
$app->add(new \Tonis\ResponseTime\Middleware)
```

Configuration
-------------

`Tonis\ResponseTime\Middleware` optionally takes an array of options.



<?php
namespace Tonis\ResponseTime;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Middleware
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $server = $request->getServerParams();

        if (isset($server['REQUEST_TIME_FLOAT'])) {
            $time = sprintf('%2.4fms', (microtime(true) - $server['REQUEST_TIME_FLOAT']) * 1000);
        } else {
            $time = 'Unavailable';
        }

        $response = $response->withHeader('X-Response-Time', $time);
        return $next ? $next($request, $response) : $response;
    }
}

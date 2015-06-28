<?php
namespace Tonis;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ResponseTime
{
    /** @var array */
    private $config;

    /**
     * Middleware to set the X-Response-Time (default) header on the Response.
     *
     * - digits: set the number of digits (default: 3)
     * - header: name of the header to set (default: X-Response-Time)
     * - suffix: boolean to add suffix to time (default: true)
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $defaults = [
            'digits' => 3,
            'header' => 'X-Response-Time',
            'suffix' => true
        ];
        $this->config = array_merge($defaults, $config);
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param callable $next
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $server   = $request->getServerParams();
        $response = $next ? $next($request, $response) : $response;
        $ms       = (microtime(true) - $server['REQUEST_TIME_FLOAT']) * 1000;
        $time     = sprintf('%2.' . $this->config['digits'] . 'f%s', $ms, $this->config['suffix'] ? 'ms' : '');

        return $response->withHeader($this->config['header'], $time);
    }
}

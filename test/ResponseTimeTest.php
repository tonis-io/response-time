<?php

namespace Tonis\ResponseTime;

use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequestFactory;

/**
 * @covers \Tonis\ResponseTime
 */
class ResponseTimeTest extends \PHPUnit_Framework_TestCase
{
    public function testInvoke()
    {
        $request  = ServerRequestFactory::fromGlobals();
        $response = new Response();
        $rtime    = new ResponseTime;

        $response = $rtime($request, $response);
        $this->assertInstanceOf(Response::class, $response);
        $this->assertArrayHasKey('X-Response-Time', $response->getHeaders());
    }

    public function testChangingHeader()
    {
        $request  = ServerRequestFactory::fromGlobals();
        $response = new Response();
        $rtime    = new ResponseTime(['header' => 'X-Foo-Bar']);

        $response = $rtime($request, $response);
        $this->assertInstanceOf(Response::class, $response);
        $this->assertArrayHasKey('X-Foo-Bar', $response->getHeaders());
    }

    public function testWithoutSuffix()
    {
        $request  = ServerRequestFactory::fromGlobals();
        $response = new Response();
        $rtime    = new ResponseTime(['suffix' => false]);

        $response = $rtime($request, $response);
        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotContains('ms', $response->getHeaders()['X-Response-Time'][0]);
    }
}

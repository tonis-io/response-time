<?php

namespace Tonis;

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

        $rtime($request, $response);
    }
}

<?php

namespace Component\Tests\Rest;

use Component\Rest\RestResponse;
use Component\Tests\Mock\MockObject;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Intl\Exception\InvalidArgumentException;

class RestResponseTest extends WebTestCase
{
    /**
     * @var RestResponse
     */
    private $restResponse;

    /**
     * init test class
     */
    public function setUp()
    {
        $kernel = static::createKernel();
        $kernel->boot();

        $this->restResponse = $kernel->getContainer()->get('rest_response');
    }

    /**
     * Test single Json Response
     */
    public function testGetSingleResponse()
    {
        $object = new MockObject();
        $response = $this->restResponse->getSingleResponse($object);

        $this->assertEquals('200', $response->getStatusCode());
        $this->assertEquals('application/json', $response->headers->get('content-type'));
        $this->assertJson($response->getContent());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testGetSingleResponseFailure()
    {
        $string = 'failure test';
        $this->restResponse->getSingleResponse($string);
    }
}
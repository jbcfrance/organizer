<?php

/**
 * User: holoflins
 * Date: 27/09/2015
 * Time: 00:45
 */

namespace Component\Rest;

use Doctrine\Common\Proxy\Exception\InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;

class RestResponse
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @param Serializer $serializer
     */
    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param $data
     * @return Response
     */
    public function getSingleResponse($data)
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException();
        }

        return $this->createResponse($data);
    }

    /**
     * @param Object|array $data
     * @return Response
     */
    private function createResponse($data)
    {
        return new Response(
            $this->serializer->serialize($data, 'json'),
            Response::HTTP_OK,
            array('Content-type' => 'application/json')
        );
    }
}

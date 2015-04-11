<?php

namespace Jhu\RestDocConverter\Provider;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\HeaderBag;

use Jhu\RestDocConverter\Conversion\Symfony2Conversion;

/**
 * {@inheritDoc}
 */
class Symfony2Provider implements ProviderInterface
{
    /**
     * @param string    $uri
     * @param string    $methodType
     * @param string    $body
     * @param array     $headers
     *
     * @return Request
     */
    public function createRequest($uri = null, $methodType = null, $body = null, $headers = null)
    {
        $request = Request::create($uri, $methodType, [], [], [], [], $body);
        $sf2Headers = new HeaderBag($headers);
        $request->headers = $sf2Headers;

        return $request;
    }

    /**
     * @param string    $body
     * @param string    $statusCode
     * @param array     $headers
     *
     * @return Response
     */
    public function createResponse($body = null, $statusCode = null, $headers = null)
    {
        return new Response($body, $statusCode, $headers);
    }

    /**
     * @param mixed     $request
     * @param array     $responses
     * @param string    $method
     *
     * @return Symfony2Conversion
     */
    public function createConversion($request = null, array $responses = null, $method = null)
    {
        return new Symfony2Conversion($request, $responses, $method);
    }
}

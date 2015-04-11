<?php

namespace Jhu\RestDocConverter\Provider;

use Zend\Stdlib\RequestInterface;
use Zend\Stdlib\ResponseInterface;

use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Http\Headers;

use Jhu\RestDocConverter\Conversion\Zend2Conversion;

/**
 * {@inheritDoc}
 */
class Zend2Provider implements ProviderInterface
{
    /**
     * @param string    $uri
     * @param string    $methodType
     * @param string    $body
     * @param array     $headers
     *
     * @return RequestInterface
     */
    public function createRequest($uri = null, $methodType = null, $body = null, $headers = null)
    {
        $request = new Request;
        $zf2Headers = new Headers();
        $zf2Headers->addHeaders($headers);
        $request->setUri($uri)
                ->setMethod($methodType)
                ->setContent($body)
                ->setHeaders($zf2Headers)
        ;

        return $request;
    }

    /**
     * @param string    $body
     * @param string    $statusCode
     * @param array     $headers
     *
     * @return ResponseInterface
     */
    public function createResponse($body = null, $statusCode = null, $headers = null)
    {
        $response = new Response;
        $zf2Headers = new Headers();
        $zf2Headers->addHeaders($headers);
        $response->setContent($body)
                 ->setStatusCode($statusCode)
                 ->setHeaders($zf2Headers)
        ;

        return $response;
    }

    /**
     * @param mixed     $request
     * @param array     $responses
     * @param string    $method
     *
     * @return Zend2Conversion
     */
    public function createConversion($request = null, array $responses = null, $method = null)
    {
        return new Zend2Conversion($request, $responses, $method);
    }
}

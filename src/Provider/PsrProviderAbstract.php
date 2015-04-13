<?php

namespace Jhu\RestDocConverter\Provider;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

use Jhu\RestDocConverter\Conversion\PsrConversion;

/**
 * {@inheritDoc}
 */
abstract class PsrProviderAbstract implements ProviderInterface
{
    /**
     * @param string    $uri
     * @param string    $methodType
     * @param string    $body
     * @param array     $headers
     *
     * @return RequestInterface
     */
    abstract public function createRequest($uri = null, $methodType = null, $body = null, $headers = null);

    /**
     * @param string    $body
     * @param string    $statusCode
     * @param array     $headers
     *
     * @return ResponseInterface
     */
    abstract public function createResponse($body = null, $statusCode = null, $headers = null);

    /**
     * @param RequestInterface      $request
     * @param array                 $responses      A list of \Psr\Http\Message\ResponseInterface
     * @param string                $method
     *
     * @return PsrConversion
     */
    public function createConversion($request = null, array $responses = null, $method = null)
    {
        return new PsrConversion($request, $responses, $method);
    }

    /**
     * @param string    $body
     *
     * @return resource
     */
    protected function prepareBody($body)
    {
        $psrBody = fopen('php://memory', 'r+');
        fwrite($psrBody, $body);

        return $psrBody;
    }
}

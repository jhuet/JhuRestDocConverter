<?php

namespace Jhu\RestDocConverter\Provider;

/**
 * Provides a way to create a Request, a Response and a Conversion depending on
 * the provider.
 */
interface ProviderInterface
{
    /**
     * @param string    $uri
     * @param string    $methodType
     * @param string    $body
     * @param array     $headers
     *
     * @return mixed
     */
    public function createRequest($uri = null, $methodType = null, $body = null, $headers = null);

    /**
     * @param string    $body
     * @param string    $statusCode
     * @param array     $headers
     *
     * @return mixed
     */
    public function createResponse($body = null, $statusCode = null, $headers = null);

    /**
     * @param mixed     $request
     * @param array     $responses
     * @param string    $method
     *
     * @return mixed
     */
    public function createConversion($request = null, array $responses = null, $method = null);
}

<?php

namespace Jhu\RestDocConverter\Conversion;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * {@inheritDoc}
 */
class PsrConversion extends ConversionAbstract
{
    /**
     * @var Psr\Http\Message\RequestInterface
     */
    protected $request;

    /**
     * @var array   A list of Psr\Http\Message\ResponseInterface
     */
    protected $responses;

    /**
     * @param RequestInterface  $request
     * @param array             $responses
     * @param string            $method
     */
    public function __construct($request = null, array $responses = null, $method = null)
    {
        parent::__construct($request, $responses, $method);
    }

    /**
     * Set Request
     *
     * @param RequestInterface  $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * Add a Response
     *
     * @param ResponseInterface  $response
     */
    public function addResponse($response)
    {
        $this->responses[] = $response;
    }

    /**
     * Set Responses
     *
     * @param array $responses  A list of \Psr\Http\Message\ResponseInterface
     */
    public function setResponses($responses)
    {
        $this->responses = $responses;
    }
}

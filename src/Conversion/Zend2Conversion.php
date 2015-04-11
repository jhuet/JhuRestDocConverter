<?php

namespace Jhu\RestDocConverter\Conversion;

use Zend\Stdlib\RequestInterface;
use Zend\Stdlib\ResponseInterface;

/**
 * {@inheritDoc}
 */
class Zend2Conversion extends ConversionAbstract
{
    /**
     * @var Zend\Stdlib\RequestInterface
     */
    protected $request;

    /**
     * @var array   A list of Zend\Stdlib\ResponseInterface
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
     * @param ResponseInterface $response
     */
    public function addResponse($response)
    {
        $this->responses[] = $response;
    }

    /**
     * Set Responses
     *
     * @param array $responses  A list of Zend\Stdlib\ResponseInterface
     */
    public function setResponses($responses)
    {
        $this->responses = $responses;
    }
}

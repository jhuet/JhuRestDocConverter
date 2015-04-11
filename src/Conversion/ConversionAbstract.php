<?php

namespace Jhu\RestDocConverter\Conversion;

/**
 * Stores the converted request and its possible reponses.
 *
 * @todo this really needs a real name, really.
 */
abstract class ConversionAbstract implements ConversionInterface
{
    /**
     * @var mixed
     */
    protected $request;

    /**
     * @var array
     */
    protected $responses;

    /**
     * The RAML Method
     *
     * @var mixed
     */
    protected $method;

    /**
     * @param mixed     $request
     * @param array     $responses
     * @param string    $method
     */
    public function __construct($request = null, array $responses = null, $method = null)
    {
        if (! is_null($request)) {
            $this->setRequest($request);
        }

        if (! is_null($responses)) {
            $this->setResponses($responses);
        }

        if (! is_null($method)) {
            $this->setMethod($method);
        }
    }

    /**
     * Get Request
     *
     * @return mixed    $request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set Request
     *
     * @param mixed $request
     */
    abstract public function setRequest($request);

    /**
     * Get Responses
     *
     * @return array
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * Add a Response
     *
     * @param mixed $response
     */
    abstract public function addResponse($response);

    /**
     * Set Responses
     *
     * @param array $responses
     */
    abstract public function setResponses($responses);

    /**
     * Get Method
     *
     * @return mixed  $method
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set Method
     *
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }
}

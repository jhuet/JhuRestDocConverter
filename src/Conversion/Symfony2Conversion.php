<?php

namespace Jhu\RestDocConverter\Conversion;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * {@inheritDoc}
 */
class Symfony2Conversion extends ConversionAbstract
{
    /**
     * @var Symfony\Component\HttpFoundation\Request
     */
    protected $request;

    /**
     * @var array   A list of Symfony\Component\HttpFoundation\Response
     */
    protected $responses;

    /**
     * @param Request       $request
     * @param array         $responses
     * @param string        $method
     */
    public function __construct($request = null, array $responses = null, $method = null)
    {
        parent::__construct($request, $responses, $method);
    }

    /**
     * Set Request
     *
     * @param Request   $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * Add a Response
     *
     * @param Response  $response
     */
    public function addResponse($response)
    {
        $this->responses[] = $response;
    }

    /**
     * Set Responses
     *
     * @param array $responses  A list of Symfony\Component\HttpFoundation\Response
     */
    public function setResponses($responses)
    {
        $this->responses = $responses;
    }
}

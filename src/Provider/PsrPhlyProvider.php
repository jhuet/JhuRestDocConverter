<?php

namespace Jhu\RestDocConverter\Provider;

use Phly\Http\Request;
use Phly\Http\Response;

/**
 * {@inheritDoc}
 */
class PsrPhlyProvider extends PsrProviderAbstract
{
    /**
     * {@inheritDoc}
     */
    public function createRequest($uri = null, $methodType = null, $body = null, $headers = null)
    {
        return new Request($uri, $methodType, $this->prepareBody($body), $headers);
    }

    /**
     * {@inheritDoc}
     */
    public function createResponse($body = null, $statusCode = null, $headers = null)
    {
        return new Response($this->prepareBody($body), $statusCode, $headers);
    }
}

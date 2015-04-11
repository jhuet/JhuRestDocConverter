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
        $psrBody = fopen('php://memory', 'r+');
        fwrite($psrBody, $body);

        return new Request($uri, $methodType, $psrBody, $headers);
    }

    /**
     * {@inheritDoc}
     */
    public function createResponse($body = null, $statusCode = null, $headers = null)
    {
        $psrBody = fopen('php://memory', 'r+');
        fwrite($psrBody, $body);

        return new Response($psrBody, $statusCode, $headers);
    }
}

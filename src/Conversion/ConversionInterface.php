<?php

namespace Jhu\RestDocConverter\Conversion;

/**
 *
 */
interface ConversionInterface
{
    /**
     * Set Request
     *
     * @param mixed $request
     */
    public function setRequest($request);

    /**
     * Add a Response
     *
     * @param mixed $response
     */
    public function addResponse($response);

    /**
     * Set Responses
     *
     * @param array $responses
     */
    public function setResponses($responses);
}

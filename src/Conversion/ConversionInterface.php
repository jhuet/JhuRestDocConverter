<?php

namespace Jhu\RestDocConverter\Conversion;

/**
 *
 */
interface ConversionInterface
{
    /**
     * Set Request depending on the chosen provider.
     *
     * @param mixed $request
     */
    public function setRequest($request);

    /**
     * Add a Response depending on the chosen provider.
     *
     * @param mixed $response
     */
    public function addResponse($response);

    /**
     * Set Responses depending on the chosen provider.
     *
     * @param array $responses
     */
    public function setResponses($responses);

    /**
     * Set an object representing the method of the converter corresponding to
     * these request and responses. For example \Raml\Method for a Raml file.
     *
     * @param mixed $method
     */
    public function setMethod($method);
}

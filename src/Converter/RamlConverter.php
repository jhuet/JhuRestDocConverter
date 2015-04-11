<?php

namespace Jhu\RestDocConverter\Converter;

use Raml\ApiDefinition;
use Raml\Parser;
use Raml\Resource;

/**
 * Provide a way to convert a RAML specification to a list of conversions
 * containing the requests and their possible responses.
 */
class RamlConverter extends ConverterAbstract
{
    /**
     * Get Parser
     *
     * @return Parser
     */
    public function getParser()
    {
        if (is_null($this->parser)) {
            $this->setParser(new Parser());
        }

        return parent::getParser();
    }

    /**
     * Recursive method which converts RAML resource into Conversion.
     *
     * @param  Resource         $resource
     * @param  ApiDefinition    $definition
     */
    protected function createConversionsFromResource(Resource $resource, ApiDefinition $definition)
    {
        foreach ($resource->getMethods() as $method) {
            $conversion = $this->getProvider()->createConversion();

            // Convert to request
            $requestUri = $definition->getBaseUrl() . $resource->getUri();
            $requestMethodType = $method->getType();
            $requestBody = '';
            $requestHeaders = [];

            // @todo handle multiple types
            if ($method->getExampleByType('application/json')) {
                $requestHeaders['Content-Type'] = 'application/json';
            }

            $request = $this->getProvider()->createRequest($requestUri, $requestMethodType, $requestBody, $requestHeaders);
            $conversion->setRequest($request);

            // Convert to responses
            foreach ($method->getResponses() as $code => $response) {

                $responseBody = 'php://memory';
                $responseStatusCode = '';
                $responseHeaders = [];

                // @todo handle multiple types
                if ($response->getBodyByType('application/json')) {
                    $responseBody = $response->getBodyByType('application/json')->getExample();
                }

                $responseStatusCode = $response->getStatusCode();

                // @todo test
                if ($response->getHeaders()) {
                    foreach ($response->getHeaders() as $key => $value) {
                        if (isset($value['required']) && $value['required']) {
                            $responseHeaders[$key] = isset($value['example']) ? $value['example'] : '';
                        }
                    }
                }

                $response = $this->getProvider()->createResponse($responseBody, $responseStatusCode, $responseHeaders);
                $conversion->addResponse($response);
            }

            $conversion->setMethod($method);

            $this->addConversion($conversion);
        }

        foreach ($resource->getResources() as $subresource) {
            $this->createConversionsFromResource($subresource, $definition);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function convert($filename)
    {
        $definition = $this->getParser()->parse($filename);

        if ($definition->getResources()) {
            foreach ($definition->getResources() as $resource) {
                $this->createConversionsFromResource($resource, $definition);
            }
        }

        return $this->getConversions();
    }
}

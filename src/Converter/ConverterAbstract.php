<?php

namespace Jhu\RestDocConverter\Converter;

use Jhu\RestDocConverter\Conversion\ConversionInterface;
use Jhu\RestDocConverter\Provider\ProviderInterface;

/**
 *
 */
abstract class ConverterAbstract implements ConverterInterface
{
    /**
     * Parser
     *
     * @var Parser
     */
    protected $provider;

    /**
     * Config
     *
     * @var array
     */
    protected $config;

    /**
     * Parser
     *
     * @var mixed
     */
    protected $parser;

    /**
     * The created conversions
     *
     * @var array   A list of Jhu\RestDocConverter\Conversion
     */
    protected $conversions;

    /**
     * Constructor
     *
     * @param ProviderInterface     $provider
     * @param array                 $config
     * @param Parser                $parser
     */
    public function __construct(ProviderInterface $provider, array $config = [], Parser $parser = null)
    {
        $this->setProvider($provider);

        $this->setConfig(array_merge([
            'allowed_response_types' => ['application/json'],
            'version_in_namespace' => false
        ], $config));

        if (! is_null($parser)) {
            $this->setParser($parser);
        }
    }

    /**
     * {@inheritDoc}
     */
    abstract public function convert($filepath);

    /**
     * Get Provider
     *
     * @return ProviderInterface
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Set Provider
     *
     * @param ProviderInterface     $provider
     */
    public function setProvider(ProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    /**
     * Get Config
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Set Config
     *
     * @param array     $config
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    /**
     * Get Parser
     *
     * @return Parser
     */
    public function getParser()
    {
        return $this->parser;
    }

    /**
     * Set Parser
     *
     * @param mixed     $parser
     */
    public function setParser($parser)
    {
        $this->parser = $parser;
    }

    /**
     * Get Requests
     *
     * @return array    A list of Jhu\RestDocConverter\Conversion\ConversionInterface
     */
    public function getConversions()
    {
        return $this->conversions;
    }

    /**
     * Add a Conversion
     *
     * @param ConversionInterface   $conversion
     */
    public function addConversion(ConversionInterface $conversion)
    {
        $this->conversions[] = $conversion;
    }

    /**
     * Set Conversions
     *
     * @param array $conversions A list of Jhu\RestDocConverter\Conversion\ConversionInterface
     */
    public function setConversions($conversions)
    {
        $this->conversions = $conversions;
    }
}

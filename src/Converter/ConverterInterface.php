<?php

namespace Jhu\RestDocConverter\Converter;

/**
 *
 */
interface ConverterInterface
{
    /**
     * Convert a given specification to a list of conversions
     * containing the requests and their possible responses.
     *
     * @param  mixed    $filepath   Filepath to specification
     *
     * @return array                A list of Jhu\RestDocConverter\Conversion\ConversionInterface
     */
    public function convert($filepath);
}

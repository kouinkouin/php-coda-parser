<?php

namespace Codelicious\Coda\DetailParsers;

/**
 * @package Codelicious\Coda
 * @author  Wim Verstuyf (wim.verstuyf@codelicious.be)
 * @license http://opensource.org/licenses/GPL-2.0 GPL-2.0
 */
class Transaction32Parser implements ParserInterface
{
    /**
     * Parse the given string containing 32 into a Transaction-object
     *
     * @param string $coda32_line
     *
     * @return object
     */
    public function parse($coda32_line)
    {
        $coda32 = new \Codelicious\Coda\Data\Raw\Transaction32();

        $coda32->sequence_number        = trim(substr($coda32_line, 2, 4));
        $coda32->sequence_number_detail = trim(substr($coda32_line, 6, 4));
        $coda32->message                = substr($coda32_line, 10, 105);

        $coda32->address = str_split($coda32->message, 35);
        foreach (array_keys($coda32->address) as $i) {
            $coda32->address[$i] = trim($coda32->address[$i]);
        }

        $coda32->message = trim_space($coda32->message);

        return $coda32;
    }

    public function accept_string($coda_line)
    {
        return strlen($coda_line) == 128 && substr($coda_line, 0, 2) == "32";
    }
}

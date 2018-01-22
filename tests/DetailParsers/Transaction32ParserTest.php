<?php

namespace Codelicious\Tests\Coda\DetailParsers;

class Transaction32ParserTest extends \PHPUnit_Framework_TestCase
{
    public function testSample1()
    {
        $parser = new \Codelicious\Coda\DetailParsers\Transaction32Parser();

        $sample = "3200010001MAIN STREET 928                    5480 SOME CITY                                                                  0 0";

        $this->assertEquals(true, $parser->accept_string($sample));

        $result = $parser->parse($sample);

        $this->assertEquals("0001", $result->sequence_number);
        $this->assertEquals("0001", $result->sequence_number_detail);
        $this->assertEquals("MAIN STREET 928                    5480 SOME CITY ", $result->message);

        $this->assertEquals("MAIN STREET 928", $result->address[0]);
        $this->assertEquals("5480 SOME CITY", $result->address[1]);
        $this->assertEquals("", $result->address[2]);
    }
}

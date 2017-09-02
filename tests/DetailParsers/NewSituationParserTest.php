<?php

namespace Codelicious\Tests\Coda\DetailParsers;

class NewSituationParserTest extends \PHPUnit_Framework_TestCase
{
    public function testSample1()
    {
        $parser = new \Codelicious\Coda\DetailParsers\NewSituationParser();

        $sample = "8225001548226815 EUR0BE                  1000000500012100120515                                                                0";

        $this->assertEquals(true, $parser->accept_string($sample));

        $result = $parser->parse($sample);

        $this->assertEquals("225", $result->statement_sequence_number);
        $this->assertEquals("001548226815 EUR0BE                  ", $result->account);
        $this->assertEquals(-500012.100, $result->balance);
        $this->assertEquals("2015-05-12", $result->date);
    }
}

<?php

namespace Codelicious\Coda\Data\Raw;

/**
 * @package Codelicious\Coda
 * @author  Wim Verstuyf (wim.verstuyf@codelicious.be)
 * @license http://opensource.org/licenses/GPL-2.0 GPL-2.0
 */
class Statement
{
    /**
     * @var Identification
     */
    public $identification;

    /**
     * @var OriginalSituation
     */
    public $original_situation;

    /**
     * @var Transaction[]
     */
    public $transactions = [];

    /**
     * @var NewSituation
     */
    public $new_situation;

    /**
     * @var Message[]
     */
    public $messages = [];

    /**
     * @var Summary
     */
    public $summary;
}

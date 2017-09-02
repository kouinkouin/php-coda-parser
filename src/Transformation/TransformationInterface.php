<?php

namespace Codelicious\Coda\Transformation;

use Codelicious\Coda\Data;

/**
 * @package Codelicious\Coda
 * @author  Wim Verstuyf (wim.verstuyf@codelicious.be)
 * @license http://opensource.org/licenses/GPL-2.0 GPL-2.0
 */
interface TransformationInterface
{
    const CLASS_TRANSACTION = 'transaction';
    const CLASS_ACCOUNT     = 'account';
    const CLASS_STATEMENT   = 'statement';

    /**
     * Transform Data\Raw\Statements to Data\Simple\Statements
     *
     * @param Data\Raw\Statement $coda_statements
     *
     * @return Data\Simple\Statements
     */
    public function transform(Data\Raw\Statement $coda_statements);

    public function transformToAccount(
        Data\Raw\Identification $coda_identification,
        Data\Raw\OriginalSituation $coda_original_situation
    );

    public function transformToOtherPartyAccount(
        Data\Raw\Transaction22 $coda_line22,
        Data\Raw\Transaction23 $coda_line23 = null
    );

    public function transformMessages(array $coda_messages);

    public function transformTransaction(Data\Raw\Transaction $coda_transaction);

    public function concatenateTransactionMessages(Data\Raw\Transaction $coda_transaction);

    /**
     * Define an array of string, each element contains the type of object supported by the transformation
     *
     * @param array $definition
     *
     * @return $this
     */
    public function setSimpleObjectsDefinition(array $definition);

    /**
     * @return array
     */
    public function getSimpleObjectDefinitions();
}
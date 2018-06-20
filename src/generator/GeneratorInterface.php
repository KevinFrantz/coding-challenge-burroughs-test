<?php
namespace generator;

/**
 *
 * @author kevinfrantz
 *        
 */
interface GeneratorInterface
{
    /**
     * Generates the csv
     */
    public function getJournalCsv():string;
}


<?php

namespace Utils\Parsers;

use Exception;

class Parsers 
{
    protected $typeParser;
    public $parser; 

    public function __construct($typeParser) 
    {
        $this->typeParser = $typeParser;
        $this->verifyParser($this->typeParser);
    }

    private function verifyParser($type) 
    {
        switch($type) {
            case 'csv':
                $this->parser = new CSVParser();
                break;
            default:
                throw new Exception("Parser type not found");
        }
    }
}
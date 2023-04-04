<?php

namespace Utils\Parsers;

class CSVParser 
{
    public function handle($file) 
    {
        return $this->readFile($file);
    }

    private function readFile($file, $delimiter = ',') 
    {
        $csv = fopen($file, 'r');

        while (!feof($csv)) {
           $rows[] = explode(',' , fgetcsv($csv, 0, $delimiter)[0]); 
        }
        fclose($csv);
        
        return $rows;
    }
}
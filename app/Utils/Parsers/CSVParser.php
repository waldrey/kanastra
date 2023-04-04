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

        $header;
        $numberRows = 0;
        while (!feof($csv)) {
            if ($numberRows == 0) {
                $header = explode(',', fgetcsv($csv, 0, $delimiter)[0]);
                $numberRows++;
            }
            
           $line = explode(',', fgetcsv($csv, 0, $delimiter)[0]);
           $rows[] = array_combine($header, $line);
        }
        fclose($csv);

        return $rows;
    }
}
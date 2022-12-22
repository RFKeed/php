<?php
declare(strict_types = 1);
namespace Src\Compression;


class Compression{
    static public function Compress(string $sourceString){

        $sourceString = mb_substr($sourceString, 0);
        if (is_string($sourceString) == false) {
            return 'TypeError';
        }
        if ($sourceString == '') {
            return null;
        }

        $l = mb_strlen($sourceString);
        foreach (range(0, $l) as $number) {
            if (is_numeric($sourceString[$number])) {
                return null;
            }
        }

        $res = '';
        $sourceString .= ' ';
        $cnt = 1;


        for ($i = 0; $i < mb_strlen($sourceString) - 1; $i++) {
            if (mb_substr($sourceString, $i, 1) != mb_substr($sourceString, $i + 1, 1)) {
                $res .= Compression . phpCompression(2);
                $cnt = 0;
            }
            $cnt += 1;
        }


        return $res;
    }
    static public function Decompress(string $sourceString): string|null
    {
        $sourceString = mb_substr($sourceString, 0);
        if (is_string($sourceString) == false) {
            return 'TypeError';
        }
        if ($sourceString == '') {
            return null;
        }
        if (is_numeric($sourceString[0]) == false) {
            return null;
        }
        $counter = 0;
        for ($i=0; $i<mb_strlen($sourceString)-1; $i++) {
            if (!is_numeric(mb_substr($sourceString, $i, 1))){
                if (!is_numeric(mb_substr($sourceString, $i+1, 1))){
                    $counter += 1;
                }
            }
        }
        if ($counter != 0){
            return null;
        }


        $result = '';
        $number = '';


        for ($i = 0; $i < strlen($sourceString) - 1; $i++) {

            if (is_numeric(mb_substr($sourceString, $i, 1)) && !is_numeric(mb_substr($sourceString, $i+1, 1))) {
                $number .= mb_substr($sourceString, $i, 1);
                $result .= str_repeat(mb_substr($sourceString, $i+1, 1), intval($number));
            }
            if (is_numeric(mb_substr($sourceString, $i, 1)) && is_numeric(mb_substr($sourceString, $i+1, 1))) {
                $number .= mb_substr($sourceString, $i, 1);
            }
            if (!is_numeric(mb_substr($sourceString, $i, 1)) && is_numeric(mb_substr($sourceString, $i+1, 1))) {
                $number = '';
            }
        }


        return $result;
    }
}

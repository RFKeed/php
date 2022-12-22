<?php
declare(strict_types = 1);
namespace Src\WordsCount;
class WordsCount
{
    static public function getWordsCount(string $sourceString): ?array
    {
        $sourceString = mb_strtolower($sourceString, "UTF-8");
        $sourceString = preg_replace('([-,.;:‘“\"\']+)u', '', $sourceString);
        $sourceString = preg_replace('/(\r\n|\n|\r)/', ' ', $sourceString);
        $sourceString = preg_replace('( +)u', ' ', $sourceString);
        $sourceString = trim($sourceString, ' ');
        $temp = explode(' ', $sourceString);
        $temp = array_unique($temp);

        if (strlen($sourceString) < 1)
        {
            return array();
        }
        $sourceString = ' ' . $sourceString . ' ';
        $sourceString = preg_replace('( +)u', ' ', $sourceString);
        $result = array();
        foreach ($temp as $value) {
            $cnt = substr_count($sourceString, ' ' . $value . ' ');
            $result[$value] = $cnt;
        }
        ksort($result);
        return $result;
    }
}
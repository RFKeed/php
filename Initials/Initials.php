<?php
declare(strict_types=1);
namespace Src\Initials;
class Initials
{
    static public function getInitials(string $FIO): ?string
    {
        $lower = mb_strtolower($FIO, "UTF-8");
        $converted = mb_convert_case($lower, MB_CASE_TITLE, "UTF-8");
        $split = explode(' ', $converted);
        if ((empty($converted) || count($split) < 2)) {
            return null;
        }
        if (count($split) == 2 and $split[1] == '') {
            return null;
        }
        $result = $split[0] . ' ';
        $split = mb_str_split($converted);
        for ($i = mb_strlen($result) - 1; $i < count($split); $i += 1) {
            if ($split[$i] == " ") {
                $result .= $split[$i + 1] . ".";
            } elseif ($split[$i] == "-") {
                $result .= "-" . $split[$i + 1] . ".";
            }
        }
        return $result;
    }
}

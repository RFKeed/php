<?php
declare (strict_types = 1);
namespace Src\Bmi;
class Bmi
{
    static public function getBMI(int $height, float $weight):float|int|null
    {
        if ($height <= 300 and $height >= 10 and $weight >= 1.0 and $weight <= 300.0){
            $height /= 100;
            return round(($weight / pow($height, 2)),2);
        } else{
            return null;
        }



    }
}


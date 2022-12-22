<?php
declare(strict_types=1);
namespace Src\SumNK;
class SumNK{

    static public function getSumNK(array $input, int $N, int $K){
        if (empty($input)) {
            return 0;
        }
        foreach ($input as $num) {
            if (is_int($num) == 0) {
                return -1;
            }
        }

        if (($K < 0) or ($N < 0)) {
            return -1;
        }

        if (($N > count($input) or ($K > count($input)))) {
            return -1;
        }

        if ($K == 0) {
            $K += 1;
        }
        if ($N == 0) {
            if (count($input) < ($N + $K)) {
                return -1;
            }
        }
        if ($N != 0) {
            if ((count($input) < ($N + $K - 1)) == 1) {
                return -1;
            }
        }


        if ($N == 0) {
            $K = 1;
            $N += count($input);
        }


        return array_sum(array_slice($input, $K - 1, $N));
    }

}
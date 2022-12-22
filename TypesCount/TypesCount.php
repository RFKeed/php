<?php
declare(strict_types = 1);
namespace Src\TypesCount;


class TypesCount{
    static public function getTypesCount(...$mixedParams){
        $result['boolean'] = 0;
        $result['integer'] = 0;
        $result['float'] = 0;
        $result['string'] = 0;
        $result['object'] = 0;
        $result['array'] = 0;


        for($i = 0; $i < count($mixedParams); ++$i){
            if(gettype($mixedParams[$i]) == 'boolean') {
                $result['boolean'] += 1;
            }

            elseif(gettype($mixedParams[$i]) == 'integer') {
                $result['integer'] += 1;
            }

            elseif(gettype($mixedParams[$i]) == 'double') {
                $result['float'] += 1;
            }

            elseif(gettype($mixedParams[$i]) == 'string') {
                $result['string'] += 1;
            }

            elseif(gettype($mixedParams[$i]) == 'object') {
                $result['object'] += 1;
            }

            elseif(gettype($mixedParams[$i]) == 'array') {
                $result['array'] += 1;
            }
            else{
                return null;
            }
        }
        return $result;
}}


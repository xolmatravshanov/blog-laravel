<?php

namespace App\Helpers;

class ArrayHelper
{

    public function map(array $array, $from, $to)
    {
        $return = [];

        foreach ($array as $key => $item) {
            $return[$item[$from]] = $item[$to];
        }

        return $return;
    }
}

<?php

namespace App\Services;

/**
 *
 */
class MathService
{
    /**
     * @param array $numbers
     * @param int $targetSum
     * @return array
     */
    public function findTripleArray(array $numbers, int $targetSum): array
    {
        $combinations = [];
        for ($i = 0; $i < count($numbers) - 2; $i++) {
            $sum = $numbers[$i] + $numbers[$i + 1] + $numbers[$i + 2];
            if ($sum === $targetSum) {
                $combinations[] = [$numbers[$i] . " + " . $numbers[$i + 1] . " + " . $numbers[$i + 2]
                    . " = " . $targetSum];
            }
        }
        return $combinations;
    }

    /**
     * @param array $numbers
     * @return string
     */
    public function findSingleNumbers(array $numbers): string
    {
        $collection = collect($numbers);
        $counter = $collection->countBy();
        return $collection->filter(function ($value) use ($counter) {
            if ($counter[$value] == 1) {
                return $value;
            }
            return null;
        })->implode(',',);
    }
}

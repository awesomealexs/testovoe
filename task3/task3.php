<?php


class task3
{
    public function getResult(array $boxes, int $weight): int
    {
        sort($boxes);
        $boxes = $this->filterArray($boxes, $weight);

        $courierRidesCount = 0;

        while (count($boxes) > 1) {
            $firstBoxWeight = $boxes[0];
            $lastBoxWeight = end($boxes);
            if ($weight === ($firstBoxWeight + $lastBoxWeight)) {
                array_pop($boxes);
                array_shift($boxes);
                $courierRidesCount++;
            } else {
                array_pop($boxes);
            }
        }


        return $courierRidesCount;
    }

    private function filterArray(array $boxes, int $weight): array
    {
        foreach ($boxes as $k => $v) {
            if ($v >= $weight) {
                unset($boxes[$k]);
            }
        }

        return $boxes;
    }
}
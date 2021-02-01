<?php

namespace TddBest\StrategySamplePhp;

use UnexpectedValueException;

class Cart
{
    /**
     * @param string $shipper
     * @param int $length
     * @param int $width
     * @param int $height
     * @param int $weight
     * @return float|int
     */
    public function shippingFee(string $shipper, int $length, int $width, int $height, int $weight)
    {
        if ($shipper === 'black cat') {
            if ($weight > 20) {
                return 500;
            } else {
                return 100 + $weight * 10;
            }
        } else if ($shipper === 'hsinchu') {
            $size = $length * $width * $height;
            if ($length > 100 || $width > 100 || $height > 100) {
                return $size * 0.00002 * 1100 + 500;
            } else {
                return $size * 0.00002 * 1200;
            }
        } else if ($shipper === 'post office') {
            $feeByWeight = 80 + $weight * 10;
            $size = $length * $width * $height;
            $feeBySize = $size * 0.00002 * 1100;

            return min($feeBySize, $feeByWeight);
        } else {
            throw new UnexpectedValueException('shipper not exist');
        }
    }
}

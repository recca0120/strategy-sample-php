<?php

namespace TddBest\StrategySamplePhp;

use UnexpectedValueException;

class Cart
{
    /**
     * @param string $shipper
     * @param Product $product
     * @return float|int
     */
    public function shippingFee(string $shipper, Product $product)
    {
        if ($shipper === 'black cat') {
            if ($product->weight > 20) {
                return 500;
            } else {
                return 100 + $product->weight * 10;
            }
        } else if ($shipper === 'hsinchu') {
            $size = $product->length * $product->width * $product->height;
            if ($product->length > 100 || $product->width > 100 || $product->height > 100) {
                return $size * 0.00002 * 1100 + 500;
            } else {
                return $size * 0.00002 * 1200;
            }
        } else if ($shipper === 'post office') {
            $feeByWeight = 80 + $product->weight * 10;
            $size = $product->length * $product->width * $product->height;
            $feeBySize = $size * 0.00002 * 1100;

            return min($feeBySize, $feeByWeight);
        } else {
            throw new UnexpectedValueException('shipper not exist');
        }
    }
}

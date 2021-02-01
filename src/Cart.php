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
            return $this->feeByBlackCat($product);
        } else if ($shipper === 'hsinchu') {
            return $this->feeByHsinchu($product);
        } else if ($shipper === 'post office') {
            return $this->feeByPostOffice($product);
        } else {
            throw new UnexpectedValueException('shipper not exist');
        }
    }

    /**
     * @param Product $product
     * @return float|int
     */
    private function feeByBlackCat(Product $product)
    {
        if ($product->weight > 20) {
            return 500;
        } else {
            return 100 + $product->weight * 10;
        }
    }

    /**
     * @param Product $product
     * @return float|int
     */
    private function feeByHsinchu(Product $product)
    {
        $size = $product->length * $product->width * $product->height;
        if ($product->length > 100 || $product->width > 100 || $product->height > 100) {
            return $size * 0.00002 * 1100 + 500;
        } else {
            return $size * 0.00002 * 1200;
        }
    }

    /**
     * @param Product $product
     * @return mixed
     */
    private function feeByPostOffice(Product $product)
    {
        $feeByWeight = 80 + $product->weight * 10;
        $size = $product->length * $product->width * $product->height;
        $feeBySize = $size * 0.00002 * 1100;

        return min($feeBySize, $feeByWeight);
    }
}

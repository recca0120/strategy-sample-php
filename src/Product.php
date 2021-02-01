<?php


namespace TddBest\StrategySamplePhp;


class Product
{
    /**
     * @var int
     */
    public $length;
    /**
     * @var int
     */
    public $width;
    /**
     * @var int
     */
    public $height;
    /**
     * @var int
     */
    public $weight;

    /**
     * Product constructor.
     * @param int $length
     * @param int $width
     * @param int $height
     * @param int $weight
     */
    public function __construct(int $length, int $width, int $height, int $weight)
    {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
        $this->weight = $weight;
    }

    /**
     * @return float|int
     */
    public function size()
    {
        $size = $this->length * $this->width * $this->height;

        return $size;
    }
}

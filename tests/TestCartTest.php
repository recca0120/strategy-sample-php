<?php

namespace TddBest\StrategySamplePhp\Tests;

use PHPUnit\Framework\TestCase;
use TddBest\StrategySamplePhp\Cart;

class TestCartTest extends TestCase
{
    /**
     * @var string
     */
    private $blackCat;
    /**
     * @var string
     */
    private $hsinchu;
    /**
     * @var string
     */
    private $postOffice;
    /**
     * @var Cart
     */
    private $cart;

    protected function setUp(): void
    {
        $this->blackCat = 'black cat';
        $this->hsinchu = 'hsinchu';
        $this->postOffice = 'post office';
        $this->cart = new Cart();
    }

    public function test_black_cat_with_light_weight(): void
    {
        $shippingFee = $this->shippingFee($this->blackCat, 30, 20, 10, 5);
        $this->feeShouldBe(150, $shippingFee);
    }

    public function test_black_cat_with_heavy_weight(): void
    {
        $shippingFee = $this->shippingFee($this->blackCat, 30, 30, 10, 50);
        $this->feeShouldBe(500, $shippingFee);
    }

    public function test_hsinchu_with_small_size(): void
    {
        $shippingFee = $this->shippingFee($this->hsinchu, 30, 20, 10, 50);
        $this->feeShouldBe(144, $shippingFee);
    }

    public function test_hsinchu_with_huge_size(): void
    {
        $shippingFee = $this->shippingFee($this->hsinchu, 100, 20, 10, 50);
        $this->feeShouldBe(480, $shippingFee);
    }

    public function test_post_office_by_weight(): void
    {
        $shippingFee = $this->shippingFee($this->postOffice, 100, 20, 10, 3);
        $this->feeShouldBe(110, $shippingFee);
    }

    public function test_post_office_by_size(): void
    {
        $shippingFee = $this->shippingFee($this->postOffice, 100, 20, 10, 300);
        $this->feeShouldBe(440, $shippingFee);
    }

    private function shippingFee(string $shipper, int $length, int $width, int $height, int $weight)
    {
        $shippingFee = $this->cart->shippingFee($shipper, $length, $width, $height, $weight);

        return $shippingFee;
    }

    private function feeShouldBe(int $expected, float $actualFee): void
    {
        self::assertEquals($expected, $actualFee);
    }
}

<?php

/**
 * List of the products
 */
const products = [
    'R01' => [
        'name' => 'Red Widget',
        'price' => 32.95
    ],
    'G01' => [
        'name' => 'Green Widget',
        'price' => 24.95
    ],
    'B01' => [
        'name' => 'Blue Widget',
        'price' => 7.95
    ]
];
/**
 * Interface for the basket
 */
interface BasketInterface
{
    public function add($productCode);
    public function total();
}

/**
 * Basket class
 */
class Basket implements BasketInterface
{
    /**
     * @var array $basket
     */
    protected $basket = [];

    /**
     * @param $productCode
     * @return void
     */
    public function add($productCode)
    {
        $this->basket[] = $productCode;
    }

    /**
     * Get the sub total of the basket without delivery charge and discounts
     * @return int
     */
    public function subTotal()
    {
        $total = 0;
        foreach ($this->basket as $productCode) {
            $total += products[$productCode]['price'];
        }

        return $total;
    }

    /**
     * Get the total of the basket with delivery charge and discounts
     * @return float|int
     */
    public function total()
    {
        $total = $this->subTotal();
        $redWidgetCount = 0;
        foreach ($this->basket as $productCode) {
            if ($productCode == 'R01') {
                $redWidgetCount++;
            }
        }

        if ($redWidgetCount >= 2) {
            $total -=  products['R01']['price'] * 0.5;
        }

        $total += $this->deliveryCharge();
        return $total;
    }

    /**
     * Get the delivery charge based on the sub total
     * @return float|int
     */
    public function deliveryCharge()
    {
        $subTotal = $this->subTotal();
        if ($subTotal < 50) {
            return 4.95;
        } elseif ($subTotal < 90) {
            return 2.95;
        } else {
            return 0;
        }
    }
}

$basket = new Basket();
$basket->add('B01');
$basket->add('B01');
$basket->add('R01');
$basket->add('R01');
$basket->add('R01');
echo $basket->total();


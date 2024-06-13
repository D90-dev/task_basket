# PHP Shopping Basket

This project is a simple implementation of a shopping basket in PHP.

## Features

- Add products to the basket
- Calculate the total cost of the basket, including discounts and delivery charges

## Usage

The main class is `Basket`, which implements the `BasketInterface`.

You can add products to the basket using the `add` method, passing the product code as an argument.

The `total` method will return the total cost of the basket, including any applicable discounts and delivery charges.

Here's a basic example:

```php
$basket = new Basket();
$basket->add('B01'); // Add Blue Widget
$basket->add('R01'); // Add Red Widget
echo $basket->total(); // Output the total cost
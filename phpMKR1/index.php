<?php

$products = [
    ['id' => 1, 'title' => 'Смартфон', 'country' => 'Китай', 'price' => 300],
    ['id' => 2, 'title' => 'Ноутбук', 'country' => 'США', 'price' => 800],
    ['id' => 3, 'title' => 'Телевізор', 'country' => 'Японія', 'price' => 500],
    ['id' => 4, 'title' => 'Кавоварка', 'country' => 'Італія', 'price' => 150],
    ['id' => 5, 'title' => 'Принтер', 'country' => 'Германія', 'price' => 200]
];

if (isset($_GET['country'])) {
    if ($_GET['country'] === 'all') {
        $filteredProducts = $products;
    } else {

        $filteredProducts = array_filter($products, function ($element) {
            $return_flag = true;

            if ($_GET['country'] !== $element['country']) {
                $return_flag = false;
            }

            return $return_flag;
        });
    }
}

$file = fopen('data.csv', 'w');

$firstRow = $products[0];
fputcsv($file, array_keys($firstRow));

foreach ($products as $row) {
    fputcsv($file, $row);
}

include 'templates/products.phtml';

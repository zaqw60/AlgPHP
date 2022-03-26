<?php

class Basket
{
/**
* Сессионный ключ списка всех продуктов корзины
*/
private const BASKET_DATA_KEY = 'basket';

/**
* @var SessionInterface
*/
private $session;

/**
* @param SessionInterface $session
*/
public function __construct(SessionInterface $session)
{
$this->session = $session;
}

/**
* Добавляем товар в заказ
*
* @param int $product
*
* @return void
*/
public function addProduct(int $product): void
{
$basket = $this->session->get(static::BASKET_DATA_KEY, []);
if (!in_array($product, $basket, true)) {
$basket[] = $product;
$this->session->set(static::BASKET_DATA_KEY, $basket);
}
}
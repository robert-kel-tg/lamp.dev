<?php

interface UserInterface
{
    public function getName();

    public function getPersonalCode();

    public function getProductList();
}

interface NumberInterface
{
    public function getNumber();
}

interface ProductInterface
{
    public function getName();

    public function getValue();
}

abstract class Product implements ProductInterface
{
    private $name;

    private $value;

    function __construct($name, $value)
    {
        $this->name = $name;

        $this->value = $value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }
}

class FruitProduct extends Product
{

}

class ITProduct extends Product
{
    public function getValue()
    {
        return 2 * $this->parentValue();
    }

    private function parentValue()
    {
        return parent::getValue();
    }
}

class Number implements NumberInterface
{
    private $value;

    public function __construct($value)
    {
        $this->value;
    }

    public function getNumber()
    {
        return sprintf("%d", $this->value);
    }
}

class User implements UserInterface
{
    private $name;

    private $personalCode;

    private $productList;

    public function __construct($name, NumberInterface $personalNumber)
    {
        $this->name = $name;
        $this->personalCode = $personalNumber->getNumber();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPersonalCode()
    {
        return $this->personalCode;
    }

    public function addProduct(ProductInterface $product)
    {
        $this->productList[] = $product;
    }

    public function getProductList()
    {
        return $this->productList;
    }
}

class ProductListIterator implements Iterator
{
    private $position = 0;

    private $list;

    public function __construct($list)
    {
        $this->list = $list;
    }

    public function current()
    {
        return $this->list[$this->position];
    }

    public function next()
    {
        return ++$this->position;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->list[$this->position]);
    }

    public function rewind()
    {
        return reset($this->list);
    }

}

class UserPayProcess implements IteratorAggregate
{
    private $paymentType;

    public function __construct(UserInterface $user, PaymentTypeInterface $paymentType)
    {
        $this->user = $user;

        $this->paymentType = $paymentType;
    }

    public function getIterator()
    {
        return new ProductListIterator($this->user->getProductList());
    }

    public function execute()
    {
        $iterator = $this->getIterator();

        $sum = 0;
        $iterator->rewind();
        while($iterator->valid()) {

            $sum += $iterator->current()->getValue() * $this->paymentType->rate();

            $iterator->next();
        }

        return $this->paymentType->pay($sum);
    }
}

# Strategy Pattern

interface PaymentTypeInterface
{
    public function rate();

    public function pay($total);
}

class PayPalPayment implements PaymentTypeInterface
{
    public function rate()
    {
        return 2;
    }

    public function pay($total)
    {
        return $total;
    }
}

class CashPayment implements PaymentTypeInterface
{
    public function rate()
    {
        return 5;
    }

    public function pay($total)
    {
        return $total;
    }
}

class AnotherPayment implements PaymentTypeInterface
{
    public function rate()
    {
        return 7;
    }

    public function pay($total)
    {
        return $total;
    }
}

$user = new User('Petras', new Number(12345));
$user->addProduct(new FruitProduct('apple', 10));
$user->addProduct(new FruitProduct('banana', 15));
$user->addProduct(new ITProduct('monitor', 20));
$user->addProduct(new ITProduct('cpu', 30));

$userPaymentProcess = new UserPayProcess($user, new CashPayment());
echo $userPaymentProcess->execute();


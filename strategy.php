<?php
interface PayInterface {
    public function pay($phone, $sum);
}

class QiwiPayment implements PayInterface {
    public function pay($phone, $sum)
    {
        // TODO: Implement payment() method.
    }
}

class YandexPayment implements PayInterface {
    public function pay($phone, $sum)
    {
        // TODO: Implement payment() method.
    }
}

class WebMoneyPayment implements PayInterface {
    public function pay($phone, $sum)
    {
        // TODO: Implement payment() method.
    }
}

class PayManager {
    protected $payment;

    public function __construct(PayInterface $payment) {
        $this->payment = $payment;
    }

    public function sendPay() {
        $this->payment->pay();
    }
}

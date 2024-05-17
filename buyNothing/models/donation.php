<?php

class Donation {
    private $amount;
    private $creditCardNumber;

    private function __construct() {
        // private constructor to prevent direct instantiation
    }

    public static function getInstance() {
        static $instance = null;
        if ($instance === null) {
            $instance = new Donation();
        }
        return $instance;
    }

    public function addDonation($amount, $creditCardNumber) {
        $this->amount += $amount;
        $this->creditCardNumber = $creditCardNumber;
        // process the donation using the credit card number
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getCreditCardNumber() {
        return $this->creditCardNumber;
    }
}

?>
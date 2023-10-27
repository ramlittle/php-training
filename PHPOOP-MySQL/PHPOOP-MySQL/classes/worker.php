<?php
class Worker{
    public $hoursWorked;
    public $hourlyRate;

    function calculateRegularPay(){
        $regularPay = $this->hoursWorked * $this->hourlyRate;
        return $regularPay;
    }
}

?>

<?php

namespace Http\Controllers;

use Http\Models\Index\Index;
use Http\View\View;

class indexController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function home()
    {
        $currencies = Index::getFile();
        $this->view->renderHtml('home/home.php', ['currencies' => $currencies]);
    }

    public function ajax()
    {
        if (isset($_POST['convert'])) {
            $json = Index::getData();
            $amount = $_POST['amount'];
            $cur1 = $_POST['from_currency'];
            $cur2 = $_POST['to_currency'];
            if (($cur1 == "USD" AND $cur2 == "GBP") || ($cur1 == "USD" AND $cur2 == "INR")
                || ($cur1 == "USD" AND $cur2 == "PHP") || ($cur1 == "USD" AND $cur2 == "USD")) {
                $convertedAmount = $amount * $json['rates'][$cur2];
                $data = array(
                    'exhangeRate' => $json['rates'][$cur2],
                    'convertedAmount' => $convertedAmount,
                    'fromCurrency' => $cur1,
                    'toCurrency' => $cur2
                );
                print_r(json_encode($data));
            }
        }
    }
}

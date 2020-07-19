<?php

namespace Http\Models\Index;


class Index
{

    public static function getData()
    {
        //url банка
        $url = "https://api.exchangeratesapi.io/latest?symbols=USD,GBP,INR,PHP&base=USD";
        // Создаём запрос
        $ch = curl_init();
        // Настройки запроса
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Отправка и декодинг ответа
        $data = json_decode(curl_exec($ch), $assoc = true);
        // Закрытие запроса
        curl_close($ch);
        return $data;
    }

    public static function getFile()
    {
        $currencies = array();
        $file = fopen('data.csv', 'r');
        while (!feof($file)) {
            $currency = fgetcsv($file);
            $currencies[] = array(
                'flag' => '/img/flags/' . $currency[0] . '.png',
                'country_fullname' => $currency[1],
                'currency_code' => $currency[2],
                'currency_name' => $currency[3],
                'country_name' => $currency[4],
            );
        }
        fclose($file);
        return $currencies;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: shini
 * Date: 5/3/2018
 * Time: 2:43 PM
 */
namespace ubslum\projectbusinessidea\components;

use linslin\yii2\curl;

class MyMailChimp{
    public $apikey = '7e7ddc428312656e2d1d08260fe70486-us16';
    public $idList = '3e9c54091f';

    /*
     * function addMember
     *
     */
    public function addMember($name='', $email, $phone=''){
        $url = 'https://us16.api.mailchimp.com/3.0/lists/'.$this->idList;
        $curl = new curl\Curl();

        $params = [
            'members' => [
                [
                    'email_address' => $email,
                    'status_if_new' => 'subscribed',
                    'merge_fields' => [
                        "FNAME"=> $name,
                        "LNAME"=> "",
                        "ADDRESS" => "",
                        "PHONE" => $phone,
                        "BIRTHDAY" => ""
                    ]
                ]
            ],
            'update_existing' => true
        ];

        $response = $curl->setRequestBody(json_encode($params))
            ->setHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode("remove:".$this->apikey)
            ])
            ->post($url);
    }
}
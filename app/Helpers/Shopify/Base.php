<?php
/**
 * User: Zhanybek Seitaliev
 * Email: zhandev312@gmail.com
 * Date: 12/22/17
 * Time: 11:31 AM
 */

namespace App\Helpers\Shopify;

use GuzzleHttp\Client;

class Base
{
    protected $shop, $token, $client;

    public function __construct($shop, $token)
    {

        $this->shop = $shop;
        $this->token = $token;
        $this->client = new Client(['base_uri' => "https://".$this->shop]);

    }

    /**
     * @param $resource
     * @return array
     */
    public function get($resource) {

        $response = $this->client->request('GET', $resource, ['headers' => [
            'X-Shopify-Access-Token' => $this->token,
            'X-Frame-Options' => 'allow'
        ]]);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @param $resource
     * @param $postData
     * @return array
     */
    public function post($resource, $postData) {

        $response = $this->client->request('POST', $resource, [
            'headers' => [
                'X-Shopify-Access-Token' => $this->token,
                'X-Frame-Options' => 'allow'
            ],
            'form_params' => $postData
        ]);

        return json_decode($response->getBody()->getContents(), true);

    }

    /**
     * @param $resource
     * @param $postData
     * @return array
     */
    public function update($resource, $postData) {

        $response = $this->client->request('UPDATE', $resource, [
            'headers' => [
                'X-Shopify-Access-Token' => $this->token,
                'X-Frame-Options' => 'allow'
            ],
            'form_params' => $postData
        ]);

        return json_decode($response->getBody()->getContents(), true);

    }

    /**
     * @param $resource
     * @return int
     */
    public function delete($resource) {

        $response = $this->client->request('DELETE', $resource, ['headers' => [
            'X-Shopify-Access-Token' => $this->token,
            'X-Frame-Options' => 'allow'
        ]]);

        return $response->getStatusCode();

    }

    /**
     * @return string
     */
    public function getToken() {

        return $this->token;

    }

    /**
     * @return string
     */
    public function getShopDomain()
    {
        return (string)$this->shop;
    }

}
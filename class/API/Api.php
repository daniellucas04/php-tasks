<?php

namespace API;

class Api {
    public static $method;
    private $response;
    private $error;
    private $baseURL = 'http://localhost:3333';

    public function getResponse() {
        return json_decode($this->response);
    }

    public function getError() {
        return $this->error;
    }

    public function request($endpoint){
        $url = $this->baseURL . "/$endpoint";
        $this->execCurl($url);
    }

    private function execCurl($url) {
        $curl = curl_init();

        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $this::$method,
            CURLOPT_HEADER => false
        ];

        curl_setopt_array($curl, $options);

        $this->response = curl_exec($curl);
        $this->error = curl_error($curl);
        $curl = curl_close($curl);
    }
}
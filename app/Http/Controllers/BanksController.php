<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class BanksController extends Controller
{
    const URL = 'https://edupir.testsbi.sberbank.ru:9443/ic/sso/';
    private function Data() {
        return http_build_query([
            'grant_type' => '',
            'code' => '',
            'redirect_uri' => '',
            'client_id' => '',
            'client_secret' => ''
        ]);
    }

    private function post($data) {
        $url = self::URL;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, 'Authorization: Basic test');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        $response =  curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code >= 300) {
            return false;
        }
        return view('game');
    }

    public function send($riesId, $message) {
        try {
            return $this->post($this->Data());
        } catch (\Exception $e) {
            throw $e;
        }
    }
}

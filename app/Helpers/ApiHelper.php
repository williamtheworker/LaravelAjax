<?php

namespace App\Helpers;

class ApiHelper {
    // Test comment
    // Emergency comment
    // Another emergency comment
    static function curl_to_url ($url, $data) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        
        $result = curl_exec($ch);
        $response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $result;
    }
}
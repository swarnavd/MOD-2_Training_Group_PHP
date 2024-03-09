<?php
    /**
     * apiCall function to call the api and get the response.
     *
     * @param string $url
     * @return array
     */
    function apiCall($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec($ch);
        $decode=json_decode($resp,true);
        return $decode;
    }
?>
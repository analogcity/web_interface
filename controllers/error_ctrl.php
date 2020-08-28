<?php

require_once P_MODELS . 'api_page.php';

class errorController extends ApiPage
{
    public function __construct()
    {
        $this->register_payload(['error' => '404']);
    }
}
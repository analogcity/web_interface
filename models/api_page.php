<?php

abstract class ApiPage {

    private $func_render = 'default_render';
    private $payload = array();

    private function default_render()
    {
        echo json_encode($this->payload);
    }

    public function render()
    {
        $this->{ $this->func_render }();
    }

    protected function register_payload(array $payload)
    {
        $this->payload = $payload;
    }

    protected function register_func_render(string $func_render)
    {
        $this->func_render = $func_render;
    }

}
<?php

require_once P_MODELS . 'api_page.php';
require_once P_MODELS . 'thread.php';

class threadController extends ApiPage
{
    public function __construct()
    {
        if (!InputUtils::validateGET(['n'])) {
            $this->register_payload([
                'threads' => Thread::get_all_threads()
            ]);
            return;
        }

        $t_id = InputUtils::get_input_int('n', INPUT_GET);
        $thread = [
            "thread" => [
                "id" => $t_id,
                "op" => Thread::get_op_in_thread($t_id),
                "replies" => Thread::get_posts_in_thread($t_id)
            ]
        ];

        $this->register_payload($thread);
    }
}
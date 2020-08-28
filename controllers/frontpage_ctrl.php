<?php

require_once P_MODELS . 'api_page.php';
require_once P_MODELS . 'board.php';

class frontpageController extends ApiPage {

    public function __construct()
    {
        $explanation = [
            'What is this' => 'This api let\'s you see the state of boards and threads in AC. Posting it is not yet implemented but it will be.',
            'Get list of boards' => '/?p=board',
            'Get list of threads in board' => '/?p=board&b=board_link',
            'Get list of threads' => '/?p=thread',
            'Get thread with its posts' => '/?p=thread&n=thread_id'
        ];
        $this->register_payload($explanation);
    }
}
<?php

require_once P_MODELS . 'api_page.php';
require_once P_MODELS . 'board.php';

class boardController extends ApiPage {

    public function __construct()
    {
        if (!InputUtils::validateGET(['b'])) {
            $this->register_payload([
                "boards" => Board::get_list_boards()
            ]);
            return;
        }

        $board = InputUtils::get_input_str('b', INPUT_GET);
        $threads = [
            "board" => $board,
            "threads" => Board::get_threads_in_board($board)
        ];

        $this->register_payload($threads);
    }
}
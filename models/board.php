<?php

class Board
{
    const BOARDS_QUERY = "SELECT link, name, description FROM board";
    const THREADS_IN_BOARD_QUERY = "SELECT id, title, author, comment, creation, last_rp, replies, pinned FROM thread WHERE table_id = (SELECT id FROM board WHERE link = ?) ORDER BY pinned DESC,last_rp DESC LIMIT 25";

    public static function get_list_boards() : array
    {
        $db = DataBase::getInstance();
        
        if (!$db->unsafe_query(self::BOARDS_QUERY)) {
            if (DEBUG) {
                echo var_dump($db);
                die('querry error on get_list_boards');
            } else {
                redirect(FOUR_O_FOUR);
            }
        }

        $res = $db->get_result();
        return $res;
    }

    public static function get_threads_in_board(string $board_link) : array
    {
        require_once P_MODELS . 'thread.php';
        $db = DataBase::getInstance();

        $ok = $db->safe_query(
            self::THREADS_IN_BOARD_QUERY,
            [$board_link],
            's'
        );

        if (!$ok) {
            // wrong board link probably
            if (DEBUG) {
                echo var_dump($db);
                die('querry error on get_threads_in_board');
            } else {
                redirect(FOUR_O_FOUR);
            }
        }

        $res = $db->get_result();
        return $res;
    }
}
<?php

class Thread
{

  const OP_QUERY = "SELECT id, title, author, comment, creation FROM thread WHERE id = ? LIMIT 1";
  const POSTS_QUERY = "SELECT id, author, comment, creation FROM post WHERE thread_id = ? ORDER BY creation";
  const ALL_THREADS = "SELECT id, title, author, comment, creation, last_rp, replies, pinned FROM thread ORDER BY pinned DESC,last_rp DESC";

  static public function get_op_in_thread(int $thread_id)
  {
    $db = DataBase::getInstance();

    $ok = $db->safe_query(
      self::OP_QUERY,
      [$thread_id],
      'i'
    );

    if (!$ok) {
      if (DEBUG) {
        echo var_dump($db);
        die('querry error on get_op_in_thread');
      } else {
        redirect(FOUR_O_FOUR);
      }
    }

    return $db->get_result();
  }

  static public function get_posts_in_thread(int $thread_id)
  {
    $db = DataBase::getInstance();

    $ok = $db->safe_query(
      self::POSTS_QUERY,
      [$thread_id],
      'i'
    );

    if (!$ok) {
      if (DEBUG) {
        echo var_dump($db);
        die('query error on get_posts_in_thread');
      } else {
        redirect(FOUR_O_FOUR);
      }
    }

    $posts = $db->get_result();
    return $posts;
  }

  static public function get_all_threads()
  {
    $db = DataBase::getInstance();

    $ok = $db->unsafe_query(self::ALL_THREADS);

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

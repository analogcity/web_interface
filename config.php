<?php
// GLOBALS
const DEBUG = true; // Change on production
const P_MODELS = 'models/';
const P_UTILS = 'utils/';
const P_CONTROLLERS = 'controllers/';

// DEFAULT CONTROLER AND ACTION
$action = 'render';
$controller = 'frontpage';

// MOST USED REQUIRES
require_once P_UTILS . 'input_utils.php';
require_once P_MODELS . 'controller.php';
require_once P_UTILS . 'database.php';

// REDIRECTIONS
const FOUR_O_FOUR = 'Location: /p=error';
const HOME = 'Location: /';

function redirect(string $location)
{
    header($location);
    DataBase::destroyInstance();
    die();
}

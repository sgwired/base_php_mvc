<?php

namespace App\Controllers;

use Core\View;

/**
 * Home controller
 *
 * PHP version 7
 */
class Home extends \Core\Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        // echo "(before) ";
        //return false;
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
        // echo " (after)";
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        // echo 'Hello from the index action in the Home controller!';
        // View::render('Home/index.php', ['name' => 'Shelton', 'colors' => ['blue', 'green', 'yellow']]);
        View::renderTemplate('Home/index.html', ['name' => 'Shelton', 'colors' => ['blue', 'green', 'yellow']]);
    }

    /**
     * Show the escape page
     *
     * @return void
     */
    public function escapeAction()
    {
        // echo 'Hello from the index action in the Home controller!';
        View::render('Home/escape.php');
    }
}

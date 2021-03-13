<?php

namespace App\Controllers;

use Core\View;
use \App\Models\User;

/**
 * Signup controller
 */
class Signup extends \Core\Controller
{
    /**
     * Show signup page
     * @return void
     */
    public function newAction()
    {
        View::renderTemplate('Signup/new.html');
    }

    /**
     * Signup a new user
     * @return void
     */
    public function createAction()
    {
        $user = new User($_POST);

        $user->save();

        View::renderTemplate('Signup/success.html');
    }
}

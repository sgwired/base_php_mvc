<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\User;
use \App\Auth;
use \App\Flash;

/**
 * Login controller
 */
class Login extends \Core\Controller
{
    /**
     * Show the login page
     * 
     * @return void
     * 
     */
    public function newAction()
    {
        View::renderTemplate('Login/new.html');
    }

    /**
     * Log in a user
     * 
     * @return void
     */
    public function createAction()
    {
        $user = User::authenticate($_POST['email'], $_POST['password']);

        if ($user) {

            Auth::login($user);

            Flash::addMessage('Login successful');

            $this->redirect(Auth::getRetunToPage());
        } else {

            Flash::addMessage('Login unsuccessful, please try again', FLASH::WARNING);

            View::renderTemplate('login/new.html', ['email' => $_POST['email'],]);
        }
    }

    /**
     * Log out a user
     */
    public function destroyAction()
    {

        Auth::logout();

        $this->redirect('/login/show-logout-message'); // starts a new session
    }

    /**
     * Show logged out flash message and rediret to home page. Necessary to use the flash messages
     * as they use the session which is destroyed with the logout method
     * so new action is need to create a new session
     * 
     * @return void
     */
    public function showLogoutMessageAction()
    {
        Flash::addMessage('Logout successful');

        $this->redirect('/');
    }
}

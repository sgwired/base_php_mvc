<?php

namespace App\Controllers;

use \Core\View;
use App\Auth;

/**
 * Items controller
 * 
 */
class Items extends \Core\Controller
{
    /**
     * Items indes
     * 
     * @return void
     */
    public function indexAction()
    {
        if (!Auth::isLoggedIn()) {
            $this->redirect('/login');
        }
        View::renderTemplate('Items/index.html');
    }
}

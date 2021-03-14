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
     * Require the use to be authenticated before giving access to all methods in the controller
     * 
     * @return void
     */
    protected function before()
    {
        $this->requireLogin();
    }

    /**
     * Items indes
     * 
     * @return void
     */
    public function indexAction()
    {

        View::renderTemplate('Items/index.html');
    }
}

<?php

namespace App;

/**
 * Flash notification messages: message for one tike display using the session
 * 
 * 
 */
class Flash
{
    /**
     * Add a message
     * 
     * @param string $message The message 
     * 
     * @return void
     */
    public static function addMessage($message)
    {
        if (!isset($_SESSION['flash_notifications'])) {
            $_SESSION['flash_notifications'] = [];
        }

        // Append message to the array
        $_SESSION['flash_notifications'][] = $message;
    }

    /**
     * Get the flash messages
     * 
     * @return mixed An array with all of the messages or null if not set
     */
    public static function getMessages()
    {
        if (isset($_SESSION['flash_notifications'])) {
            $messages = $_SESSION['flash_notifications'];
            unset($_SESSION['flash_notifications']);

            return $messages;
        }
    }
}

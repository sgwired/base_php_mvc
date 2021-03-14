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
     * Success message type*
     * 
     * @var string
     */
    const SUCCESS = 'success';

    /**
     * Info message type*
     * 
     * @var string
     */
    const INFO = 'info';

    /**
     * Warning message type*
     * 
     * @var string
     */
    const WARNING = 'warning';

    /**
     * Add a message
     * 
     * @param string $message The message 
     * 
     * @return void
     */
    public static function addMessage($message, $type = 'success')
    {
        if (!isset($_SESSION['flash_notifications'])) {
            $_SESSION['flash_notifications'] = [];
        }

        // Append message to the array
        $_SESSION['flash_notifications'][] = [
            'body' => $message,
            'type' => $type
        ];
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

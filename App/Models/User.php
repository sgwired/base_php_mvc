<?php

namespace App\Models;

use PDO;

/**
 * User model
 * 
 */
class User extends \Core\Model
{
    /**
     * Error message
     * @var array
     */
    public $errors = [];

    /**
     * @param array $data
     * @return void
     */
    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Save the user to the database
     * @return boolean true if saved flase otherwise
     */
    public function save()
    {
        $this->validate();

        if (empty($this->errors)) {

            $password_hash = password_hash($this->password, PASSWORD_DEFAULT);

            $sql = 'INSERT INTO users (name, email, password_hash)
                VALUES (:name, :email, :password_hash )';

            $db = static::getDB();
            $stmt = $db->prepare($sql);

            $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindValue(':password_hash', $password_hash, PDO::PARAM_STR);

            return $stmt->execute();
        }

        return false;
    }

    /**
     * Validate current property values adding validation msg to errors array
     * @return voin
     */
    public function validate()
    {
        // name
        if ($this->name == '') {
            $this->errors[] = 'Name is required';
        }

        // email
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
            $this->errors[] = 'Invalid email';
        }

        if (static::emailExists($this->email)) {
            $this->errors[] = 'Email already exists';
        }

        // Password
        if (strlen($this->password) < 6) {
            $this->errors[] = 'Please enter at least 6 characters for the password';
        }

        if (preg_match('/.*[a-z]+.*/i', $this->password) === 0) {
            $this->errors[] = 'Password needs at least one letter';
        }

        if (preg_match('/.*\d+.*/i', $this->password) === 0) {
            $this->errors[] = 'Password needs at least one number';
        }
    }

    /**
     * See if user already exists in db
     * @param string email address
     * @return boolean True if a record exists with that email, false if not
     * changed so it can be called from Account controller
     */
    public static function emailExists($email)
    {
        $sql = 'SELECT * FROM users WHERE email = :email';

        $db = static::getDB();

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch() !== false;
    }
}

<?php

    class User {

        private $user_name;
        private $buy_quantity;
        private $user_phone;
        private $user_email;
        private $activity_id;
        private $id;

        function __construct($user_name, $buy_quantity, $user_phone, $user_email, $activity_id, $id = null)
        {
            $this->user_name = $user_name;
            $this->buy_quantity = $buy_quantity;
            $this->user_phone = $user_phone;
            $this->user_email = $user_email;
            $this->activity_id = $activity_id;
            $this->$id = $id;
        }

        function setUserName($new_user_name)
        {
            $this->user_name = $new_user_name;
        }

        function getUserName()
        {
            return $this->user_name;
        }

        function save()
        {
            $user_name = $GLOBALS['DB']->exec("INSERT INTO user (user_name)
                        VALUES ('{$this->getUserName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM users;");
        }


    }

 ?>

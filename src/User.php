<?php

    class User {

        private $user_name;
        // private $user_buy_quantity;
        private $user_phone;
        private $user_email;
        // private $activity_id;
        private $id;

        function __construct($user_name, $user_phone, $user_email, $id = null)
        {
            $this->user_name = $user_name;
            // $this->user_buy_quantity = $user_buy_quantity;
            $this->user_phone = $user_phone;
            $this->user_email = $user_email;
            // $this->activity_id = $activity_id;
            $this->id = $id;
        }

        function setUserName($new_user_name)
        {
            $this->user_name = (string)$new_user_name;
        }

        function getUserName()
        {
            return $this->user_name;
        }

        // function setBuyQuantity($new_user_buy_quantity)
        // {
        //     $this->user_buy_quantity = (int)$new_user_buy_quantity;
        // }
        //
        // function getBuyQuantity()
        // {
        //     return $this->user_buy_quantity;
        // }

        function setUserPhone($new_user_phone)
        {
            $this->user_phone = (string)$new_user_phone;
        }

        function getUserPhone()
        {
            return $this->user_phone;
        }

        function setUserEmail($new_user_email)
        {
            $this->user_email = (string)$new_user_email;
        }

        function getUserEmail()
        {
            return $this->user_email;
        }

        // function setActivityId($new_activity_id)
        // {
        //     $this->activity_id = (string)$new_activity_id;
        // }
        //
        // function getActivityId()
        // {
        //     return $this->activity_id;
        // }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $user_name = $GLOBALS['DB']->exec("INSERT INTO users (user_name, user_phone, user_email) VALUES ('{$this->getUserName()}', '{$this->getUserPhone()}', '{$this->getUserEmail()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function update()
        {
            $GLOBALS['DB']->exec("UPDATE users SET user_name = '{$this->getUserName()}' WHERE id = {$this->getId()};");
        }

//not completely sure that the delete function is working
        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM users WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM activities_users WHERE user_id = {$this->getId()};");
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM users;");
        }

        static function getAll()
        {
            $returned_users = $GLOBALS['DB']->query("SELECT * FROM users;");
            $users = array();
            foreach ($returned_users as $user)
            {
                $user_name = $user['user_name'];
                // $user_buy_quantity = $user['user_buy_quantity'];
                $user_phone = $user['user_phone'];
                $user_email = $user['user_email'];
                // $activity_id = $user['activity_id'];
                $id = $user['id'];
                $new_user = new User ($user_name, $user_phone, $user_email, $id);
                array_push($users, $new_user);
            }
            return $users;
        }

        static function find($searchId)
        {
            $returned_users = User::getAll();
            foreach($returned_users as $user){
                if ($searchId == $user->getId()){
                    return $user;
                }
            }
        }

        function addActivity($activity)
        {
            $GLOBALS['DB']->exec("INSERT INTO activities_users (activity_id, user_id) VALUES ({$activity->getId()}, {$this->getId()});");
        }

//This join statement joins activities and users on the activities_users join table.
        function getActivities()
        {
            $query = $GLOBALS['DB']->query("SELECT activities.* FROM users
                            JOIN activities_users ON (users.id = activities_users.user_id)
                            JOIN activities ON (activities_users.activity_id = activities.id)
                            WHERE users.id = {$this->getId()};");

            $activities_array = array();
            foreach($query as $activity)
            {
                $activity_name = $activity['activity_name'];
                $activity_date = $activity['activity_date'];
                $activity_location = $activity['activity_location'];
                $activity_description = $activity['activity_description'];
                $activity_price = $activity['activity_price'];
                $activity_quantity = $activity['activity_quantity'];
                $business_id = $activity['business_id'];
                $id = $activity['id'];
                $new_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id);
                array_push($activities_array, $new_activity);
            }
            return $activities_array;
        }



    }

 ?>

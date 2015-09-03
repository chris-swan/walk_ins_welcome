<?php

Class Activity
    {
        private $activity_name;
        private $activity_date;
        private $activity_location;
        private $activity_description;
        private $activity_price;
        private $activity_quantity;
        private $business_id;
        private $activity_category_id;
        private $id;

        function __construct($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $activity_category_id, $id = null)
        {
            $this->activity_name = $activity_name;
            $this->activity_date = $activity_date;
            $this->activity_location = $activity_location;
            $this->activity_description = $activity_description;
            $this->activity_price = $activity_price;
            $this->activity_quantity = $activity_quantity;
            $this->business_id = $business_id;
            $this->activity_category_id = $activity_category_id;
            $this->id = $id;
        }

        //Set Method:
        function setActivityName($new_activity_name)
        {
            $this->activity_name = (string)$new_activity_name;
        }

        function setActivityDate($new_activity_date)
        {
            $this->activity_date = $new_activity_date;
        }

        function setActivityLocation($new_activity_location)
        {
            $this->activity_location = (string)$new_activity_location;
        }

        function setActivityDescription($new_activity_description)
        {
            $this->activity_description = (string)$new_activity_description;
        }

        function setActivityPrice($new_activity_price)
        {
            $this->activity_price = (string)$new_activity_price;
        }

        function setActivityQuantity($new_activity_quantity)
        {
            $this->activity_quantity = $new_activity_quantity;
        }

        function setBusinessId($new_business_id)
        {
            $this->business_id = $new_business_id;
        }

        function setActivityCategoryId($new_activity_category_id)
        {
            $this->activity_category_id = $new_activity_category_id;
        }

        //Get Methods

        function getActivityName()
        {
            return $this->activity_name;
        }

        function getActivityDate()
        {
            return $this->activity_date;
        }

        function getActivityLocation()
        {
            return $this->activity_location;
        }

        function getActivityDescription()
        {
            return $this->activity_description;
        }

        function getActivityPrice()
        {
            return $this->activity_price;
        }

        function getActivityQuantity()
        {
            return $this->activity_quantity;
        }

        function getBusinessId()
        {
            return $this->business_id;
        }

        function getActivityCategoryId()
        {
            return $this->activity_category_id;
        }

        function getId()
        {
            return $this->id;
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM activities WHERE id = {$this->getID()};");
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO activities (activity_name, activity_date, activity_location, activity_description, activity_price, activity_quantity, business_id, activity_category_id) VALUES ('{$this->getActivityName()}', '{$this->getActivityDate()}', '{$this->getActivityLocation()}', '{$this->getActivityDescription()}', '{$this->getActivityPrice()}', {$this->getActivityQuantity()}, {$this->getBusinessId()}, {$this->getActivityCategoryId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function update($new_activity_name)
        {
            $GLOBALS['DB']->exec("UPDATE activities SET activity_name = '{$new_activity_name}' WHERE id = {$this->getId()};");
            $this->setActivityName($new_activity_name);
        }

        static function getAll()
        {
            $returned_activities = $GLOBALS['DB']->query("SELECT * FROM activities;");
            $activities = array();

            foreach($returned_activities as $activity) {
                $activity_name = $activity['activity_name'];
                $activity_date = $activity['activity_date'];
                $activity_location = $activity['activity_location'];
                $activity_description = $activity['activity_description'];
                $activity_price = $activity['activity_price'];
                $activity_quantity = $activity['activity_quantity'];
                $business_id = $activity['business_id'];
                $activity_category_id = $activity['activity_category_id'];
                $id = $activity['id'];
                $new_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $activity_category_id, $id);
            array_push($activities, $new_activity);
            }
            return $activities;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM activities;");
        }
    //search function
        static function find($search_id)
        {
            $found_activity = NULL;
            $activities = Activity::getAll();
            foreach ($activities as $activity) {
                $activity_id = $activity->getId();
                if ($activity_id == $search_id) {
                    $found_activity = $activity;
                }
            }
            return $found_activity;
        }


        //Add and get category
        function addBusiness($business)
        {
            $GLOBALS['DB']->exec("INSERT INTO activities_businesses (activity_id, business_id) VALUES ({$this->getId()}, {$business->getId()});");
        }

        function getBusinesses()
        {
            $activity_id=$this->getId();
            $returned_businesses = $GLOBALS['DB']->query(
            "SELECT businesses.* FROM activities
            JOIN activities_businesses ON (activities.id = activities_businesses.activity_id)
            JOIN businesses ON (activities_businesses.business_id = businesses.id)
            WHERE activities.id = {$activity_id};");

            $businesses = array();
            foreach($returned_businesses as $business) {
                $business_name = $business['business_name'];
                $business_phone = $business['business_phone'];
                $business_contact = $business['business_contact'];
                $business_website = $business['business_website'];
                $business_address = $business['business_address'];
                $business_contact_email = $business['business_contact_email'];
                $id = $business['id'];
                $new_business = new Business($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $id);
                array_push($businesses, $new_business);
            }
            return $businesses;
        }


    }
?>

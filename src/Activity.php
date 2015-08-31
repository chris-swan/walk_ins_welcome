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
            $this->activity_name = (string)$activity_name;
        }

        function setActivityDate($new_activity_date)
        {
            $this->activity_date = $activity_date;
        }

        function setActivityLocation($new_activity_location)
        {
            $this->activity_location = (string)$activity_location;
        }

        function setActivityDescription($new_activity_description)
        {
            $this->activity_description = (string)$activity_description;
        }

        function setActivityPrice($new_activity_price)
        {
            $this->activity_price = (string)$activity_price;
        }

        function setActivityQuantity($new_activity_quantity)
        {
            $this->activity_quantity = $activity_quantity;
        }

        function setBusinessId($new_business_id)
        {
            $this->business_id = $business_id;
        }

        function setActivityCategoryId($new_activity_category_id)
        {
            $this->activity_category_id = $activity_category_id;
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

    }
?>
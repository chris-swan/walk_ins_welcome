<?php

    class Category
    {
        private $category_name;
        private $id;

        function __construct($category_name, $id = null)
        {
            $this->category_name = $category_name;
            $this->id = $id;
        }

        function setCategoryName($new_category_name)
        {
            $this->category_name = $new_category_name;
        }

        function getCategoryName()
        {
            return $this->category_name;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO categories (category_name) VALUES ('{$this->getCategoryName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function update()
        {
            $GLOBALS['DB']->exec("UPDATE categories SET category_name = '{$this->getCategoryName()}' WHERE id = {$this->getId()};");
        }

        //Unsure if delete function is written correctly.
        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM categories WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM activities_categories WHERE category_id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM businesses_categories WHERE category_id = {$this->getId()};");
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM categories;");
        }

        static function getAll()
        {
            $categories_returned = $GLOBALS['DB']->query("SELECT * FROM categories;");
            $categories = array();
            foreach($categories_returned as $category){
                $id = $category['id'];
                $category_name = $category['category_name'];
                $new_category = new Category($category_name, $id);
                array_push($categories, $new_category);
            }
            return $categories;
        }

        static function find($searchId)
        {
            $categories_returned = Category::getAll();
            foreach($categories_returned as $category){
               if ($searchId == $category->getId()){
                   return $category;
               }
            }
        }

        function addActivity($activity)
        {
            $GLOBALS['DB']->exec("INSERT INTO activities_categories (activity_id, category_id) VALUES ({$activity->getId()}, {$this->getId()});");
        }

        function addBusiness($business)
        {
            $GLOBALS['DB']->exec("INSERT INTO businesses_categories (business_id, category_id) VALUES ({$business->getId()}, {$this->getId()});");
        }


//This join statement joins activities and categories on the activities_categories join table.
        function getActivities()
        {
            $query = $GLOBALS['DB']->query("SELECT activities.* FROM categories
                            JOIN activities_categories ON (categories.id = activities_categories.category_id)
                            JOIN activities ON (activities_categories.activity_id = activities.id)
                            WHERE categories.id = {$this->getId()};");

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

        //This join statement joins businesses and categories on the businesses_categories join table.
        function getBusinesses()
        {
            $query = $GLOBALS['DB']->query("SELECT businesses.* FROM categories
                            JOIN businesses_categories ON (categories.id = businesses_categories.category_id)
                            JOIN businesses ON (businesses_categories.business_id = businesses.id)
                            WHERE categories.id = {$this->getId()};");

            $businesses_array = array();
            foreach($query as $business)
            {
                $business_name = $business['business_name'];
                $business_phone = $business['business_phone'];
                $business_contact = $business['business_contact'];
                $business_website = $business['business_website'];
                $business_address = $business['business_address'];
                $business_contact_email = $business['business_contact_email'];
                $id = $business['id'];
                $new_business = new Business($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $id);
                array_push($businesses_array, $new_business);
            }
            return $businesses_array;
        }
    }

?>

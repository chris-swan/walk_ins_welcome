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

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM categories WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM activities_categories WHERE category_id = {$this->getId()};");
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
                $activity_category_id = $activity['activity_category_id'];
                $id = $activity['id'];
                $new_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $activity_category_id, $id);
                array_push($activities_array, $new_activity);
            }
            return $activities_array;
        }

    }


?>

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

        function deleteOne()
        {
            $GLOBALS['DB']->exec("DELETE FROM categories WHERE id = {$this->getId()};");
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

    }


?>

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

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM categories;");
        }



    }


?>

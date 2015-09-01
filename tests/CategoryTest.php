<?php
    /**
    *@backupGlobals disabled
    *@backupStaticAttributes disabled
    */

    require_once "src/user.php";
    require_once "src/category.php";

    $server = 'mysql:host=localhost;dbname=walk_in_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);
    class CategoryTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            User::deleteAll();
            Category::deleteAll();
        }

        function testSetCategoryName()
        {
            $category_name = "music";
            $new_category = new Category($category_name);

            $new_category->setCategoryName("concerts");
            $result = $new_category->getCategoryName();

            $this->assertEquals("concerts", $result);
        }

        function testGetCategoryName()
        {
            $category_name = "music";
            $new_category = new Category($category_name);

            $result = $new_category->getCategoryName();

            $this->assertEquals("music", $result);
        }

        function testGetId()
        {
            $category_name = "music";
            $id = 1;
            $new_category = new Category($category_name);

            $result = $new_category->getId();

            $this->assertEquals(1, $result);
        }

        function testSave()
        {

        }

        function testDeleteAll()
        {

        }


    }
?>

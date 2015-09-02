<?php
    /**
    *@backupGlobals disabled
    *@backupStaticAttributes disabled
    */

    require_once 'src/Business.php';
    require_once 'src/Category.php';
    require_once 'src/User.php';
    require_once 'src/Activity.php';

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
            $new_category = new Category($category_name, $id);

            $result = $new_category->getId();

            $this->assertEquals(1, $result);
        }

        function testGetAll()
        {
            $category_name = "music";
            $new_category = new Category($category_name);
            $new_category->save();

            $category_name2 = "arts";
            $new_category2 = new Category($category_name);
            $new_category2->save();

            $result = Category::getAll();

            $this->assertEquals([$new_category, $new_category2], $result);
        }

        function testSave()
        {
            $category_name = "music";
            $new_category = new Category($category_name);

            $new_category->save();
            $result = Category::getAll();

            $this->assertEquals($new_category, $result[0]);
        }

        function testDeleteAll()
        {
            $category_name = "music";
            $new_category = new Category($category_name);
            $new_category->save();

            $category_name2 = "arts";
            $new_category2 = new Category($category_name);
            $new_category2->save();

            Category::deleteAll();
            $result = Category::GetAll();

            $this->assertEquals([], $result);
        }

        function testDelete()
        {
            $category_name = "music";
            $new_category = new Category($category_name);
            $new_category->save();

            $activity_name = "Activity One";
            $activity_date = '2016-01-01';
            $activity_location = "Location";
            $activity_description = "Description of Activity One";
            $activity_price = "Price of Activity One";
            $activity_quantity = 10;
            $business_id = 1;
            $activity_category_id = 2;
            $id = 1;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $activity_category_id, $id);
            $test_activity->save();

            $new_category->addActivity($new_category);
            $new_category->delete();

            $this->assertEquals([], $new_category->getActivities());
        }


        function testUpdate()
        {
            $category_name = "music";
            $new_category = new Category($category_name);
            $new_category->save();
            $new_category->setCategoryName("concerts");
            $new_category->update();

            $result = Category::getAll();

            $this->assertEquals($new_category, $result[0]);
        }

        function testFind()
        {
            $category_name = "music";
            $new_category = new Category($category_name);
            $new_category->save();

            $category_name2 = "arts";
            $new_category2 = new Category($category_name);
            $new_category2->save();

            $result = Category::find($new_category->getId());

            $this->assertEquals($new_category, $result);

        }

        function testAddActivity()
        {
            $category_name = "music";
            $new_category = new Category($category_name);
            $new_category->save();

            $activity_name = "Activity One";
            $activity_date = '2016-01-01';
            $activity_location = "Location";
            $activity_description = "Description of Activity One";
            $activity_price = "Price of Activity One";
            $activity_quantity = 10;
            $business_id = 1;
            $activity_category_id = 2;
            $id = 1;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $activity_category_id, $id);
            $test_activity->save();

            $new_category->addActivity($test_activity);
            $result = $new_category->getActivities();

            $this->assertEquals($test_activity, $result[0]);
        }

        function testGetActivity()
        {
            $activity_name = "Activity One";
            $activity_date = '2016-01-01';
            $activity_location = "Location";
            $activity_description = "Description of Activity One";
            $activity_price = "Price of Activity One";
            $activity_quantity = 10;
            $business_id = 1;
            $activity_category_id = 2;
            $id = 1;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $activity_category_id, $id);
            $test_activity->save();

            $activity_name2 = "Activity Two";
            $activity_date2 = '2016-02-02';
            $activity_location2 = "Location Two";
            $activity_description2 = "Description of Activity Two";
            $activity_price2 = "Price of Activity Two";
            $activity_quantity2 = 20;
            $business_id2 = 21;
            $activity_category_id2 = 22;
            $id2 = 2;
            $test_activity2 = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $activity_category_id, $id);
            $test_activity2->save();

            $category_name = "music";
            $new_category = new Category($category_name);
            $new_category->save();

            $new_category->addActivity($test_activity);
            $new_category->addActivity($test_activity2);

            $result = $new_category->getActivities();

            $this->assertEquals([$test_activity, $test_activity2], $result);
        }

    }
?>

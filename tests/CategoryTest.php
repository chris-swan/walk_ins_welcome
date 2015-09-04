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

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM categories WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM activities_categories WHERE category_id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM businesses_categories WHERE category_id = {$this->getId()};");
        }

//This test is supposed to be testing the delete function on the activities_categories join table. We're not sure if it's properly doing that. It's not testing the delete function on the businesses_categories join table.
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
            $id = 1;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id);
            $test_activity->save();

            $new_category->addActivity($test_activity);
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
            $id = 1;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id,  $id);
            $test_activity->save();

            $new_category->addActivity($test_activity);
            $result = $new_category->getActivities();

            $this->assertEquals($test_activity, $result[0]);
        }

        function testGetActivities()
        {
            $activity_name = "Activity One";
            $activity_date = '2016-01-01';
            $activity_location = "Location";
            $activity_description = "Description of Activity One";
            $activity_price = "Price of Activity One";
            $activity_quantity = 10;
            $business_id = 1;
            $id = 1;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id,  $id);
            $test_activity->save();

            $activity_name2 = "Activity Two";
            $activity_date2 = '2016-02-02';
            $activity_location2 = "Location Two";
            $activity_description2 = "Description of Activity Two";
            $activity_price2 = "Price of Activity Two";
            $activity_quantity2 = 20;
            $business_id2 = 21;
            $id2 = 2;
            $test_activity2 = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id);
            $test_activity2->save();

            $category_name = "music";
            $new_category = new Category($category_name);
            $new_category->save();

            $new_category->addActivity($test_activity);
            $new_category->addActivity($test_activity2);

            $result = $new_category->getActivities();

            $this->assertEquals([$test_activity, $test_activity2], $result);
        }

        function testAddBusiness()
        {
            $business_name="IBM";
            $business_phone= "5033133131";
            $business_contact = "john";
            $business_website = "walkins.com";
            $business_address ="123 fake st";
            $business_contact_email = "me@fakeemail.com";
            $id= 1;
            $test_business = new Business ($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $id);
            $test_business->save();

            $category_name = "music";
            $new_category = new Category($category_name);
            $new_category->save();

            $new_category->addBusiness($test_business);
            $result = $new_category->getBusinesses();

            $this->assertEquals($test_business, $result[0]);
        }

        function testGetBusinesses()
        {
            $business_name="IBM";
            $business_phone= "5033133131";
            $business_contact = "john";
            $business_website = "walkins.com";
            $business_address ="123 fake st";
            $business_contact_email = "me@fakeemail.com";
            $id= 1;
            $test_business = new Business ($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $id);
            $test_business->save();

            $business_name2="Smoke Signals";
            $business_phone2= "5033139999";
            $business_contact2 = "Theo";
            $business_website2 = "Signal.com";
            $business_address2 ="123 getreal st";
            $business_contact_email2 = "me@realemail.com";
            $id2 = 2;
            $test_business2 = new Business($business_name2, $business_phone2, $business_contact2, $business_website2, $business_address2, $business_contact_email2, $id2);
            $test_business2->save();

            $category_name = "music";
            $new_category = new Category($category_name);
            $new_category->save();

            $new_category->addBusiness($test_business);
            $new_category->addBusiness($test_business2);

            $result = $new_category->getBusinesses();

            $this->assertEquals([$test_business, $test_business2], $result);
        }

    }
?>

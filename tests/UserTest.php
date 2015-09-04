<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Business.php';
    require_once 'src/Category.php';
    require_once 'src/User.php';
    require_once 'src/Activity.php';


    $server = 'mysql:host=localhost;dbname=walk_in_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class UserTest extends PHPUnit_Framework_TestCase {

        protected function tearDown() {
            User::deleteAll();
            Activity::deleteAll();
        }

        function testGetUserName()
        {
            $user_name = "Wolf";
            // $user_buy_quantity = 5;
            $user_phone = '1234567890';
            $user_email = "howl@yellowstone.com";
            // $activity_id = 100;
            $id = 1;
            $test_user = new User($user_name, $user_phone, $user_email, $id);
            $test_user->save();

            $result = $test_user->getUserName();

            $this->assertEquals($result, $user_name);
        }

        function testSetUserName()
        {
            $user_name = "Wolf";
            // $user_buy_quantity = 5;
            $user_phone = '1234567890';
            $user_email = "howl@yellowstone.com";
            // $activity_id = 100;
            $id = 1;
            $test_user = new User($user_name, $user_phone, $user_email, $id);
            $test_user->save();

            $test_user->setUserName("WolfMan");
            $result = $test_user->getUserName();

            $this->assertEquals("WolfMan", $result);
        }

        // function testGetBuyQuantity()
        // {
        //     $user_name = "Wolf";
        //     // $user_buy_quantity = 5;
        //     $user_phone = '1234567890';
        //     $user_email = "howl@yellowstone.com";
        //     $activity_id = 100;
        //     $id = 1;
        //     $test_user = new User($user_name, $user_buy_quantity, $user_phone, $user_email, $activity_id, $id);
        //     $test_user->save();
        //
        //     $result = $test_user->getBuyQuantity();
        //
        //     $this->assertEquals($result, $user_buy_quantity);
        // }

        // function testSetBuyQuantity()
        // {
        //     $user_name = "Wolf";
        //     // $user_buy_quantity = 5;
        //     $user_phone = '1234567890';
        //     $user_email = "howl@yellowstone.com";
        //     $activity_id = 100;
        //     $id = 1;
        //     $test_user = new User($user_name, $user_phone, $user_email, $activity_id, $id);
        //     $test_user->save();
        //
        //     $test_user->setBuyQuantity(6);
        //     $result = $test_user->getBuyQuantity();
        //
        //     $this->assertEquals(6, $result);
        // }

        function testGetUserPhone()
        {
            $user_name = "Wolf";
            // $user_buy_quantity = 5;
            $user_phone = '1234567890';
            $user_email = "howl@yellowstone.com";
            // $activity_id = 100;
            $id = 1;
            $test_user = new User($user_name, $user_phone, $user_email, $id);
            $test_user->save();

            $result = $test_user->getUserPhone();

            $this->assertEquals($result, $user_phone);
        }

        function testSetUserPhone()
        {
            $user_name = "Wolf";
            // $user_buy_quantity = 5;
            $user_phone = '1234567890';
            $user_email = "howl@yellowstone.com";
            // $activity_id = 100;
            $id = 1;
            $test_user = new User($user_name, $user_phone, $user_email, $id);
            $test_user->save();

            $test_user->setUserPhone('1234567000');
            $result = $test_user->getUserPhone();

            $this->assertEquals('1234567000', $result);
        }

        function testGetUserEmail()
        {
            $user_name = "Wolf";
            // $user_buy_quantity = 5;
            $user_phone = '1234567890';
            $user_email = "howl@yellowstone.com";
            // $activity_id = 100;
            $id = 1;
            $test_user = new User($user_name, $user_phone, $user_email, $id);
            $test_user->save();

            $result = $test_user->getUserEmail();

            $this->assertEquals($result, $user_email);
        }

        function testSetUserEmail()
        {
            $user_name = "Wolf";
            // $user_buy_quantity = 5;
            $user_phone = '1234567890';
            $user_email = "howl@yellowstone.com";
            // $activity_id = 100;
            $id = 1;
            $test_user = new User($user_name, $user_phone, $user_email, $id);
            $test_user->save();

            $test_user->setUserEmail("bloodmoon@yellowstone.com");
            $result = $test_user->getUserEmail();

            $this->assertEquals("bloodmoon@yellowstone.com", $result);
        }
        //
        // function testGetActivityId()
        // {
        //     $user_name = "Wolf";
        //     // $user_buy_quantity = 5;
        //     $user_phone = '1234567890';
        //     $user_email = "howl@yellowstone.com";
        //     // $activity_id = 100;
        //     $id = 1;
        //     $test_user = new User($user_name, $user_phone, $user_email, $id);
        //     $test_user->save();
        //
        //     $result = $test_user->getActivityId();
        //
        //     $this->assertEquals($result, $activity_id);
        // }
        //
        // function testSetActivityId()
        // {
        //     $user_name = "Wolf";
        //     // $user_buy_quantity = 5;
        //     $user_phone = '1234567890';
        //     $user_email = "howl@yellowstone.com";
        //     $activity_id = 100;
        //     $id = 1;
        //     $test_user = new User($user_name, $user_phone, $user_email, $activity_id, $id);
        //     $test_user->save();
        //
        //     $test_user->setActivityId(200);
        //     $result = $test_user->getActivityId();
        //
        //     $this->assertEquals(200, $result);
        // }

        function testGetId()
        {
            $user_name = "Wolf";
            // $user_buy_quantity = 5;
            $user_phone = '1234567890';
            $user_email = "howl@yellowstone.com";
            // $activity_id = 100;
            $id = 1;
            $test_user = new User($user_name, $user_phone, $user_email, $id);
            $test_user->save();

            $result = $test_user->getId();

            $this->assertEquals(true, is_numeric($result));
        }

        function testDeleteAll()
        {
            $user_name = "Wolf";
            // $user_buy_quantity = 5;
            $user_phone = '1234567890';
            $user_email = "howl@yellowstone.com";
            // $activity_id = 100;
            $id = 1;
            $test_user = new User($user_name, $user_phone, $user_email, $id);
            $test_user->save();

            $user_name2 = "WolfMan";
            $id2 = 2;
            $test_user2 = new User($user_name2, $user_phone, $user_email, $id2);
            $test_user2->save();

            User::deleteAll();
            $result = User::GetAll();

            $this->assertEquals([], $result);
        }

        function testGetAll()
        {
            $user_name = "Wolf";
            // $user_buy_quantity = 5;
            $user_phone = '1234567890';
            $user_email = "howl@yellowstone.com";
            // $activity_id = 100;
            $id = 1;
            $test_user = new User($user_name, $user_phone, $user_email, $id);
            $test_user->save();

            $user_name2 = "WolfMan";
            $id2 = 2;
            $test_user2 = new User($user_name2, $user_phone, $user_email, $id2);
            $test_user2->save();

            $result = User::getAll();

            $this->assertEquals([$test_user, $test_user2], $result);
        }

        function testUpdate()
        {
            $user_name = "Wolf";
            // $user_buy_quantity = 5;
            $user_phone = '1234567890';
            $user_email = "howl@yellowstone.com";
            // $activity_id = 100;
            $id = 1;
            $test_user = new User($user_name, $user_phone, $user_email, $id);
            $test_user->save();

            $test_user->setUserName("Wolfy");
            $test_user->update();

            $result = User::getAll();

            $this->assertEquals($test_user, $result[0]);
        }

        function testSave()
        {
            $user_name = "Wolf";
            // $user_buy_quantity = 5;
            $user_phone = '1234567890';
            $user_email = "howl@yellowstone.com";
            // $activity_id = 100;
            $id = 1;
            $test_user = new User($user_name, $user_phone, $user_email, $id);
            $test_user->save();

            $result = User::getAll();

            $this->assertEquals($test_user, $result[0]);
        }

        //This test is supposed to be testing the delete function on the activities_user join table. We're not sure if it's properly doing that.
        function testDelete()
        {
            $user_name = "Wolf";
            // $user_buy_quantity = 5;
            $user_phone = '1234567890';
            $user_email = "howl@yellowstone.com";
            // $activity_id = 100;
            $id = 1;
            $test_user = new User($user_name, $user_phone, $user_email, $id);
            $test_user->save();

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

            $test_user->addActivity($test_user);
            $test_user->delete();

            $this->assertEquals([], $test_user->getActivities());
        }

        function testFind()
        {
            $user_name = "Wolf";
            // $user_buy_quantity = 5;
            $user_phone = '1234567890';
            $user_email = "howl@yellowstone.com";
            // $activity_id = 100;
            $id = 1;
            $test_user = new User($user_name, $user_phone, $user_email, $id);
            $test_user->save();

            $user_name2 = "WolfMan";
            $id2 = 2;
            $test_user2 = new User($user_name2, $user_phone, $user_email, $id2);
            $test_user2->save();

            $result = User::find($test_user->getId());

            $this->assertEquals($test_user, $result);
        }

        function testAddActivity()
        {
            $user_name = "Wolf";
            // $user_buy_quantity = 5;
            $user_phone = '1234567890';
            $user_email = "howl@yellowstone.com";
            // $activity_id = 100;
            $id = 1;
            $test_user = new User($user_name, $user_phone, $user_email, $id);
            $test_user->save();

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

            $test_user->addActivity($test_activity);
            $result = $test_user->getActivities();

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
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id);
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

            $user_name = "Wolf";
            // $user_buy_quantity = 5;
            $user_phone = '1234567890';
            $user_email = "howl@yellowstone.com";
            // $activity_id = 100;
            $id = 1;
            $test_user = new User($user_name, $user_phone, $user_email, $id);
            $test_user->save();

            $test_user->addActivity($test_activity);
            $test_user->addActivity($test_activity2);

            $result = $test_user->getActivities();

            $this->assertEquals([$test_activity, $test_activity2], $result);
        }


    }

?>

<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Activity.php";

    $server = 'mysql:host=localhost;dbname=walk_in_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ActivityTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Activity::deleteAll();
        // }

        function testGetActivityName()
        {
            //Arrange
            $activity_name = "Activity One";
            $activity_date = 2016-01-01;
            $activity_location = "Location";
            $activity_description = "Description of Activity One";
            $activity_price = "Price of Activity One";
            $activity_quantity = 10;
            $business_id = 1;
            $activity_category_id = 2;
            $id = 3;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $activity_category_id, $id = null);

            //Act
            $result = $test_activity->getActivityName();

            //Assert
            $this->assertEquals($activity_name, $result);

        }

        // $activity_name;
        // $activity_date;
        // $activity_location;
        // $activity_description;
        // $activity_price;
        // $activity_quantity;
        // $business_id;
        // $activity_category_id;
        // $id;

    }


?>

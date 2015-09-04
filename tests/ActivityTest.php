    <?php

        /**
        * @backupGlobals disabled
        * @backupStaticAttributes disabled
        */

        require_once "src/Activity.php";
        require_once "src/Business.php";

        $server = 'mysql:host=localhost;dbname=walk_in_test';
        $username = 'root';
        $password = 'root';
        $DB = new PDO($server, $username, $password);

    class ActivityTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Activity::deleteAll();
            Business::deleteAll();
        }

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
            $id = 3;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id = null);

            //Act
            $result = $test_activity->getActivityName();

            //Assert
            $this->assertEquals($activity_name, $result);
        }

        function testGetActivityDate()
        {
            //Arrange
            $activity_name = "Activity One";
            $activity_date = 2016-01-01;
            $activity_location = "Location";
            $activity_description = "Description of Activity One";
            $activity_price = "Price of Activity One";
            $activity_quantity = 10;
            $business_id = 1;
            $id = 3;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id = null);

            //Act
            $result = $test_activity->getActivityDate();

            //Assert
            $this->assertEquals($activity_date, $result);
        }

        function testGetActivityLocation()
        {
            //Arrange
            $activity_name = "Activity One";
            $activity_date = 2016-01-01;
            $activity_location = "Location";
            $activity_description = "Description of Activity One";
            $activity_price = "Price of Activity One";
            $activity_quantity = 10;
            $business_id = 1;
            $id = 3;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id = null);

            //Act
            $result = $test_activity->getActivityLocation();

            //Assert
            $this->assertEquals($activity_location, $result);
        }

        function testGetActivityDescription()
        {
            //Arrange
            $activity_name = "Activity One";
            $activity_date = 2016-01-01;
            $activity_location = "Location";
            $activity_description = "Description of Activity One";
            $activity_price = "Price of Activity One";
            $activity_quantity = 10;
            $business_id = 1;
            $id = 3;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id = null);

            //Act
            $result = $test_activity->getActivityDescription();

            //Assert
            $this->assertEquals($activity_description, $result);
        }

        function testGetActivityPrice()
        {
            //Arrange
            $activity_name = "Activity One";
            $activity_date = 2016-01-01;
            $activity_location = "Location";
            $activity_description = "Description of Activity One";
            $activity_price = "$15.95";
            $activity_quantity = 10;
            $business_id = 1;
            $id = 3;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id = null);

            //Act
            $result = $test_activity->getActivityPrice();

            //Assert
            $this->assertEquals($activity_price, $result);
        }

        function testGetActivityQuantity()
        {
            //Arrange
            $activity_name = "Activity One";
            $activity_date = 2016-01-01;
            $activity_location = "Location";
            $activity_description = "Description of Activity One";
            $activity_price = "Price of Activity One";
            $activity_quantity = 10;
            $business_id = 1;
            $id = 3;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id = null);

            //Act
            $result = $test_activity->getActivityQuantity();

            //Assert
            $this->assertEquals($activity_quantity, $result);
        }

        function testGetBusinessId()
        {
            //Arrange
            $activity_name = "Activity One";
            $activity_date = 2016-01-01;
            $activity_location = "Location";
            $activity_description = "Description of Activity One";
            $activity_price = "Price of Activity One";
            $activity_quantity = 10;
            $business_id = 1;
            $id = 3;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id = null);

            //Act
            $result = $test_activity->getBusinessId();

            //Assert
            $this->assertEquals($business_id, $result);
        }


        function testGetId()
        {
            //Arrange
            $activity_name = "Activity One";
            $activity_date = 2016-01-01;
            $activity_location = "Location";
            $activity_description = "Description of Activity One";
            $activity_price = "Price of Activity One";
            $activity_quantity = 10;
            $business_id = 1;
            $id = 3;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id = null);

            //Act
            $result = $test_activity->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function testSave()
        {
            //Arrange
            $activity_name = "Activity One";
            $activity_date = '2016-01-01';
            $activity_location = "Location";
            $activity_description = "Description of Activity One";
            $activity_price = "Price of Activity One";
            $activity_quantity = 10;
            $business_id = 1;
            $id = 1;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id = null);

            //Act
            $test_activity->save();


            //Assert
            $result = Activity::getAll();
            $this->assertEquals($test_activity, $result[0]);
            var_dump($result);
        }

        function testGetAll()
        {
            //Arrange
            $activity_name = "Activity One";
            $activity_date = '2016-01-01';
            $activity_location = "Location";
            $activity_description = "Description of Activity One";
            $activity_price = "Price of Activity One";
            $activity_quantity = 10;
            $business_id = 11;
            $id = 1;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id = null);
            $test_activity->save();

            $activity_name2 = "Activity Two";
            $activity_date2 = '2016-02-02';
            $activity_location2 = "Location Two";
            $activity_description2 = "Description of Activity Two";
            $activity_price2 = "Price of Activity Two";
            $activity_quantity2 = 20;
            $business_id2 = 21;
            $id2 = 2;
            $test_activity2 = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id = null);
            $test_activity2->save();

            //Act
            $result = Activity::getAll();

            //Assert
            $this->assertEquals($test_activity, $result[0]);
        }

        function testDeleteAll()
        {
            //Arrange
            $activity_name = "Activity One";
            $activity_date = '2016-01-01';
            $activity_location = "Location";
            $activity_description = "Description of Activity One";
            $activity_price = "Price of Activity One";
            $activity_quantity = 10;
            $business_id = 11;
            $id = 1;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id = null);
            $test_activity->save();

            $activity_name2 = "Activity Two";
            $activity_date2 = '2016-02-02';
            $activity_location2 = "Location Two";
            $activity_description2 = "Description of Activity Two";
            $activity_price2 = "Price of Activity Two";
            $activity_quantity2 = 20;
            $business_id2 = 21;
            $id2 = 2;
            $test_activity2 = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id = null);
            $test_activity2->save();

            //Act
            Activity::deleteAll();
            $result = Activity::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function testDelete()
        {
            //Arrange
            $activity_name = "Activity One";
            $activity_date = '2016-01-01';
            $activity_location = "Location";
            $activity_description = "Description of Activity One";
            $activity_price = "Price of Activity One";
            $activity_quantity = 10;
            $business_id = 11;
            $id = 1;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id = null);
            $test_activity->save();

            $activity_name2 = "Activity Two";
            $activity_date2 = '2016-02-02';
            $activity_location2 = "Location Two";
            $activity_description2 = "Description of Activity Two";
            $activity_price2 = "Price of Activity Two";
            $activity_quantity2 = 20;
            $business_id2 = 21;
            $id2 = 2;
            $test_activity2 = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id = null);
            $test_activity2->save();

            //Act
            $test_activity2->delete();
            $result = Activity::getAll();

            //Assert
            $this->assertEquals([$test_activity], $result);
        }

        function testUpdate()
        {
            //Arrange
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

            $new_activity_name = "Activity Two";

            //Act
            $test_activity->update($new_activity_name);

            //Assert
            $this->assertEquals("Activity Two", $test_activity->getActivityName());
        }

        function testFind()
        {
            //Arrange
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
            $test_activity2 = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id = null);
            $test_activity2->save();

            //Act
            $result = Activity::find($test_activity->getId());

            //Assert
            $this->assertEquals($test_activity, $result);
        }

        function testGetBusinesses()
        {
            //Arrange
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

            $business_name="IBM";
            $business_phone= "5033133131";
            $business_contact = "john";
            $business_website = "walkins.com";
            $business_address ="123 fake st";
            $business_contact_email = "me@fakeemail.com";
            $business_category_id= 14;
            $id= 1;
            $test_business = new Business ($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $id);
            $test_business->save();

            $business_name2="Smoke Signals";
            $business_phone2= "5033139999";
            $business_contact2 = "Theo";
            $business_website2 = "Signal.com";
            $business_address2 ="123 getreal st";
            $business_contact_email2 = "me@realemail.com";
            $business_category_id2= 2;
            $id2= 2;
            $test_business2 = new Business($business_name2, $business_phone2, $business_contact2, $business_website2, $business_address2, $business_contact_email2, $business_category_id2, $id2);
            $test_business2->save();


            //Act
            $test_activity->addBusiness($test_business);
            $test_activity->addBusiness($test_business2);
            $result = $test_activity->getBusinesses();

            //Assert
            $this->assertEquals([$test_business, $test_business2], $result);
        }


        function testAddBusiness()
        {
            //Arrange
            $activity_name = "Activity One";
            $activity_date = '2016-01-01';
            $activity_location = "Location";
            $activity_description = "Description of Activity One";
            $activity_price = "Price of Activity One";
            $activity_quantity = 10;
            $business_id = 11;
            $id = 1;
            $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id = null);
            $test_activity->save();

            $business_name="IBM";
            $business_phone= "5033133131";
            $business_contact = "john";
            $business_website = "walkins.com";
            $business_address ="123 fake st";
            $business_contact_email = "me@fakeemail.com";
            $business_category_id= 14;
            $id= 1;
            $test_business = new Business($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $id);
            $test_business->save();

            //Act
            $test_activity->addBusiness($test_business);

            //Assert
            $this->assertEquals([$test_business], $test_activity->getBusinesses());
        }

        function testQuantityRemaining()
        {
          //Arrange
          $activity_name = "Activity One";
          $activity_date = '2016-01-01';
          $activity_location = "Location";
          $activity_description = "Description of Activity One";
          $activity_price = "Price of Activity One";
          $activity_quantity = 10;
          $business_id = 11;
          $id = 1;
          $test_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $id = null);
          $test_activity->save();

          $user_purchase = 3;

          //Act
          $result = $test_activity->quantityRemaining($user_purchase);
          var_dump($result);

          //Assert
          $this->assertEquals(7, $result);
        }


    }

    ?>

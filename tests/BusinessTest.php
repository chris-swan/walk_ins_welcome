<?php
    /**
   * @backupGlobals disabled
   * @backupStaticAttributes disabled
   */
   //All tests passed

   require_once 'src/Business.php';
   // require_once 'src/Category.php';
   // require_once 'src/User.php';
   // require_once 'src/Activity.php';

   // $server = 'mysql:host=localhost;dbname=walk_in_test';
   // $username = 'root';
   // $password = 'root';
   // $DB = new PDO($server, $username, $password);


   class BusinessTest extends PHPUnit_Framework_TestCase
   {
    //    protected function tearDown()
    //    {
    //        Business::deleteAll();
    //        Category::deleteAll();
    //        User::deleteAll();
    //        Activity::deleteAll();
    //    }

        function testGetBusinessName()
        {
            //Arrange
            $business_name ="IBM";
            $business_phone = 5033133131;
            $business_contact = "john";
            $business_website = "walkins.com";
            $business_address ="123 fake st";
            $business_contact_email = "me@fake.email";
            $business_category_id = 4;
            $business_login = "username1";
            $business_password= "chocolate";
            $id =3;
            $test_business = new Business ($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $business_login, $business_password, $id=null);

            //Act
            $result = $test_business->getBusinessName();

            //Assert
            $this->assertEquals ($business_name, $result);

        }

        function testSetBusinessName()
        {
            //Arrange
            $business_name="IBM";
            $business_phone= 5033133131;
            $business_contact = "john";
            $business_website = "walkins.com";
            $business_address ="123 fake st";
            $business_contact_email = "me@fake.email";
            $business_category_id= 4;
            $id= 5;
            $test_business = new Business ($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $id = null);


            //Act
            $test_business->setBusinessName("IBM");
            $result = $test_business->getBusinessName();

            //Assert
            $this->assertEquals ("IBM", $result);
        }


        function testGetBusinessPhone()
        {
          //Arrange
          $business_name="IBM";
          $business_phone= 5033133131;
          $business_contact = "john";
          $business_website = "walkins.com";
          $business_address ="123 fake st";
          $business_contact_email = "me@fake.email";
          $business_category_id= 4;
          $id= 5;
          $test_business = new Business ($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $id = null);


          //Act

          $result = $test_business->getBusinessPhone();

          //Assert
          $this->assertEquals (5033133131, $result);

        }


        function testSetBusinessPhone()
        {
            //Arrange
            $business_name="IBM";
            $business_phone= 5033133131;
            $business_contact = "john";
            $business_website = "walkins.com";
            $business_address ="123 fake st";
            $business_contact_email = "me@fake.email";
            $business_category_id= 4;
            $id= 5;
            $test_business = new Business($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $id = null);

            //Act
            $test_business->setBusinessPhone(5033133131);
            $result = $test_business->getBusinessPhone();


            //Assert
            $this->assertEquals (5033133131, $result);
        }


        function testGetBusinessContact()
        {
          //Arrange
          $business_name="IBM";
          $business_phone= 5033133131;
          $business_contact = "john";
          $business_website = "walkins.com";
          $business_address ="123 fake st";
          $business_contact_email = "me@fake.email";
          $business_category_id= 4;
          $id= 5;
          $test_business = new Business ($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $id = null);


          //Act

          $result = $test_business->getBusinessContact();

          //Assert
          $this->assertEquals ("john", $result);
        }
        function testSetBusinessContact()
        {
          //Arrange
          $business_name="IBM";
          $business_phone= 5033133131;
          $business_contact = "john";
          $business_website = "walkins.com";
          $business_address ="123 fake st";
          $business_contact_email = "me@fake.email";
          $business_category_id= 4;
          $id= 5;
          $test_business = new Business ($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $id = null);


          //Act
          $test_business->setBusinessContact("john");
          $result = $test_business->getBusinessContact();

          //Assert
          $this->assertEquals ("john", $result);
        }


        function testGetBusinessWebsite()
        {
            //Arrange
            $business_name="IBM";
            $business_phone= 5033133131;
            $business_contact = "john";
            $business_website = "walkins.com";
            $business_address ="123 fake st";
            $business_contact_email = "me@fake.email";
            $business_category_id= 4;
            $id= 5;
            $test_business = new Business ($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $id = null);

            //Act
            $result = $test_business->getBusinessWebsite();

            //Assert
            $this->assertEquals ("walkins.com", $result);
        }

        function testSetBusinessWebsite()
        {

            //Arrange
            $business_name="IBM";
            $business_phone= 5033133131;
            $business_contact = "john";
            $business_website = "walkins.com";
            $business_address ="123 fake st";
            $business_contact_email = "me@fake.email";
            $business_category_id= 4;
            $id= 5;
            $test_business = new Business ($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $id = null);


            //Act
            $test_business->setBusinessWebsite("walk-ins.com");
            $result = $test_business->getBusinessWebsite();

            //Assert
            $this->assertEquals ("walk-ins.com", $result);
        }

        function testGetBusinessAddress()
        {
          //Arrange
          $business_name="IBM";
          $business_phone= 5033133131;
          $business_contact = "john";
          $business_website = "walkins.com";
          $business_address ="123 fake st.";
          $business_contact_email = "me@fake.email";
          $business_category_id= 4;
          $id= 5;
          $test_business = new Business ($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $id = null);

          //Act
          $result = $test_business->getBusinessAddress();

          //Assert
          $this->assertEquals ("123 fake st.", $result);
        }

        function testSetBusinessAddress()
        {
            //Arrange
            $business_name="IBM";
            $business_phone= 5033133131;
            $business_contact = "john";
            $business_website = "walkins.com";
            $business_address ="123 fake st";
            $business_contact_email = "me@fake.email";
            $business_category_id= 4;
            $id= 5;
            $test_business = new Business ($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $id = null);

            //Act
            $test_business->setBusinessAddress("123 fake st");
            $result = $test_business->getBusinessAddress();

            //Assert
            $this->assertEquals ("123 fake st", $result);
        }

        function testGetBusinessContactEmail()
        {
          //Arrange
          $business_name="IBM";
          $business_phone= 5033133131;
          $business_contact = "john";
          $business_website = "walkins.com";
          $business_address ="123 fake st";
          $business_contact_email = "me@fakeemail.com";
          $business_category_id= 4;
          $id= 5;
          $test_business = new Business ($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $id = null);

          //Act
          $result = $test_business->getBusinessContactEmail();

          //Assert
          $this->assertEquals ("me@fakeemail.com", $result);
        }

        function testSetBusinessContactEmail()
        {
          //Arrange
          $business_name="IBM";
          $business_phone= 5033133131;
          $business_contact = "john";
          $business_website = "walkins.com";
          $business_address ="123 fake st";
          $business_contact_email = "me@fakeemail.com";
          $business_category_id= 4;
          $id= 5;
          $test_business = new Business ($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $id = null);

          //Act
          $test_business->setBusinessContactEmail("me@fakeemail.com");
          $result = $test_business->getBusinessContactEmail();

          //Assert
          $this->assertEquals ("me@fakeemail.com", $result);
        }



// //////////////////Save, GetAll, DeleteAll, Find, Update//////////////
// /////////////////////////////////////////////////////////////////////
//         function testSave()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
//         function testGetAll()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
//         function testDeleteAll()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
//         function testFind()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
//         function testUpdate()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
//         //////////////////////////Join Table Getters/////////////////////////
//         /////////////////////////////////////////////////////////////////////
//         function testGetCategoryId()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
//         function testGetActivityId()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }

    }
 ?>

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
            $business_login = "username1";
            $business_password= "chocolate";
            $id= 5;
            $test_business = new Business ($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $business_login, $business_password, $id = null);


            //Act
            $test_business->setBusinessName("IBM");
            $result = $test_business->getBusinessName();

            //Assert
            $this->assertEquals ("IBM", $result);
        }
//
//
//         function testGetBusinessPhone()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
//
//         function testSetBusinessPhone()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
//
//         function testSetBusinessContact()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
//         function testGetBusinessContact()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
//         function testSetBusinessWebsite()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
//         function testGetBusinessWebsite()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
//         function testSetBusinessAddress()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
//         function testGetBusinessAddress()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
//         function testSetBusinessEmail()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
//         function testGetBusinessEmail()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
//         function testGetBusinessLogin()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
//         function testSetBusinessLogin()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
//         function testGetBusinessPassword()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
//         function testSetBusinessPassword()
//         {
//             //Arrange
//
//             //Act
//
//             //Assert
//         }
//
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

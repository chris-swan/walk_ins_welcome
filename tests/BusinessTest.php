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
            $business_name="IBM";
            $test_business = new Business($business_name);

            //Act
            $result = $test_business->getBusinessName();

            //Assert
            $this->assertEquals ($business_name, $result);

        }

        function testSetBusinessName()
        {
            //Arrange
            $business_name="apple";
            $test_business = new Business($business_name);

            //Act
            $test_business->setBusinessName("apple");
            $result = $test_business->getBusinessName();

            //Assert
            $this->assertEquals ("apple", $result);
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

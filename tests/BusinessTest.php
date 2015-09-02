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

   $server = 'mysql:host=localhost;dbname=walk_in_test';
   $username = 'root';
   $password = 'root';
   $DB = new PDO($server, $username, $password);


   class BusinessTest extends PHPUnit_Framework_TestCase
   {
       protected function tearDown()
       {
           Business::deleteAll();
          //  Category::deleteAll();
          //  User::deleteAll();
          //  Activity::deleteAll();
       }
//////////////////////////////////////TESTS///////////////////////////////////

/////////////////////////////////// GET SET BUSINESS NAME ////////////////////
        function testGetBusinessName()
        {
            //Arrange
            $business_name ="IBM";
            $business_phone = "5033133131";
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
            $business_phone= "5033133131";
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

////////////////////////// GET SET PHONE //////////////////////////////////////
        function testGetBusinessPhone()
        {
          //Arrange
          $business_name="IBM";
          $business_phone= "5033133131";
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
          $this->assertEquals ("5033133131", $result);

        }


        function testSetBusinessPhone()
        {
            //Arrange
            $business_name="IBM";
            $business_phone= "5033133131";
            $business_contact = "john";
            $business_website = "walkins.com";
            $business_address ="123 fake st";
            $business_contact_email = "me@fake.email";
            $business_category_id= 4;
            $id= 5;
            $test_business = new Business($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $id = null);

            //Act
            $test_business->setBusinessPhone("5033133131");
            $result = $test_business->getBusinessPhone();


            //Assert
            $this->assertEquals ("5033133131", $result);
        }

/////////////////////////// GET SET BUS CONTACT /////////////////////////////////
        function testGetBusinessContact()
        {
          //Arrange
          $business_name="IBM";
          $business_phone= "5033133131";
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
          $business_phone= "5033133131";
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

//////////////////////// GET SET BUS WEBSITE ////////////////////////////////////

        function testGetBusinessWebsite()
        {
            //Arrange
            $business_name="IBM";
            $business_phone= "5033133131";
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
            $business_phone= "5033133131";
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

/////////////////////////// GET SET BUS ADDRESS ///////////////////////////////

        function testGetBusinessAddress()
        {
          //Arrange
          $business_name="IBM";
          $business_phone= "5033133131";
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
            $business_phone= "5033133131";
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

/////////////////////// GET SET BUS CONTACT EMAIL //////////////////////////////
        function testGetBusinessContactEmail()
        {
          //Arrange
          $business_name="IBM";
          $business_phone= "5033133131";
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
          $business_phone= "5033133131";
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

/////////////////////// GET SET BUSINESS CATEGORY ID  //////////////////////////////////
        function testGetBusinessCategoryId()
        {
          //Arrange
          $business_name="IBM";
          $business_phone= "5033133131";
          $business_contact = "john";
          $business_website = "walkins.com";
          $business_address ="123 fake st";
          $business_contact_email = "me@fakeemail.com";
          $business_category_id= 4;
          $id= 5;
          $test_business = new Business ($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $id = null);

          //Act
          $result = $test_business->getBusinessCategoryId();

          //Assert
          $this->assertEquals (4, $result);
        }

        function testSetBusinessCategoryId()
        {
          //Arrange
          $business_name="IBM";
          $business_phone= "5033133131";
          $business_contact = "john";
          $business_website = "walkins.com";
          $business_address ="123 fake st";
          $business_contact_email = "me@fakeemail.com";
          $business_category_id= 4;
          $id= 5;
          $test_business = new Business ($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $id = null);

          //Act
          $test_business->setBusinessCategoryId(4);
          $result = $test_business->getBusinessCategoryId();

          //Assert
          $this->assertEquals (4, $result);
        }



// //////////////////Save, GetAll, DeleteAll, Find, Update//////////////
// /////////////////////////////////////////////////////////////////////
        function testSave()
        {
            //Arrange
            $business_name="Apple";
            $business_phone= "5033133131";
            $business_contact = "john";
            $business_website = "walkins.com";
            $business_address ="123 fake st";
            $business_contact_email = "me@fakeemail.com";
            $business_category_id= 1;
            $id= 1;
            $test_business = new Business ($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $id = null);

            //Act
            $test_business->save();

            //Assert
            $result = Business::getAll();
            $this->assertEquals($test_business, $result[0]);
        }
////////////////////////// TEST GET ALL ///////////////////////////////////////
        function testGetAll()
        {
          //Arrange
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
          $result = Business::getAll();

          //Assert
          $this->assertEquals([$test_business, $test_business2], $result);
        }
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
        function testFind()
        {
          //Arrange
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
            $result = Business::find($test_business->getId());

            //Assert
            $this->assertEquals($test_business, $result);
        }

        function testBusinessContactUpdate()
        {
            //Arrange
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


            //Act
            $new_business_contact = "mary";
            $test_business->updateContact($new_business_contact);

            //Assert
            $this->assertEquals("mary",$test_business->getBusinessContact());
        }

        function testBusinessPhone()
        {
            //Arrange
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


            //Act
            $new_business_phone = "4445555";
            $test_business->updatePhone($new_business_phone);

            //Assert
            $this->assertEquals("4445555",$test_business->getBusinessPhone());
        }

        function testBusinessWebsite()
        {
            //Arrange
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


            //Act
            $new_business_website = "ibm.con";
            $test_business->updateWebsite($new_business_website);

            //Assert
            $this->assertEquals("ibm.con",$test_business->getBusinessWebsite());
        }

        function testBusinessContactEmail()
        {
            //Arrange
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


            //Act
            $new_business_contact_email = "george@ibm.con";
            $test_business->updateContactEmail($new_business_contact_email);

            //Assert
            $this->assertEquals("george@ibm.con",$test_business->getBusinessContactEmail());
        }


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

<?php
    Class Business
    {
        private $business_name;
        private $business_phone;
        private $business_contact;
        private $business_website;
        private $business_address;
        private $business_contact_email;
        private $id;

        function __construct($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $id=null)
        {
            $this->business_name = $business_name;
            $this->business_phone = $business_phone;
            $this->business_contact = $business_contact;
            $this->business_website = $business_website;
            $this->business_address = $business_address;
            $this->business_contact_email = $business_contact_email;
            $this->id = $id;

        }
/////////////////////////////////GET/SET NAME/////////////////////////////////
        function getBusinessName()
        {

            return $this->business_name;

        }

        function setBusinessName($new_business_name)
        {
            $this->business_name = $new_business_name;

        }

/////////////////////////GET/SET PHONE///////////////////////////////////////
        function getBusinessPhone()
        {
            return $this->business_phone;

        }


        function setBusinessPhone($new_business_phone)
        {
            $this->business_phone = $new_business_phone;

        }
//////////////////////////GET SET CONTACT ////////////////////////////////////
        function getBusinessContact()
        {
            return $this->business_contact;

        }

        function setBusinessContact($new_business_contact)
        {
            $this->business_contact = $new_business_contact;

        }
///////////////////////// GET SET WEBSITE ////////////////////////////////////
        function getBusinessWebsite()
        {
            return $this->business_website;

        }

        function setBusinessWebsite($new_business_contact)
        {
            $this->business_website = $new_business_contact;

        }
///////////////////////// GET SET ADDRESS ///////////////////////////////////
        function getBusinessAddress()
        {
            return $this->business_address;
        }

        function setBusinessAddress($new_business_address)
        {
            $this->business_address = $new_business_address;
        }
//////////////////////////// GET SET EMAIL ///////////////////////////////////
        function getBusinessContactEmail()
        {
            return $this->business_contact_email;
        }

        function setBusinessContactEmail($new_business_contact_email)
        {
            $this->business_contact_email = $new_business_contact_email;
        }

//////////////////////////// GET SET CAT ID ///////////////////////////////////
        function getId()
        {
            return $this->id;
        }

//////////////////////////////Save, Update/////////////////////////////
///////////////////////////////////////////////////////////////////////
/////  MAY NEED TO CHANGE THE GetBusinessCategoryId and remove from this line:
        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO businesses (business_name, business_phone, business_contact, business_website, business_address, business_contact_email) VALUES ('{$this->getBusinessName()}', '{$this->getBusinessPhone()}', '{$this->getBusinessContact()}', '{$this->getBusinessWebsite()}', '{$this->getBusinessAddress()}', '{$this->getBusinessContactEmail()}';");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function updateContact($new_business_contact)
        {
        $GLOBALS['DB']->exec("UPDATE businesses SET business_contact ='{$new_business_contact}' WHERE id = {$this->getId()}, {$this->getBusinessContact()};");
        $this->setBusinessContact($new_business_contact);
        }

        function updatePhone($new_business_phone)
        {
        $GLOBALS['DB']->exec("UPDATE businesses SET business_phone ='{$new_business_phone}' WHERE id = {$this->getId()}, {$this->getBusinessPhone()};");
        $this->setBusinessPhone($new_business_phone);
        }

        function updateWebsite($new_business_website)
        {
        $GLOBALS['DB']->exec("UPDATE businesses SET business_website ='{$new_business_website}' WHERE id = {$this->getId()}, {$this->getBusinessWebsite()};");
        $this->setBusinessWebsite($new_business_website);
        }

        function updateContactEmail($new_business_contact_email)
        {
        $GLOBALS['DB']->exec("UPDATE businesses SET business_contact_email ='{$new_business_contact_email}' WHERE id = {$this->getId()}, {$this->getBusinessContactEmail()};");
        $this->setBusinessContactEmail($new_business_contact_email);
        }

/////////////////STATIC------STATIC--------STATIC--------STATIC////////
//////////////////////////////find, getAll, DeleteAll//////////////////
///////////////////////////////////////////////////////////////////////

        static function find($search_id)
        {
            $found_business = null;
            $businesses = Business::getAll();
            foreach($businesses as $business) {
                $business_id = $business->getId();
                if ($business_id == $search_id) {
                    $found_business = $business;
                }
            }
            return $found_business;

        }

        static function getAll()
        {
            $returned_businesses = $GLOBALS['DB']->query("SELECT * FROM businesses;");
            $businesses = array();
            foreach($returned_businesses as $business) {
                $business_name = $business['business_name'];
                $business_phone = $business['business_phone'];
                $business_contact = $business['business_contact'];
                $business_website = $business['business_website'];
                $business_address = $business['business_address'];
                $business_contact_email = $business['business_contact_email'];
                $id = $business['id'];
                $new_business = new Business($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $id);
                array_push($businesses, $new_business);
            }
            return $businesses;

        }

        static function DeleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM businesses;");
            $GLOBALS['DB']->exec("DELETE FROM activities_businesses;");
        }



//
//
//         //////////////////////////Join Table getters/////////////////////////
//         /////////////////////////////////////////////////////////////////////

        function addActivity($activity)
        {
            $GLOBALS['DB']->exec("INSERT INTO activities_businesses (activity_id, business_id) VALUES ({$activity->getId()}, {$this->getId()});");
        }

        function getActivities()
        {
            $business_id=$this->getId();
            $returned_activities = $GLOBALS['DB']->query(
            "SELECT activities.* FROM businesses
            JOIN activities_businesses ON (businesses.id = activities_businesses.business_id)
            JOIN activities ON (activities_businesses.activity_id = activities.id)
            WHERE businesses.id = {$business_id};");

            $activities = array();
            foreach($returned_activities as $activity) {
                $activity_name = $activity['activity_name'];
                $activity_date = $activity['activity_date'];
                $activity_location = $activity['activity_location'];
                $activity_description = $activity['activity_description'];
                $activity_price = $activity['activity_price'];
                $activity_quantity = $activity['activity_quantity'];
                $business_id = $activity['business_id'];
                $activity_category_id = $activity['activity_category_id'];
                $id = $activity['id'];
                $new_activity = new Activity($activity_name, $activity_date, $activity_location, $activity_description, $activity_price, $activity_quantity, $business_id, $activity_category_id, $id);
                array_push($activities, $new_activity);
            }
            return $activities;
        }
    }


 ?>

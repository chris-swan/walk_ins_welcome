<?php
    Class Business
    {
        private $business_name;
        private $business_phone;
        private $business_contact;
        private $business_website;
        private $business_address;
        private $business_contact_email;
        private $business_category_id;
        private $id;

        function __construct($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $id=null)
        {
            $this->business_name = $business_name;
            $this->business_phone = $business_phone;
            $this->business_contact = $business_contact;
            $this->business_website = $business_website;
            $this->business_address = $business_address;
            $this->business_contact_email = $business_contact_email;
            $this->business_category_id = $business_category_id;
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
        function getBusinessCategoryId()
        {
            return $this->business_category_id;
        }

        function setBusinessCategoryId($new_business_category_id)
        {
            $this->business_category_id = $new_business_category_id;
        }

//////////////////////////// GET SET CAT ID ///////////////////////////////////
        function getId()
        {
            return $this->id;
        }

//////////////////////////////Save, Update/////////////////////////////
///////////////////////////////////////////////////////////////////////
        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO businesses (business_name, business_phone, business_contact, business_website, business_address, business_contact_email, business_category_id) VALUES ('{$this->getBusinessName()}', '{$this->getBusinessPhone()}', '{$this->getBusinessContact()}', '{$this->getBusinessWebsite()}', '{$this->getBusinessAddress()}', '{$this->getBusinessContactEmail()}', {$this->getBusinessCategoryId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
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
                $business_category_id = $business['business_category_id'];
                $id = $business['id'];
                $new_business = new Business($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id, $id);
                array_push($businesses, $new_business);
            }
            return $businesses;

        }

        static function DeleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM businesses;");
        }



//
//
//         //////////////////////////Join Table getters/////////////////////////
//         /////////////////////////////////////////////////////////////////////
//         function getCategoryId()
//         {
//
//         }
//
//         function getActivityId()
//         {
//
//         }
    }


 ?>

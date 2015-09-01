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

        function __construct($business_name,
        $business_phone,
        $business_contact,
        $business_website,
        $business_address,
         $business_contact_email,
         $business_category_id,

          $id=null)
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

        function GetBusinessName()
        {

            return $this->business_name;

        }

        function SetBusinessName($new_business_name)
        {
            $this->business_name = $new_business_name;

        }


        function GetBusinessPhone()
        {
            return $this->business_phone;

        }


        function SetBusinessPhone($new_business_phone)
        {
            $this->business_phone = $new_business_phone;

        }

        function GetBusinessContact()
        {
            return $this->business_contact;

        }

        function SetBusinessContact($new_business_contact)
        {
            $this->business_contact = $new_business_contact;

        }

        function GetBusinessWebsite()
        {
            return $this->business_website;

        }

        function SetBusinessWebsite($new_business_contact)
        {
            $this->business_website = $new_business_contact;

        }

        function GetBusinessAddress()
        {
            return $this->business_address;
        }

        function SetBusinessAddress($new_business_address)
        {
            $this->business_address = $new_business_address;
        }

        function GetBusinessContactEmail()
        {
            return $this->business_contact_email;
        }

        function SetBusinessContactEmail($new_business_contact_email)
        {
            $this->business_contact_email = $new_business_contact_email;
        }


//
// //////////////////Save, GetAll, DeleteAll, Find, Update//////////////
// /////////////////////////////////////////////////////////////////////
//         function Save()
//         {
//
//         }
//
//         function GetAll()
//         {
//
//         }
//
//         function DeleteAll()
//         {
//
//         }
//
//         function Find()
//         {
//
//         }
//
//         function Update()
//         {
//
//         }
//
//         //////////////////////////Join Table Getters/////////////////////////
//         /////////////////////////////////////////////////////////////////////
//         function GetCategoryId()
//         {
//
//         }
//
//         function GetActivityId()
//         {
//
//         }
    }


 ?>

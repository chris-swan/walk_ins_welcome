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
        private $business_login;
        private $business_password;
        private $id;

        function __construct($business_name,
        $business_phone,
        $business_contact,
        $business_website,
        $business_address,
         $business_contact_email,
         $business_category_id,
         $business_login,
          $business_password,
          $id=null)
        {
            $this->business_name = $business_name;
            $this->business_phone = $business_phone;
            $this->business_contact = $business_contact;
            $this->business_website = $business_website;
            $this->business_address = $business_address;
            $this->business_contact_email = $business_contact_email;
            $this->business_category_id = $business_category_id;
            $this->business_login = $business_login;
            $this->business_password = $business_password;
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


        function SetBusinessPhone()
        {
            $this->business_phone = $new_business_phone;

        }


        function SetBusinessContact()
        {
            return $this->business_contact;
        }

        function GetBusinessContact()
        {
            $this->business_contact = $new_business_contact;

        }

        function SetBusinessWebsite()
        {
            return $this->business_website;

        }

        function GetBusinessWebsite()
        {
            $this->business_website = $new_business_website;
        }

        function SetBusinessAddress()
        {
            return $this->business_address;
        }

        function GetBusinessAddress()
        {
            $this->business_address;
        }

        function SetBusinessEmail()
        {
            return $this->business_email;
        }

        function GetBusinessEmail()
        {
            $this->business_website = $new_business_email;
        }

        function GetBusinessLogin()
        {
            return $this->business_login;
        }

        function SetBusinessLogin()
        {
            $this->business_login = $new_business_login;
        }

        function GetBusinessPassword()
        {
            return $this->business_password;
        }

        function SetBusinessPassword()
        {
            $this->business_password = $new_business_password; 

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

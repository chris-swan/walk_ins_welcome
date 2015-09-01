<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/User.php";


    $server = 'mysql:host=localhost;dbname=walk_in_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);
    class UserTest extends PHPUnit_Framework_TestCase {

        // protected function tearDown() {
        //     User::deleteAll();
        // }

        function testGetUserName()
        {
            $user_name = "Wolf";
            $buy_quantity = 5;
            $user_phone = "(123)456-7890";
            $user_email = "howl@yellowstone.com";
            $activity_id = 100;
            $id = 1;
            $test_user = new User($user_name, $buy_quantity, $user_phone, $user_email, $activity_id, $id);
            $test_user->save();

            $result = $test_user->getUserName();

            $this->assertEquals($result, $user_name);
        }

        function testSetUserName()
        {
            $user_name = "Wolf";
            $buy_quantity = 5;
            $user_phone = "(123)456-7890";
            $user_email = "howl@yellowstone.com";
            $activity_id = 100;
            $id = 1;
            $test_user = new User($user_name, $buy_quantity, $user_phone, $user_email, $activity_id, $id);
            $test_user->save();

            $test_user->setUserName("WolfMan");
            $result = $test_user->getUserName();

            $this->assertEquals("WolfMan", $result);
        }

    }

?>

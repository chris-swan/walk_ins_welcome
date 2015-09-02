<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Activity.php";
    require_once __DIR__."/../src/Business.php";
    require_once __DIR__."/../src/Category.php";
    require_once __DIR__."/../src/User.php";

    $app = new Silex\Application();
    $app['debug'] = true;

    $server = 'mysql:host=localhost;dbname=walk_in';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    //Homepage
    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array('activities'=>Activity::getAll()));
    });

    //Path to activity to update activities set up by the businesses
    $app->get("/activity/{id}", function($id) use ($app) {
        $activity = Activity::find($id);
        $activity_id = $activity->getId();
        return $app['twig']->render('activity.html.twig');
    });

    //List of all businesses offering activities
    $app->get("/businesses", function() use ($app) {
       return $app['twig']->render('businesses.html.twig', array('businesses'=>Business::getAll()));
    });

    //path to businesshome for biz operations, updates and viewing
    $app->get("/businesshome/{id}", function($id) use ($app) {
        $business = Business::find($id);
        return $app['twig']->render('businesshome.html.twig', array('business' => $business, 'businesses' => Business::getAll, 'all_activities' =>Activity::getAll()));
    });

    //specific business viewing page to be viewed by the user.
    //(NEED TO FINALIZE ARRAY!!!)
    $app->get("/business/{id}", function($id) use ($app) {
        $business = Business::find($id);
        return $app['twig']->render('business.html.twig', array('business' => $business, 'all_activities' => Activity::getAll()));
    });

    $app->get("/businesshome", function() use ($app) {
       return $app['twig']->render('businesshome.html.twig', array('businesses'=>Business::getAll()));
    });

    //add a new business to businesses from business home
    $app->post("/businesshome", function() use ($app) {
        $business_name = $_POST['business_name'];
        $business_phone = $_POST['business_phone'];
        $business_contact = $_POST['business_contact'];
        $business_website = $_POST['business_website'];
        $business_address = $_POST['business_address'];
        $business_contact_email = $_POST['business_contact_email'];
        $business = new Business($business_name, $business_phone, $business_contact, $business_website, $business_address, $business_contact_email, $business_category_id = null, $id=null);
        $business->save();
        return $app['twig']->render('businesshome.html.twig', array('businesses' => Business::getAll()));
    });

    //specific business viewing page to be viewed by the user.
    //(NEED TO FINALIZE ARRAY!!!)
    $app->get("/business/{id}", function($id) use ($app) {
        $business = Business::find($id);
        return $app['twig']->render('business.html.twig', array('business' => $business, 'all_activities' => Activity::getAll()));
    });

    //Path to update business info --- NOT FINISHED AND NEEDS PROPER THINGS!
    $app->get("/updatebusiness", function() use ($app) {
        return $app['twig']->render('updatebusiness.html.twig', array ('businesses'=> Business:: getAll));
    });

    //path to userhome for viewing current users and adding new
    $app->get("/userhome", function() use ($app) {
        return $app['twig']->render('userhome.html.twig', array('users' => User::getAll()));
    });

    //path to specific users account info and activity info
    $app->get("/updateuser/{id}", function() use ($app) {
        return $app['twig']->render('updateuser.html.twig', array('users' => User::getAll()));
    });

    //Update info
    $app->post("/userhome", function() use ($app) {
        $user_name = $_POST['user_name'];
        $user_phone = $_POST['user_phone'];
        $user_email = $_POST['user_email'];
        $user = new User($user_name, $user_buy_quantity = null, $user_phone, $user_email, $activity_id = null, $id = null);
        $user->save();
        return $app['twig']->render('userhome.html.twig', array('users' => User::getAll()));
    });

    return $app
?>

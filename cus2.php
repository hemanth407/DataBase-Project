<?php
error_reporting(1);
session_start();
/*if($_SESSION['user']!="Sign in")
{
header('Location: https://wonderhomes.co/index.php');
}*/
require_once __DIR__ . '/src/Facebook/autoload.php';

$db = new mysqli('localhost','root','','sunshin5_wonderhomes1');

if($db->connect_error)
{
die("Connection failed: " . $db->connect_error);
}

$fb = new Facebook\Facebook([
  'app_id' => '1901607873448462',
  'app_secret' => 'e149f8153b1c7db189c113e14b9de76d',
  'default_graph_version' => 'v2.4',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // optional
  
try {
  if (isset($_SESSION['facebook_access_token'])) {
    $accessToken = $_SESSION['facebook_access_token'];
  } else {
      $accessToken = $helper->getAccessToken();
  }
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();

    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
 }

if (isset($accessToken)) {
  if (isset($_SESSION['facebook_access_token'])) {
    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
  } else {
    // getting short-lived access token
    $_SESSION['facebook_access_token'] = (string) $accessToken;

      // OAuth 2.0 client handler
    $oAuth2Client = $fb->getOAuth2Client();

    // Exchanges a short-lived access token for a long-lived one
    $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);

    $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

    // setting default access token to be used in script
    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
  }

  // redirect the user back to the same page if it has "code" GET variable
  if (isset($_GET['code'])) {
    header('Location:edit_profile.php');
  
  }

  // getting basic info about user
  try {
    $profile_request = $fb->get('/me?fields=name,first_name,last_name,email,gender,locale');
    
    $requestPicture = $fb->get('/me/picture?redirect=false&height=200');
    $picture = $requestPicture->getGraphUser();
    $profile = $profile_request->getGraphNode()->asArray();
     $id = $profile['id'];
    $name = $profile['name'];
     $email = $profile['email'];
      $gender = $profile['gender'];
      $locale = $profile['locale'];
      $fbpic = "<img src='".$picture['url']."' class='img-rounded'/>";
      $fbpic=$picture['url'];
      # save the user nformation in session variable
 
    $_SESSION['id'] = $id;
     
    $_SESSION['name'] = $name;
     
    $_SESSION['user'] = $email;
    
      
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    session_destroy();
    // redirecting user back to app login page
    header("Location: ./");
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
  
  // printing $profile array on the screen which holds the basic info about user
  
   
   $first_name = $profile['first_name'];
   
  
  $sql = "INSERT INTO `signup`(`ID`,`NAME`,`date`,`EMAIL`,`gender`,`imagename`) VALUES ('{$id}','{$name}',now(),'{$email}','{$gender}','{$fbpic}')";
  
  if ($db->query($sql) === TRUE) {
  
   
      echo "<script>alert('New record created successfully')</script>";

  } else {
      echo "Error: " . $sql . "<br>" . $db->error;
  }
  
  $db->close();


    // Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
}
else {
  
  // replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
  $loginUrl = $helper->getLoginUrl('signin.php', $permissions);
  
}



include_once 'login_with_google_using_php/gpConfig.php';
include_once 'login_with_google_using_php/User.php';

if(isset($_GET['code'])){
  $gClient->authenticate($_GET['code']);
  $_SESSION['token'] = $gClient->getAccessToken();
  header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
  $gClient->setAccessToken($_SESSION['token']);
}

//Gmail Login code



if ($gClient->getAccessToken()) {
  //Get user profile data from google
  $gpUserProfile = $google_oauthV2->userinfo->get();
  
  //Initialize User class
  $user = new User();
  
  //Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'gender'        => $gpUserProfile['gender'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);
  
  //Storing user data into session
  $_SESSION['userData'] = $userData;
  $_SESSION['id'] = $userData['oauth_uid'];
   $_SESSION['user'] = $userData['email'];
  //Render facebook profile data
    if(!empty($userData)){
        //$output = '<h1>Google+ Profile Details </h1>';
        //$output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
        //$output .= '<br/>Google ID : ' . $userData['oauth_uid'];
        //$output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        //$output .= '<br/>Email : ' . $userData['email'];
        //$output .= '<br/>Gender : ' . $userData['gender'];
        //$output .= '<br/>Locale : ' . $userData['locale'];
       //$output .= '<br/>Logged in with : Google';
       $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Google+ Page</a>';
        $output .= '<br/>Logout from <a href="signout.php">Google</a>'; 
    }else{
        $output = 'you are Login with our <br>other credentials so please <a href="signout.php" style="color:red;"><br>Click here</a>';
    }
} else {
  $authUrl = $gClient->createAuthUrl();
  $output = '';
}


  ?>
  <?php
$redirect=$_SESSION["current"];
  if(!isset($_SESSION["user"]))
   {
   
    
    $_SESSION["user"]='Sign in';
   }
 if($_SESSION["user"]=="Sign in")
  {
     $_SESSION["current"]=$_SERVER['HTTP_REFERER'];
  $_SESSION["out"]="";

  }
include 'connect.php';
$con=connect_database();

if(isset($_POST['login'])){
  
  $email = $_POST['email'];
  $password = $_POST['psw'];
  
  
$query ="SELECT `ID`,`activation` FROM signup WHERE EMAIL = '$email' AND password = '$password'";  

$result = mysqli_query($con,$query);

$activation = mysqli_fetch_array($result);

$act = $activation['activation'];

if($act == '0'){

if(mysqli_num_rows($result)>0)
{
  $_SESSION["user"]=$email;
  $_SESSION["out"]="Sign out";
  
 /* while($row = $result->fetch_assoc()) 
      {
        $id=$row["ID"];
      }*/
      
      $dt=date('Y/m/d H:i:s');
      
      $id=$activation["ID"];
      
      $_SESSION["id"]=$id;
      
     $sql3="INSERT INTO `login`(`signup`,`date`) VALUES ('$id','$dt')";
    if($result1=$con->query($sql3))
    {
      $_SESSION["id"]=$id;
      
      echo '<script>alert("Thank you for Login");
      
      window.location.href="index.php";  //$redirect
      </script>';
    }
    else
    {
      echo '<script>alert("Database error")</script>';
      echo '<script>window.open("signin.php","_self")</script>';
    }
  echo '<script>window.location.href="signin.php"</script>';
  }
  else {
  echo '<script>alert("Password or Username is incorrect!")</script>';
  echo '<script>window.open("signin.php","_self")</script>';
  }
}else{
    
   echo '<script>alert("Password or Username is incorrect!")</script>';
  echo '<script>window.open("signin.php","_self")</script>';
    
}

}
?>

<!DOCTYPE html>
<html>
<!--signin page-->

<head>

    <!-- ==========================
      Meta Tags 
    =========================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="466097075503-1ol4gi992vhctu9nf0q5ll91hd0t556q.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!-- ==========================
      Title 
    =========================== -->
    <title>Sign In | Arka Interiors</title>
        
    <!-- ==========================
      Fonts 
    =========================== -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,900,800' rel='stylesheet' type='text/css'>

    <!-- ==========================
      CSS 
    =========================== -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dragtable.css" rel="stylesheet" type="text/css">
    <link href="assets/css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="assets/css/animate.css" rel="stylesheet" type="text/css">
    <link href="assets/css/color-switcher.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="assets/css/color/red.css" id="main-color" rel="stylesheet" type="text/css">
    <link rel="icon" href="assets/images/favicon.ico" type="image/ico" sizes="40x40">
    
    
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
   <style> 
  
  .navbar{
  background-color:rgba(136, 136, 136, 0.63);
  margin-bottom: 0px;
  
  }
  
  .fa{
  color:#ffffff;
  font-weight:300;
  font-size:15px;
  margin-top:15px;
  }
  h4{
  color:#fff;
  font-weight:600px;
  font-size:28px;
  font-family:Calibri;
  }
  h5{
  font-size:28px;
  }
  
  body{
  font-family:Calibri;
  }
  
  
  .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
      width: 98%;
      margin: auto;
    }
  
  .navbar-brand {
  margin-top:-20px;
  }
  
  
   <!--dropdown-->
 .dropdown {
    position: relative;
    display: inline-block;
}

    .dropdown:hover .dropdown-content {
    display: block;
}
   .dropdown-content a:hover {background-color: #f1f1f1}
   
   .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 100px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 0px 10px;
    z-index: 1; 
    border-radius:6px;
}
  
  .btn-group-lg>.btn, .btn-lg {
  border-radius: 0px;}
  
  .btn{
      border-color: #cac4c4;
  }

   .container .background {
  background-image: url("assets/bg-blue.png") ;
  background-repeat: no-repeat;
    background-size: 100% 100%;
  
  border-radius:6px;
  padding: 20px;
  }
  .form-horizontal {
  text-align:left;
   color:#fff;
   font-family:Calibri;
  }
   b {
  color:#fff;
  font-weight:800;
  font-family:Calibri;
  font-size:40px;
  }
  
  a{
  color:#fff;
  }
  
   a:hover{
   color:#fff;
  }
  label {
    color: #fff;
   
   }
   center{
   color:#000;
   
   }
   
   .checkbox > label, .radio > label {
    padding-left: 20px;
    color: #fff;
    font-size: 15px;
}
  
   
  
  .pass{
  color:#FFF;
  
  }
   </style>
    
</head>
<body>
  
    <!-- ==========================
      SCROLL TOP - START 
    =========================== -->
    <div id="scrolltop" class="hidden-xs"><i class="fa fa-angle-up"></i></div>
    <!-- ==========================
      SCROLL TOP - END 
    =========================== -->
    
    
    <div id="page-wrapper"> <!-- PAGE - START -->
    
 <?php include 'header.php'; ?>
   
    
    <!-- ==========================
      ACCOUNT - START 
    =========================== -->
    <section class="content account" style="margin-top:200px;">
       
        <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6" >
    <div class="background">
   <center><b>Login</b></center>
   <center>New here ? <a href="signup.php"><u>Sign Up</u></a></center><br>
  
  <form class="form-horizontal" action="" method="post" autocomplete="off">
  
    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Email Address: <span class="required">*</span></label>
      <div class="col-sm-8">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Password: <span class="required">*</span></label>
      <div class="col-sm-4">          
        <input type="password" class="form-control" id="psw" placeholder="Enter  password" name="psw" required >
        <input type="hidden" id="location" value="<?php echo  $_SESSION["current"]; ?>">
      </div>
  <div class="col-sm-5" style="margin-top:10px;">         
       <a href="lost-password.php" class="pass"  >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Forgot your password ?</a>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-3 col-sm-4">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
  </div>
      </div>
      <div class="col-sm-offset-2 col-sm-2">
      <input class="form-group" type="submit" style="margin-left:0px; margin-top:13px; color:#000;" name="login"  value="LOGIN &#187;">
      </div>
    </div>
    
        
        </form>
      </div>
     
    </div>
    <div class="col-md-1" >
        
   
    </div>
         <div class="col-md-4" >
          
          <div class="row" >
          
         <div class="col-sm-6">
         <!--<a href="<?php //echo $loginUrl; ?> " >
           <img src="ffff.jpg" class="img-response"></a>-->
         
         <div class="google"><?php echo $output; ?></div>
         </div>
    
        </div>
           
         </div>
    
   
   </div>
   <style>
    @media only screen and (min-width: 240px) and (max-width: 281px){
    .img-response  {
        width: 200px;
    height: 36px;
    margin-right: 62px;
    margin-top:10%;
        margin-bottom:10%;
        margin-left:15%;
      }
      .line{
          display:none;
      }
      .google{
        margin-left:-170px; 
        /*width: 550px;*/
        height: 36px;   
        margin-left:15%;
      }
   }
    @media only screen and (min-width: 282px) and (max-width: 319px){
    .img-response  {
        width: 200px;
    height: 36px;
    margin-right: 62px;
    margin-top:10%;
        margin-bottom:10%;
        margin-left:15%;
      }
      .line{
          display:none;
      }
      .google{
        margin-left:-170px; 
        /*width: 550px;*/
        height: 36px;   
        margin-left:15%;
      }
   }
    @media only screen and (min-width: 320px) and (max-width: 359px){
    .img-response  {
        width: 200px;
    height: 36px;
    margin-right: 62px;
    margin-top:10%;
        margin-bottom:10%;
        margin-left:15%;
      }
      .line{
          display:none;
      }
      .google{
        margin-left:-170px; 
        /*width: 550px;*/
        height: 36px;   
        margin-left:15%;
      }
   }
     @media only screen and (min-width: 360px) and (max-width: 374px){
    .img-response  {
        width: 200px;
    height: 36px;
    margin-right: 110px;
    margin-top:10%;
        margin-bottom:10%;
        margin-left:15%;
      }
      .line{
          display:none;
      }
      .google{
        margin-left:-170px; 
       /*width: 550px;*/
        height: 36px;   
        margin-left:15%;
      }
   }
    @media only screen and (min-width: 375px) and (max-width: 419px){
    .img-response  {
        width: 200px;
    height: 36px;
    margin-right: 110px;
    margin-top:10%;
        margin-bottom:10%;
        margin-left:15%;
      }
      .line{
          display:none;
      }
      .google{
        margin-left:-170px; 
       /*width: 550px;*/
        height: 36px;   
        margin-left:15%;
      }
   }
  
   @media only screen and (min-width: 420px) and (max-width: 480px){
    .img-response  {
        width: 200px;
    height: 36px;
    margin-right: 110px;
    margin-top:10%;
        margin-bottom:10%;
        margin-left:15%;
      }
      .line{
          display:none;
      }
      .google{
        margin-left:-170px; 
        /*width: 550px;*/
        height: 36px;   
        margin-left:15%;
      }
   }
   @media only screen and (min-width: 481px) and (max-width: 767px){
    .img-response  {
        width: 200px;
    height: 36px;
    margin-right: 110px;
    margin-top:10%;
        margin-bottom:7%;
        margin-left: 28%;
       }
        .line{
          display:none;
      }
       .google{
        margin-left:-170px; 
        width: 596px;
        height: 36px;   
        margin-left:28%;
      }
   }
   @media only screen and (min-width: 768px) and (max-width: 991px){
    .img-response  {
        width: 75%;
    height: 36px;
    margin-right: 110px;
    margin-top:10%;
        margin-bottom:10%;
        margin-left: 65%
       }
         .line{
          display:none;
      }
       .google{
        margin-left:-170px; 
        /*width: 550px;*/
        height: 36px;   
        margin-left:65%;
      }
   }
   @media only screen and (min-width: 992px) and (max-width: 1024px){
    .img-response  {
        width: 164%;
        height: 36px;
    margin-right: 110px;
    margin-top:70%;
        margin-bottom:10%;
       }
       .google{
        margin-left:-170px; 
        /*width: 550px;*/
        height: 36px;   
        margin-left:1%;
      }
   }
  
    @media only screen and (min-width: 1200px) and (max-width: 1200px)  {
    .img-response  {
        width: 132%;
        height: 36px;
    margin-right: 110px;
    margin-top:70%;
        margin-bottom:10%;
       }
       .google{
        margin-left:-170px; 
        /*width: 550px;*/
        height: 36px;   
        margin-left:1%;
      }
   }
    @media only screen and (min-width: 1201px) and (max-width: 1201px){
    .img-response  {
        width: 132%;
        height: 36px;
    margin-right: 110px;
    margin-top:70%;
        margin-bottom:10%;
       }
       .google{
        margin-left:-170px; 
        width: 550px;
        height: 36px;   
        margin-left:1%;
      }
   }
    
    @media only screen and (min-width: 1203px) and (max-width: 1366px){
    .img-response  {
        width: 200px;
        height: 36px;
    margin-right: 110px;
    margin-top:70%;
        margin-bottom:10%;
       }
       .google{
        margin-left:-170px; 
       /*width: 550px;*/
        height: 36px;   
       margin-left:1%;
      }
   }
    @media only screen and (min-width: 1367px) {
    .img-response  {
        width:200px;
        height: 36px;
        margin-right: 110px;
        margin-top:70%;
        margin-bottom:10%;
       }
       .google{
        margin-left:-170px; 
        /*width: 550px;*/
        height: 36px;   
        margin-left:1%;
      }
   }
   </style>
     
  </div>      
  </div>
       <!-- <center style="margin-bottom:2%;"><a href="<?php echo $loginUrl; ?> " >
           <img src="ffff.jpg" style="width: 38%; height: 36px;"></a></center>
           <center><div style="margin-left:0%; width:50%; height: 36px;"><?php echo $output; ?></div></center>
                         <br>-->
    </section>
    <!-- ==========================
      ACCOUNT - END 
    =========================== -->
        
   
   <?php include 'footer.php'; ?>
 
    
    </div> <!-- PAGE - END -->
    
    <!-- ==========================
      JS 
    =========================== -->        
  <script src="assets/code.jquery.com/jquery-latest.min.js"></script>
    <script src="assets/code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyDDZJO4F0d17RnFoi1F2qtw4wn6Wcaqxao&amp;sensor=false&amp;language=en"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=true"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="assets/js/SmoothScroll.js"></script>
    <script src="assets/js/jquery.dragtable.js"></script>
    <script src="assets/js/jquery.card.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/twitterFetcher_min.js"></script>
    <script src="assets/js/jquery.mb.YTPlayer.min.js"></script>
    <script src="assets/js/color-switcher.js"></script>
    
   <script>
                $("#txtSearchKeyword").autocomplete({
  source: "assets/keyword.php",
  select: function (event, ui) {
    //console.log(ui['item']['value']);
    $('#hidden_keyword').val(ui['item']['value']);
  },
  // search: function () { $(this).addClass('auto-complete-loading'); },
  //open: function () { $(this).removeClass('auto-complete-loading'); },
  appendTo: '.keywords'
}).bind('focus');
    
    
    </script>
    
   <!-- <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
      
        var fullname1=profile.getName();
        var familyname1=profile.getFamilyName();
        var firstname1=profile.getGivenName();
        var image1=profile.getImageUrl();
        var email1=profile.getEmail();
        var id1=profile.getId();
        var mobile1=profile.getEmail();
        var gender1="male";
        var locale1="India";
var a=$("#location").val();
$.ajax({
       url: "fs2.php",
    type: 'POST',
                data: { firstname1: firstname1,lastname1:familyname1,email1:email1,id1:id1,gender1:gender1,locale1:locale1,mobile1:mobile1,image1:image1},
                success: function( result ) {
                   
  if(result == 0){ // if true (1)
      setTimeout(function(){// wait for 5 secs(2)
           location.reload(); // then reload the page.(3)
      }, 5000); 
   }
  
     }
                      });
        // The ID token you need to pass to your backend:
        //var id_token = googleUser.getAuthResponse().id_token;
       // console.log("ID Token: " + id_token);
      };
    
    </script>-->
</body>
</html>

# USAGE

Instantiate the Class
Make sure to include and instantiate the class on every page you use it.

include("class.login.php");
$log = new logmein();     //Instentiate the class
$log->dbconnect();        //Connect to the database
$log->encrypt = true;          //set to true if password is md5 encrypted. Default is false.


Create Log on Table
Run this code only once to create the log on table.

include("class.login.php");
$log = new logmein();
$log->cratetable('logon');

Display Login Form
The login form takes in Class and ID parameters for easy styling with CSS, and form action parameter.
If needed the form includes a hidden field “action” set to “log in“.

include("class.login.php");
$log = new logmein();
$log->encrypt = true; //set encryption
//parameters here are (form name, form id and form action)
$log->loginform("loginformname", "loginformid", "form_action.php");


Display Password Reset Form
Just like the login form, the password reset form takes in Class, ID and form action parameters.
If needed the form includes a hidden field “action” set to “resetlogin

include("class.login.php");
$log = new logmein();
$log->encrypt = true; //set encryption
//parameters here are (form name, form id and form action)
$log->resetform("resetformname", "resetformid", "form_action.php");

Password Protect a Page
Place this code on top of every page you want to password protect.

include("class.login.php");
$log = new logmein();
$log->encrypt = true; //set encryption
//parameters are(SESSION, name of the table, name of the password field, name of the username field)
if($log->logincheck($_SESSION['loggedin'], "logon", "password", "useremail") == false){
    //do something if NOT logged in. For example, redirect to login page or display message.
}else{
    //do something else if logged in.
}

Login
Place this code inside the form action script. For example, in this tutorial I am using “form_action.php” as my form action script.

//instantiate if needed
include("class.login.php");
$log = new logmein();
$log->encrypt = true; //set encryption
if($_REQUEST['action'] == "login"){
    if($log->login("logon", $_REQUEST['username'], $_REQUEST['password']) == true){
        //do something on successful login
    }else{
        //do something on FAILED login
    }
}

Log out
Place this code inside the script that is executed when user want’s to log out.

include("class.login.php");
$log = new logmein();
$log->encrypt = true; //set encryption
//Log out
$log->logout();
//do something

Reset Password
Place this code inside the script that will run when password recovery is requested.

include("class.login.php");
$log = new logmein();
$log->encrypt = true; //set encryption
if($_REQUEST['action'] == "resetlogin"){
    if($log->passwordreset($_REQUEST['username'], "logon", "password", "useremail") == true){
        //do something on successful password reset
    }else{
        //do something on failed password reset
    }
}

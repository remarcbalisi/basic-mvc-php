# basic-mvc-php
This is the basic mvc for php web dev, this system includes login, adding new user

# sql is provided
Open your php myadmin and create a new database, import the sql located in

app/models/mvc.sql

# test account
email: admin@email.com
password: admin

# create project directory in your xampp/htdocs and pull the repo
git init

git remote add origin https://github.com/remarcbalisi/basic-mvc-php.git

git pull origin master

# setup database
<appfolder>/app/core/DatabaseConn.php

*edit these variables

    protected $servername = "localhost";
    protected $username = "root";

    protected $password = "";

    protected $dbname = "mydbname";

# setup global variables
<appfolder>/app/core/Globals.php

change this variable according to the name of your appfolder

    protected static $root_dir = "mvc";

# running the app
Make sure xampp: Apache && MySQL is running

In your browser, type: http://localhost/appfolder/public/adminlogin

# Url Guide

Base Url: localhost/appfolder/public

Next to /public is the filename ( /adminlogin )

Next to filename is function name ( /adminlogin/<function_name> )

Next to function name are parameters; you can have multiple params by adding another slash

( /adminlogin/function_name/parameter/parameter2 )

# check if user is currently logged in
    protected $auth_user;
    protected $admin_users;

    public function __construct(){
        $this->auth_user = $this->model('AuthUser');
            $this->admin_users = $this->model('User')->getByRole("admin");
    }

    public function index(){
        if( $this->auth_user->auth ){
          //user is logged in
        }
        else{
          //user is not authenticated
        }
    }

# creating models
    class User{
  
      //model attributes
      public $id;

      //get all users
      public function get(){
    
          $this->createConnection();
          $sql = "SELECT * from user";
          $result = $this->conn->query($sql);
          $data = [];

          if (!$result) {
                trigger_error('Invalid query: ' . $this->conn->error);
          }

          if ($result->num_rows > 0) {
              // output data of each row
              while( $row = $result->fetch_assoc() ){
                  array_push($data, $row);
              }
              return $data;

            } else {
                $result = [];
                return $result;
            }

            $this->closeConnection();
  
      }

    }

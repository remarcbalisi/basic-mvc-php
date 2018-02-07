<?php

class Globals{

    protected static $root_dir = "mvc";
    protected static $http = "http://";
    protected static $host = "localhost";

    public static function baseUrl(){
        $root_dir = "mvc";
        $http = "http://";
        $host = "localhost";
        $base_url = $http . $host . "/" . $root_dir;
        return $base_url;
    }

}

?>

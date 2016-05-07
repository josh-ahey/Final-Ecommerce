
<?php
    
define("DB_HOST", 'localhost');
define("DB_NAME", 'ashesics_aherdemla_joshua');
define("DB_PORT", 3306);
define("DB_USER","ashesics_aj7519");
define("DB_PWORD","ooz8znpmop76");


class adb extends mysqli
{
    /**
     * Adb constructor.
     */
    public function __construct(){

        parent::__construct(DB_HOST, DB_USER, DB_PWORD, DB_NAME, DB_PORT);

        if (mysqli_connect_error()){

            die('Connection Error (' . mysqli_connect_errno() . ') ' .mysqli_connect_error() );
        }
    }
}

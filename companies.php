<?php
require_once ("database.php");

class companies
{
    var $id;
    var $username;
    var $city;
    var $company_name;
    var $password;
    var $company_logo;

    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? '';
        $this->username = $args['username'] ?? '';
        $this->city = $args['city'] ?? '';
        $this->company_name = $args['company_name'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->company_logo = $args['company_logo'] ?? '';
    }

    public static function create() {
        global $pdo;
        $sql = "INSERT INTO companies (username, city, company_name, password) VALUES ('$username', '$city', '$company_name', MD5('$password'))";
        $pdo->exec($sql);
    }

    public static function get_companies()
    {
        global $pdo;
        $companies = [];

        $sql = "SELECT * FROM companies";
        $result = $pdo->query($sql, PDO::FETCH_ASSOC);
    }

    public static function delete_user($user_id) {
        global $pdo;
        $sql = "DELETE FROM companies WHERE id='$user_id'";
        $pdo->exec($sql);
    }
}

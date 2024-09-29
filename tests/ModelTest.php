<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . "/../Utils/common.php";

use Model\Model;

class UserTest extends Model
{
    /** @var INT */
    public $id;

    /** @var VARCHAR */
    public $name = ''; // VARCHAR by default

    /** @var VARCHAR */
    public $email = '';

    /** @var INT */
    public $age;

    /** @var DATE */
    public $birthdate;

    /** @var DATETIME */
    public $created_at;

    public function __construct()
    {
        parent::__construct(); // Call parent constructor to initialize fields
        $this->tableName = "users"; // Optionally, set the table name explicitly
        $this->primaryKey = "id"; // Set the primary key explicitly if different
    }
}

class PostTest extends Model
{
    /** @var INT */
    public $id;

    /** @var VARCHAR */
    public $title = '';

    /** @var TEXT */
    public $content;

    /** @var INT */
    public $user_id; // Foreign key to UserTest

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "posts";
        $this->primaryKey = "id";
        $this->FOREIGN_KEY("user_id", "users", "id"); // Define foreign key relationship
    }
}

class DBD
{
    private $connection;

    public function __construct($host, $user, $pass, $dbname)
    {
        $this->connection = new \mysqli($host, $user, $pass, $dbname);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function execute($sql)
    {
        if ($this->connection->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->connection->error;
            return false;
        }
    }

    public function __destruct()
    {
        $this->connection->close();
    }
}

$user = new UserTest();
$post = new PostTest();

$sqlUser = $user->generateCreateTableSQL();
$sqlPost = $post->generateCreateTableSQL();

$db = new DBD('localhost', 'root', 'root', 'test_db'); // Replace with your DB credentials
$db->execute($sqlUser);
$db->execute($sqlPost);

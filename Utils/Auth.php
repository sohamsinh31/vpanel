<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/Utils/db.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Utils/User.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Utils/constants.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Utils/ApiHandler.php";

class AuthHandler
{
    private $db;
    public int $toVerify = 0;

    public function __construct()
    {
        $this->db = new DB();
    }


    public function save($parameters)
    {
        // Check if the specified model class exists
        if (!class_exists(AUTH_MODEL)) {
            throw new Exception('Model class does not exist');
        }

        // Create a new instance of the specified model class
        $user = new User($parameters);

        // Check if the user already exists
        $existingUser = $this->check_user($parameters);
        if ($existingUser) {
            $this->respondWithError("User already exists");
            return;
        }

        // Prepare insert query
        $columns = [];
        $placeholders = [];
        $values = [];

        foreach ($parameters as $key => $value) {
            if ($value !== null) {
                $columns[] = $key;
                $placeholders[] = '?';
                $values[] = $value;
            }
        }

        $apiHandler = new ApiHandler(AUTH_TABLE);
        $requestData = $apiHandler->extractData();

        $email = isset($requestData['email']) ? $requestData['email'] : '';
        $name = isset($requestData['username']) ? $requestData['username'] : '';
        if ($email != '' && $name != '' && $this->toVerify) {
            $apiHandler->verifyEmail($email, $name);
        }

        $columnsStr = implode(', ', $columns);
        $placeholdersStr = implode(', ', $placeholders);
        $query = "INSERT INTO " . AUTH_TABLE . " ($columnsStr) VALUES ($placeholdersStr)";

        // Execute the query
        $conn = $this->db->connect();
        if (!$conn) {
            $this->respondWithError("Connection unsuccessful");
            return;
        }

        $stmt = $conn->prepare($query);
        if (!$stmt) {
            $this->respondWithError("Failed to prepare statement");
            return;
        }

        // Bind parameters
        $types = str_repeat('s', count($values)); // Assuming all values are strings
        $stmt->bind_param($types, ...$values);

        if ($stmt->execute()) {
            $this->respondWithData(array("message" => "User registered successfully"));
        } else {
            $this->respondWithError("Failed to register user");
        }
    }


    protected function check_user($parameters)
    {
        $query = "SELECT * FROM " . AUTH_TABLE . " WHERE ";
        $conditions = [];
        $values = [];

        foreach ($parameters as $key => $value) {
            $conditions[] = "$key=?";
            $values[] = $value;
        }

        $query .= implode(' AND ', $conditions);
        // echo $query; // For debugging purposes

        $conn = $this->db->connect();
        if ($conn) {
            $stmt = $conn->prepare($query);
            if (!$stmt) {
                $this->respondWithError("Failed to prepare statement");
                return false;
            }

            $types = str_repeat('s', count($values));
            $stmt->bind_param($types, ...$values);

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $userData = $result->fetch_assoc();
                return new User($userData);
            } else {
                return null;
            }
        } else {
            $this->respondWithError("Connection unsuccessful");
            return null;
        }
    }

    //user login
    public function authenticate($parameters)
    {
        if (!class_exists(AUTH_MODEL)) {
            return;
        }

        // Only pass the provided parameters to the User constructor
        $user = new User($parameters);

        // Check if the user exists in the database
        $existingUser = $this->check_user($parameters);
        if ($existingUser) {
            $userArray = $existingUser->toArray();
            unset($userArray["password"]); // Remove the password
            $this->respondWithData($userArray); // Send the modified array in the response
            if (session_status() == PHP_SESSION_NONE) {
                ini_set('session.gc_maxlifetime', 2592000);  // 30 days
                ini_set('session.cookie_lifetime', 2592000);  // 30 days
                session_start();
            }
            $_SESSION['user'] = serialize($existingUser);
        } else {
            $this->respondWithError("User not found!");
        }
    }



    public function isAuthenticated()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['user']);
    }

    public function getAuthenticatedUser()
    {
        if ($this->isAuthenticated()) {
            $user = unserialize($_SESSION["user"]);
            if ($user) {
                return $user->toArray();
            } else {
                echo "Error: Unable to unserialize user data!";
            }
        } else {
            echo "Not logged in!";
        }
        return null;
    }

    public function logoutUser()
    {
        session_start();
        session_unset();
        session_destroy();
        $this->respondWithData(array("message" => "User logged out successfully"));
    }

    public function respondWithData($data)
    {
        if (isset($_SERVER['CONTENT_TYPE']) && $_SERVER['CONTENT_TYPE'] === 'application/json') {
            $this->respondWithJson($data);
        } else {
            $this->respondWithString($data);
        }
    }

    public function respondWithJson($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function respondWithHtml($data)
    {
        header('Content-Type: text/html');
        echo $data;
    }

    public function respondWithString($data)
    {
        echo is_array($data) ? json_encode($data) : $data;
    }

    public function respondWithError($message)
    {
        $errorResponse = array("error" => $message);
        $this->respondWithData($errorResponse);
    }
}

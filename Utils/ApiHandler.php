<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/Utils/constants.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Utils/db.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Utils/Auth.php";
require $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class ApiHandler
{
    protected $db;
    protected $authKey;
    protected $table;
    public string $email;
    public string $password;

    public int $toVerify = 0;

    public int $toAutherize = 1;

    public function __construct($tableName)
    {
        $this->db = new DB();
        $this->authKey = API_KEY;
        $this->table = $tableName;
    }

    public function handleRequest()
    {
        $this->autherize();

        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
                $this->handleGetRequest();
                break;
            case 'POST':
                $this->handlePostRequest();
                break;
            case 'PUT':
                $this->handlePutRequest();
                break;
            case 'DELETE':
                $this->handleDeleteRequest();
                break;
            default:
                $this->respondWithError("Invalid request method");
                break;
        }
    }

    protected function autherize(string $apikey = null): void
    {
        if ($this->toAutherize) {
            // Check for the API key in the request headers
            $providedApiKey = isset($_SERVER['HTTP_X_AUTHORIZATION']) ? trim($_SERVER['HTTP_X_AUTHORIZATION']) : '';

            if ($apikey)
                $providedApiKey = $apikey;

            if ($providedApiKey !== $this->authKey) {
                $this->respondWithError('Unauthorized');
                exit(); // Terminate execution
            }
        }
    }

    protected function setSubject(): string
    {
        return "Verify to Sakshamta PPSU platform have a great journy!";
    }

    protected function setBody($email): string
    {
        return EMAIL_TEMPLATE1 . urlencode($email) . "&type=" . $this->table . EMAIL_TEMPLATE2;
    }

    public function verifyEmail($email, $name)
    {
        $conn = $this->db->connect();

        // Fetch email and password from the superuser table
        $superuserQuery = "SELECT email, password FROM superuser";
        $superuserResult = $conn->query($superuserQuery);

        if ($superuserResult && $superuserResult->num_rows > 0) {
            $superuserData = $superuserResult->fetch_assoc();

            $mail = new PHPMailer(true);

            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

            $mail->isSMTP();
            $mail->SMTPAuth = true;

            $mail->Host = "smtp.gmail.com";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->Username = $superuserData["email"];
            $mail->Password = $superuserData["password"];

            $mail->setFrom($superuserData["email"], 'Sohamsinh Borasia');
            $mail->addAddress($email, $name);

            // Set subject and body (you need to define $subject and $message)
            $mail->isHTML(true);
            $mail->Subject = $this->setSubject();
            $mail->Body = $this->setBody($email);

            // Send the email
            $mail->send();
        } else {
            $this->respondWithError("Failed to fetch superuser data");
        }
    }

    public function extractData()
    {
        $contentType = $_SERVER['CONTENT_TYPE'];
        $requestData = '';

        if ($contentType === 'application/json') {
            $requestData = json_decode(file_get_contents("php://input"), true);
        } elseif ($contentType === 'application/x-www-form-urlencoded') {
            $requestData = $_POST;
        } else {
            $this->respondWithError("Unsupported content type");
            return false;
        }

        return $requestData;
    }

    protected function handleGetRequest()
    {
        $conn = $this->db->connect();

        if ($conn) {
            $result = $conn->query("SELECT * FROM $this->table");

            if ($result === false) {
                $this->respondWithError("Query execution failed: " . $conn->error);
                return;
            }

            $data = $result->fetch_all(MYSQLI_ASSOC);
            $this->respondWithJson($data);
        } else {
            $this->respondWithError("Connection unsuccessful");
        }
    }

    protected function createInsertQuery($data)
    {
        $columns = array_keys($data);
        $values = array_values($data);

        $columnsList = implode(', ', $columns);
        $valuesList = "'" . implode("', '", $values) . "'";

        $query = "INSERT INTO $this->table ($columnsList) VALUES ($valuesList)";

        return $query;
    }

    public function customPost($data)
    {
        $conn = $this->db->connect();

        if ($conn) {
            if (!isset($data)) {
                return $this->respondWithError("Data is not provided");
            }
            $query = $this->createInsertQuery($data);
            $escapedData = $this->escapeData($conn, $data);

            $q = $conn->query(vsprintf($query, $escapedData));

            if ($q) {
                $this->respondWithJson(array("message" => "Data added successfully"));
            } else {
                $this->respondWithError("Failed to add data");
            }
        } else {
            $this->respondWithError("Connection unsuccessful");
        }
    }

    protected function handlePostRequest()
    {
        $conn = $this->db->connect();

        if ($conn) {
            $requestData = $this->extractData();

            if (!$requestData) {
                return;
            }

            // Extract email and name from requestData
            $email = isset($requestData['email']) ? $requestData['email'] : '';
            $name = isset($requestData['name']) ? $requestData['name'] : '';

            // Call verifyEmail function with the extracted email
            if ($email != '' && $name != '' && $this->toVerify) {
                $this->verifyEmail($email, $name);
            }

            $insertQuery = $this->createInsertQuery($requestData);

            $escapedData = $this->escapeData($conn, $requestData);

            $q = $conn->query(vsprintf($insertQuery, $escapedData));

            if ($q) {
                $this->respondWithJson(array("message" => "Data added successfully"));
            } else {
                $this->respondWithError("Failed to add data");
            }
        } else {
            $this->respondWithError("Connection unsuccessful");
        }
    }

    protected function createUpdateQuery($data)
    {
        // Exclude 'id' from the columns
        $id = $data['id'];
        unset($data['id']);

        $columns = array_keys($data);
        $values = array_values($data);

        $assignments = array_map(function ($column, $value) {
            return "$column = '$value'";
        }, $columns, $values);

        $setClause = implode(', ', $assignments);

        $query = "UPDATE $this->table SET $setClause WHERE id='$id'";

        return $query;
    }

    protected function handlePutRequest()
    {
        $conn = $this->db->connect();

        if ($conn) {
            $requestData = $this->extractData();

            if (!$requestData) {
                return; // Error already handled in processRequestData
            }

            $updateQuery = $this->createUpdateQuery($requestData);

            $escapedData = $this->escapeData($conn, $requestData);

            $q = $conn->query(vsprintf($updateQuery, $escapedData));

            if ($q) {
                $this->respondWithJson(array("message" => "Data updated successfully"));
            } else {
                $this->respondWithError("Failed to update data");
            }
        } else {
            $this->respondWithError("Connection unsuccessful");
        }
    }

    protected function handleDeleteRequest()
    {
        $conn = $this->db->connect();

        if ($conn) {
            $query = "DELETE FROM $this->table WHERE id='%s'";
            $requestData = $this->extractData();

            if ($requestData === false) {
                return; // Error already handled in extractDataFromRequest
            }
            // Get the ID from the data
            $id = $requestData['id'];

            // Build the final query
            $queryString = sprintf($query, $id);

            $q = $conn->query($queryString);

            if ($q) {
                $this->respondWithJson(array("message" => "Data deleted successfully"));
            } else {
                $this->respondWithError("Failed to delete data");
            }
        } else {
            $this->respondWithError("Connection unsuccessful");
        }
    }

    public function customDelete($query)
    {
        $conn = $this->db->connect();
        if ($conn) {
            $querys = "DELETE FROM $this->table WHERE " . $query;
            $q = $conn->query($querys);

            if ($q) {
                $this->respondWithJson(array("message" => "Data deleted successfully"));
            } else {
                $this->respondWithError("Failed to delete data");
            }
        } else {
            $this->respondWithError("Connection unsuccessfull");
        }
    }

    public function customGetQuery($query)
    {
        $this->autherize();
        $conn = $this->db->connect();

        if ($conn) {
            $result = $conn->query($query);

            if ($result === false) {
                $this->respondWithError("Query execution failed: " . $conn->error);
                return;
            }

            $data = $result->fetch_all(MYSQLI_ASSOC);
            $this->respondWithJson($data);
        } else {
            $this->respondWithError("Connection unsuccessful");
        }
    }

    public function exportDataAsCsv(string $query = null, string $apikey = null)
    {
        $this->autherize($apikey);
        $conn = $this->db->connect();

        if ($conn) {
            $result = $conn->query($query ? $query : "SELECT * FROM $this->table");

            if ($result === false) {
                $this->respondWithError("Query execution failed: " . $conn->error);
                return;
            }

            $data = $result->fetch_all(MYSQLI_ASSOC);

            // Set headers to force download the CSV file
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $this->table . '_data.csv"');

            // Open a file pointer to php://output with write access
            $output = fopen('php://output', 'w');

            // Write CSV headers excluding the 'password' column if it exists
            $headers = array_keys($data[0]);
            if (($key = array_search('password', $headers)) !== false) {
                unset($headers[$key]);
            }
            fputcsv($output, $headers);

            // Write CSV rows excluding the 'password' column if it exists
            foreach ($data as $row) {
                if (array_key_exists('password', $row)) {
                    unset($row['password']); // Remove 'password' column from the row
                }
                fputcsv($output, $row);
            }

            // Close the file pointer
            fclose($output);

            // Terminate execution
            exit();
        } else {
            $this->respondWithError("Connection unsuccessful");
        }
    }


    protected function escapeData($conn, $data)
    {
        $escapedData = [];

        foreach ($data as $key => $value) {
            $escapedData[$key] = $conn->real_escape_string($value);
        }

        return $escapedData;
    }

    protected function respondWithJson($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function respondWithError($message)
    {
        $errorResponse = array("error" => $message);
        $this->respondWithJson($errorResponse);
    }
}

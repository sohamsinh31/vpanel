<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once $_SERVER["DOCUMENT_ROOT"] . "/Utils/common.php";
$router = new Utils\Router();
$auth = new AuthHandler();

class API_controller
{
    public $toVerify = 1;
    public function __construct()
    {
        $auth = new AuthHandler();
        if (!($auth->isAuthenticated()) && $this->toVerify) {
            header("location: /api/auth/login.php");
        }
    }

    public function check_permissions($name, $table)
    {
        global $auth;
        if ($auth->isAuthenticated() && $this->toVerify) {
            $role = $auth->getAuthenticatedUser()["role"];
            $permissions = $auth->getAuthenticatedUser()["permissions"];
            $perm_arr = explode(",", $permissions);
            echo PHP_EOL . (array_intersect($perm_arr, $name) == $name) . PHP_EOL;

            if (in_array($name, $perm_arr)) {
                echo "User have this permissions: " . $name . PHP_EOL;
            }
            // var_dump($perm_arr);
            // echo PHP_EOL . $role . " " . $permissions;
        }
    }

    public function test_roles($parameters, $queryParameters)
    {
        $this->check_permissions(["read", "write"], "users");
    }

    function handleAbout($parameters, $queryParameters)
    {
        global $auth;
        $aboutHandler = new ApiHandler("about");
        echo $queryParameters;
        if (!empty($parameters)) {
            // $aboutHandler->customGetQuery("SELECT * FROM about WHERE id = {$parameters[0]}");
        } else {
            $aboutHandler->handleRequest();
            echo "Working";
        }
    }

    function handleGetUser($parameters, $queryParameters)
    {
        global $auth;
        header('Content-Type: application/json');
        echo json_encode($auth->getAuthenticatedUser());
    }

    function handleCategories($parameters, $queryParameters)
    {
        $categoriesApiHandler = new ApiHandler("categories");
        $categoriesApiHandler->handleRequest();
    }

    function handleAssets($parameters, $queryParameters)
    {
        include_once("AssetHandler.php");
    }

    function handle_users($parameters, $queryParameters)
    {
        // var_dump($queryParameters);
        $courseAPI = new ApiHandler("users");
        if ($queryParameters == "export=true") {
            $courseAPI->toAutherize = false;
            $courseAPI->exportDataAsCsv();
        } else {
            $courseAPI->handleRequest();
        }
    }

    function handle_announcements($parameters, $queryParameters)
    {
        $annAPI = new ApiHandler("announcements");
        if ($queryParameters == "export=true") {
        } else {
            $annAPI->handleRequest();
        }
    }

    function handle_chapters($parameters, $queryParameters)
    {
        $annAPI = new ApiHandler("chapters");
        if ($queryParameters == "export=true") {
        } else {
            $annAPI->handleRequest();
        }
    }

    function handle_subchapters($parameters, $queryParameters)
    {
        $annAPI = new ApiHandler("chapters");
        if ($queryParameters == "export=true") {
        } else {
            $annAPI->handleRequest();
        }
    }

    function handle_videos($parameters, $queryParameters)
    {
        $annAPI = new ApiHandler("videos");
        if ($queryParameters == "export=true") {
        } else {
            $annAPI->handleRequest();
        }
    }

    function handle_enrollments($parameters, $queryParameters)
    {
        $enrollAPI = new ApiHandler("enrollments");
        if ($queryParameters) {
            $enrollAPI->customGetQuery("SELECT * FROM enrollments WHERE " . $queryParameters);
        } else {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $post = $enrollAPI->extractData();
                global $auth;
                $arr = [
                    "courseid" => $post["cid"],
                    "userid" => $auth->getAuthenticatedUser()["id"]
                ];
                $enrollAPI->customPost($arr);
            } else {
                $enrollAPI->handleRequest();
            }
        }
    }

    function handle_enrolled($parameters, $queryParameters)
    {
        $enrollAPI = new ApiHandler("enrollments");
        global $auth;
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if ($queryParameters) {
                $enrollAPI->customGetQuery("SELECT * FROM enrollments WHERE " . $queryParameters . " AND userid='" . $auth->getAuthenticatedUser()["id"] . "'");
            } else {
                // $enrollAPI->
            }
        } else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            $data = $enrollAPI->extractData();
            $enrollAPI->customDelete('courseid=' . $data['courseid'] . ' AND userid=' . $auth->getAuthenticatedUser()['id']);
        }
    }

    function handle_about($parameters, $queryParameters)
    {
        $annAPI = new ApiHandler("about"); // to be implemented by sir
    }

    function handle_courses($parameters, $queryParameters)
    {
        $courseAPI = new ApiHandler('courses');
        $category = isset($_GET['cid']) ? $_GET['cid'] : -1;

        if ($category != -1) {
            // Handle the case when $category is 0 separately
            if ($category == 0) {
                $courseAPI->customGetQuery("SELECT t1.*, t3.name FROM courses AS t1, categories AS t2, teacher AS t3 WHERE t1.cateid = t2.id AND t1.uid = t3.id");
            } else {
                $courseAPI->customGetQuery("SELECT t1.*, t3.name FROM courses AS t1, categories AS t2, teacher AS t3 WHERE t1.cateid = t2.id AND t1.uid = t3.id AND t2.id = '{$category}'");
            }
        } else {
            $courseAPI->handleRequest();
        }
    }

    public function handle_course_users($parameters, $queryParameters)
    {
        $courseAPI = new ApiHandler("users");
        $cid = isset($_GET["cid"]) ? $_GET["cid"] : -1;
        if ($cid != -1) {
            $courseAPI->customGetQuery("SELECT t1.* from users as t1 , enrollments as t2 WHERE t2.userid=t1.id AND t2.courseid='$cid'");
        }
    }


    function handle_teacher_ordered($parameters, $queryParameters)
    {
        $teacherAPI = new ApiHandler("teacher");
        $teacherAPI->customGetQuery(<<<EOD
SELECT
*
FROM
teacher
ORDER BY
approved ASC, created DESC;
EOD);
    }
}

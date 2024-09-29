<?php

require $_SERVER["DOCUMENT_ROOT"] . "/Utils/common.php";

$categoriesApiHandler = new ApiHandler("about");
$categoriesApiHandler->handleRequest();
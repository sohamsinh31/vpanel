<?php

define('API_KEY', '1234');
define('ALLOWED_ORIGINS', ['http://122.170.190.175:3000', 'http://localhost:3000','http://127.0.0.1','http://192.168.221.123:3000','http://192.168.221.123','http://localhost']);
define('CORS_HEADERS', 'Content-Disposition, Accept-Encoding, Content-Type, Accept, Origin, Authorization, X-Authorization, Redirect, X-CSRFToken');
define('CORS_METHODS', 'GET, POST, PUT, PATCH, DELETE, OPTIONS');
define('CORS_CREDENTIALS', 'true');
define('STORAGE', '/storage/assets/');
define('AUTH_TABLE', "users");
define('AUTH_MODEL', "User");

// Function to get the allowed origin
function getAllowedOrigin($server) {
    if (isset($server['HTTP_ORIGIN'])) {
        $origin = $server['HTTP_ORIGIN'];
        if (in_array($origin, ALLOWED_ORIGINS)) {
            return $origin;
        }
    }
    return '';
}

// // Handle preflight OPTIONS request
// if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
//     $allowedOrigin = getAllowedOrigin($_SERVER);
//     if ($allowedOrigin) {
//         header("Access-Control-Allow-Origin: " . $allowedOrigin);
//         header("Access-Control-Allow-Headers: " . CORS_HEADERS);
//         header("Access-Control-Allow-Methods: " . CORS_METHODS);
//         header("Access-Control-Allow-Credentials: " . CORS_CREDENTIALS);
//     } else {
//         header("HTTP/1.1 403 Forbidden");
//         echo 'Origin not allowed';
//     }
//     exit();
// }

// // Handle actual request
// $allowedOrigin = getAllowedOrigin($_SERVER);
// if ($allowedOrigin) {
//     header("Access-Control-Allow-Origin: " . $allowedOrigin);
//     header("Access-Control-Allow-Headers: " . CORS_HEADERS);
//     header("Access-Control-Allow-Methods: " . CORS_METHODS);
//     header("Access-Control-Allow-Credentials: " . CORS_CREDENTIALS);
// } else {
//     header("HTTP/1.1 403 Forbidden");
//     echo 'Origin not allowed';
// }


$serverName = $_SERVER['SERVER_NAME'];
$port = $_SERVER['SERVER_PORT'];

$portStr = (($port == 80 || $port == 443) ? '' : ":$port");

$verificationLink = "http://$serverName$portStr/api/verify/index.php?email=";


$headerImage = "https://www.ppsu.ac.in/img/logo.png";
$footerImage = "https://www.ppsu.ac.in/img/logo.png";

$address = "
            <tr>
                <td><span class='fa fa-map-marker'></span></td>
                <td>
                    <p><b>Campus Address</b><br>
                        <p>NH48, GETCO, Near Biltech Company, Dhamdod Village,<br>
                        Mangrol, Kosamba, Surat,<br>
                        394125</p>
                    </p>
                </td>
            </tr>
            <tr>
                <td><span class='fa fa-phone'></span></td>
                <td><p>Admission Contact Number<br><b>9512035619</b><br></p></td>
            </tr>
            <tr>
                <td><span class='fa fa-envelope'></span></td>
                <td><p>info@ppsu.ac.in</p></td>
            </tr>
        ";

$schools = "
            <div class='col-lg-6 col-md-6 col-sm-6 quick-links'>
                <div class='row'>
                    <div class='col-lg-5 col-md-5 col-sm-5'>
                        <h5>PPSU Schools</h5>
                        <div class='footer-schools'>
                            <ul>
                                <li style='list-style-type:none;font-weight:600'>Engineering, Computers, Architecture &amp; Design</li>    
                                <li><a href='https://www.ppsu.ac.in/soe'>Engineering</a></li>
                                <li><a href='https://www.ppsu.ac.in/soe/Computer-Science-Engineering'>Computers</a></li>
                                <li><a href='https://www.ppsu.ac.in/soa'>Architecture</a></li>
                                <li><a href='https://www.ppsu.ac.in/sod'>Design</a></li>
                            </ul>
                            <ul>
                                <li style='list-style-type:none;font-weight:600'>Liberal Arts, Sciences &amp; Management Studies</li>
                                <li><a href='https://www.ppsu.ac.in/slm'>Liberal Arts</a></li>
                                <li><a href='https://www.ppsu.ac.in/sos'>Sciences</a></li>
                                <li><a href='https://www.ppsu.ac.in/slm'>Management Studies</a></li>
                            </ul>
                        </div>
                    </div>    
                    <div class='col-lg-4 col-md-4 col-sm-4'>
                        <div class='footer-schools'>
                            <ul class='right footeragriculture'>
                                <li><a href='https://www.ppsu.ac.in/agriculture'>Agriculture</a></li>
                                <li><a href='https://www.ppsu.ac.in/son'>Nursing</a></li>
                                <li><a href='https://www.ppsu.ac.in/sop'>Physiotherapy</a></li>
                                <li><a href='https://www.ppsu.ac.in/soh/soh-s'>P P Savani Homoeopathic Medical College &amp; Hospital</a></li>
                                <li><a href='https://www.ppsu.ac.in/sopharm'>Pharmacy</a></li>
                                <li><a href='https://www.ppsu.ac.in/cce'>Public Health </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        ";

$socialLinks = "
            <h5>Quick Links</h5>
            <ul>
                <li><a href='https://www.ppsu.ac.in/admission'>Admissions</a></li>
                <li><a href='https://www.ppsu.ac.in/hostelFacility'>Hostel Facilities</a></li>
                <li><a href='https://www.ppsu.ac.in/library'>Library</a></li>
            </ul>
            <p>&nbsp;</p>
            <h5>Connect With Us</h5>
            <ul class='flx'>
                <li><a href='https://www.facebook.com/ppsuni' target='_blank' aria-label='facebook'><span class='fa fa-facebook'></span></a></li>
                <li><a href='https://twitter.com/ppsavaniuni' target='_blank' aria-label='Twitter'><span class='fa fa-twitter'></span></a></li>
                <li><a href='https://www.instagram.com/ppsavaniuniversity/' target='_blank' aria-label='instagram'><span class='fa fa-instagram'></span></a></li>
                <li><a href='https://www.linkedin.com/school/p-p-savani-university' target='_blank' aria-label='linkedin'><span class='fa fa-linkedin'></span></a></li>
                <li><a href='https://www.youtube.com/ppsavaniuniversityofficial' target='_blank' aria-label='youtube'><span class='fa fa-youtube-play'></span></a></li>
            </ul>
        ";

$footer = "
            <div class='footer-bottom'>
                <span>© 2024 All Rights Reserved. <a href='https://www.ppsu.ac.in/'>P P Savani University, Surat</a> (Sponsoring Body: P P Savani Knowledge City)</span><br><br>
                <span><a href='https://www.ppsu.ac.in/PrivacyPolicy' target='_blank'>Privacy Policy</a> | <a href='https://www.ppsu.ac.in/termsandconditions' target='_blank'>Terms and Condition</a> | <a href='#' data-toggle='modal' data-target='#refundpolicy'>Refund Policy</a></span>
            </div>
        ";

$mail = "
            <html>
            <head>
                <style>
                    .footer-top {
                        background-color: #fdcebf;
                        padding: 25px 0 15px;
                    }
                    .body-content {
                        text-align: center;
                        background-color: #f1e4f7;
                    }

                    .header {
                        background-color: #f1e4f7;
                    }
    
                    button {
                        display: inline-block;
                        padding: 15px 30px;
                        font-size: 18px;
                        background-color: #4CAF50; /* Green color */
                        color: white;
                        border: none;
                        border-radius: 5px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        margin: 4px 2px;
                        cursor: pointer;
                    }
                </style>
            </head>
            <body>
                <div class='header'>
                    <img src='{$headerImage}' alt='PPSU logo' style='max-width: 100%;'>
                </div>
    
                <div class='body-content'>
                    <p>Here is your <strong><b> SAKSHAMTA PPSU </b></strong> verification link. Click the button to verify your email: </p>
                    <a href='{$verificationLink}";

$mail2 = "                  
                    '><button>Verify Email</button></a>
                    </div>
    
                <div class='footer-top'>
                    <div class='container'>
                        {$address}
                        {$schools}
                        {$socialLinks}
                    </div>
                </div>
    
                {$footer}
            </body>
            </html>
        ";

define('EMAIL_TEMPLATE1', $mail);
define('EMAIL_TEMPLATE2', $mail2);

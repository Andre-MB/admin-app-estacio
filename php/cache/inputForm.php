<?php
include("../registerUser.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $inputData = file_get_contents("php://input");

    $urldecode  = urldecode($inputData);

    $jsonDataString = substr($urldecode, strpos($urldecode, "=") + 1);

    $jsonDecode = json_decode($jsonDataString, true);

    $keysInput = [];
    $nameCookie = "";

    if(array_key_exists('JSONData', $jsonDecode)) {
        if (array_key_exists('stepForm', $jsonDecode)) {
            if($jsonDecode['stepForm'] === "formStep1") {
                $nameCookie = "userForm1";
                $keysInput = ["user_complete_name", "user_mail", "user_register", "user_date"];
            } else if($jsonDecode['stepForm'] === "formStep3") {
                $nameCookie = "userForm3";
                $keysInput = ["user_period"];
            }
        }

        $cookieValuesForm = [];

        foreach ($keysInput as $key) {
            if (isset($jsonDecode["JSONData"][$key])) {
                $cookieValuesForm[$key] = $jsonDecode["JSONData"][$key];
            }
        }
        print_r($cookieValuesForm);

        $valuesFormDecode = json_encode($cookieValuesForm);

        setcookie($nameCookie, $valuesFormDecode, time() + (60 * 60), "/pages/formStep1.php", false, false);
    }
}
?>
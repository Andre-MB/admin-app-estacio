<?php
    function setSessionUserData($decodeData, $inputKeys) {
        foreach($inputKeys as $key) {
            if(isset($decodeData[$key])) {
                $_SESSION[$key] = $decodeData[$key];
            }
        }
    }
    function insertUserData($tblName, $decodeData, $pg_conn) {
        $userInputForm = json_decode($_POST[$decodeData], true);

        $user_name_complete = $userInputForm["formStep1"]["user_complete_name"];
        $user_mail = $userInputForm["formStep1"]["user_mail"];
        $user_passw = $userInputForm["formStep1"]["user_passw"];
        $user_register = $$userInputForm["formStep1"]["user_register"];
        $user_date = $userInputForm["formStep1"]["user_date"];
        $token_user = $_SESSION['tokenUser'];

        $user_period = $userInputForm["formStep2"]["user_period"];

        $user_about = $userInputForm["formStep4"]["user_about"];
        $user_role = $userInputForm["formStep4"]["user_role"];

        $user_birthday = new DateTime($user_date);

        $current_date = new DateTime();

        $age = $current_date->diff($user_birthday);

        $sql = "INSERT INTO tbl_user(exp_id, address_id, name_user, email_user, password_user, age_user, period_user, about, role_user, token_user) 
        VALUES (NULL, NULL, :user_name_complete, :user_mail, :user_passw, :age, :user_period, :user_about, :user_role, :token_user)";

        $stmt = $pg_conn->prepare($sql);

        $stmt->bindParam(':user_name_complete', $user_name_complete, PDO::PARAM_STR);
        $stmt->bindParam(':user_mail', $user_mail, PDO::PARAM_STR);
        $stmt->bindParam(':user_passw', $user_passw, PDO::PARAM_STR);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);
        $stmt->bindParam(':user_period', $user_period, PDO::PARAM_INT);
        $stmt->bindParam(':user_about', $user_about, PDO::PARAM_STR);
        $stmt->bindParam(':user_role', $user_role, PDO::PARAM_STR);
        $stmt->bindParam(':token_user', $token_user, PDO::PARAM_STR);

        $stmt->execute();
    }
?>
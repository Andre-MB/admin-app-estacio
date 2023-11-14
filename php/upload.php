<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES["imageUser"]) && $_FILES["imageUser"]["error"] == UPLOAD_ERR_OK) {
            $targetDir = "../upload/" . $_SESSION['tokenUser'] . "/";

            $targetFile = $targetDir . basename($_FILES["imageUser"]["name"]);

            if($targetFile != $_SESSION["last_image"]) {

                if (!file_exists($targetDir) && !is_dir($targetDir)) {
                    if (mkdir($targetDir, 0755, true)) {
                        echo 'Directory created successfully';
                    } else {
                        echo 'Failed to create directory';
                        exit();
                    }
                }
                
                $existingFiles = glob($targetDir . "*");

                foreach ($existingFiles as $file) {
                    if (is_file($file)) {
                        unlink($file);
                    }
                }

                if (move_uploaded_file($_FILES["imageUser"]["tmp_name"], $targetFile)) {
                    setcookie("user_image", $targetFile, time() + (60 * 60), "/pages/formStep1.php", false, false);
                    $_SESSION["last_image"] = $targetFile;
                } else {
                    echo "Error moving upload file!";
                    exit();
                }
        } else {
            exit();
        }
    }
}
?>

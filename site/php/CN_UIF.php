<?php
include "connection.php";
// Include the database configuration file
$statusMsg = '';

// File upload path
$targetDir = "images/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    $uisim=$_POST["urun_isim"];
    $umarka=$_POST["urun_marka"];
    $ukid=$_POST["urun_kategori_id"];
    $uaciklama=$_POST["urun_aciklama"];

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){

    $allowTypes = array('jpg','png','jpeg','gif','pdf',"jfif");
    if(in_array($fileType, $allowTypes)){

        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){

            $insert = $baglanti->query("INSERT INTO urun(uid, uisim, umarka, kategori_id, hakkinda, resim) values(null, '$uisim', '$umarka', 2, '$uaciklama', '$targetFilePath')");
            header("location:store.php");
            if($insert)
            {
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }
            else
            {
                $statusMsg = "File upload failed, please try again.";
            } 
        }
        else
        {
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }
    else
    {
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}
else
{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>
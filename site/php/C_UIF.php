<?php

$targetFilePath="";

$statusMsg = '';


$targetDir = "images/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"]))
{
    echo "gae";
    $uisim=$_POST["urun_isim"];
    $umarka=$_POST["urun_marka"];
    $ukid=$_POST["urun_kategori_id"];
    $uaciklama=$_POST["urun_aciklama"];
    
    
    
    
    
    
    $allowTypes = array('jpg','png','jpeg','gif','pdf',"jfjf");
    if(in_array($fileType, $allowTypes)){
        
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
        {
            $sql = mysqli_query($baglanti, "INSERT INTO urun(uid, uisim, umarka, kategori_id, hakkinda, resim) values(null, '$uisim', '$umarka', 2, '$uaciklama', '$targetFilePath')" );
            
            
            /*if($sql)
            {
                $statusMsg=$filename."yüklendi!";
            }
            else
            {
                $statusMsg="Resim yüklenemedi tekrar deneyiniz.";
            } */
        }
        else
        {
            $statusMsg = "Resminiz yüklenirken bir hata oluştu.";
        }
    }
    else
    {
        $statusMsg = 'Lütfen dosya türünüzün JPG, PNG, JPEG, GIF olduğuna emin olunuz.';
    }
}
else
{
    $statusMsg = 'Lütfen yüklenecek dosyayı seçin...';
}

?>
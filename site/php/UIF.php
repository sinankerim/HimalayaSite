<?PHP
#UPLOAD IMAGE FUNCTIONS
$status="";

$Utarget="images/";

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"]))
{
        $filename = basename($_FILES["file"]["name"]);
        $targetFilePath = $Utarget.$filename;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSIONS);
        
        $_SESSION["uye_adi"]=$targetFilePath;

        $allowTypes=array("jpg","png","jpeg","gif");
        if(in_array($fileType, $allowTypes))
        {
            $insert = $baglanti->query("");
            if($insert)
            {
                $status=$filename."yüklendi!";


                //veri tabanına "$targetFilePath" kaydedilecek
                //resim de images içine kaydedilecek
 
        }
        else
        {
            $status="Resminiz yüklenirken bir hata oluştu.";
            
        }
    }
    else
    {
        $status="Lütfen dosya türünüzün JPG, PNG, JPEG, GIF olduğuna emin olunuz.";
    }
}
else
{
    $status="Lütfen bir dosya seçiniz";
}


?>
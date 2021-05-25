<?php
        #urun bilgilerini de bu sayfada al
    
        echo "0";
    if(isset($_POST["but_upload"])){
 
        echo "1";
        $name = $_FILES['file']['name'];
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
      
        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
          // Upload file
          echo "2";
          if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
             // Convert to base64 
             echo "3";
             $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
             $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
             // Insert record
             $query = "SQL SORGUSU BURAYA";
             mysqli_query($baglanti,$query);

             $_SESSION["uye_adi"]=$image;
          }
          
        }
       
      }
?>
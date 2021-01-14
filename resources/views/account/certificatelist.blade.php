<!-- <html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>č s š Š</title>
</head>
<body> -->
<?php 

header('content-type:image/jpeg');
$font =  realpath('BRUSHSCI.ttf');
?>

<?php
$images = storage_path('app/public/maxresdefault.jpg');
//$images = realpath('maxresdefault.jpg');
 $image = imagecreatefromjpeg($images);

 $color = imagecolorallocate($image, 19, 21, 22);
 $name = "Al";
 imagettftext($image, 40, 0, 700, 400, $color, $font, $name);
 $file = time().'_'.'1';
 //imagejpeg($image,storage_path('app/public/certificate/'.$file.'.jpg'));
/*$url = $_SERVER['REQUEST_URI'];*/
 imagejpeg($image,storage_path('app/public/certificate/'.$file.'.jpg'));
 //imagejpeg($image,public_path('/certificate/'.$file.'.jpg'));
    //return Storage::download(asset('storage/'.$file->path), $file->original_name);

  return Storage::download(storage_path('app/public/certificate/'.$file.'.jpg'));
 //imagejpeg($image);
 imagedestroy($image);

function generateImage()
    {
      
      
        //Set the Content Type
        header('content-type: image/jpeg');

        // Create Image From Existing File
        //$png_image = imagecreatefromjpeg("maxresdefault.jpg");
        //$name = "AL";
        
            // Allocate A Color For The Text
           // $font_color = imagecolorallocate($png_image, 19, 21, 22);
            $fileName1 = '1.jpg';
            //categoryimg/78748785858_bella.jpg
     // $filepath1 =$png_image->storePubliclyAs('/public/certificate',$fileName1);
   Storage::disk('public')->put('/storage/certificate'.'/'.$fileName1, 'public');
       // Storage::disk('local')->put('certificate', $fileName1);


        /*}
  
        if (request()->font_color == "#000") {
            // Allocate A Color For The Text
            $font_color = imagecolorallocate($png_image, 0, 0, 0);
        }*/
$font = 'BRUSHSCI.ttf';
 $image = imagecreatefromjpeg("maxresdefault.jpg");
 $color = imagecolorallocate($image, 19, 21, 22);
 $name = "Al";
 imagettftext($image, 40, 0, 200, 200, $color, $font, $name);
 imagejpeg($image);
 imagedestroy($image);
        // Set Path to Font File
       /* $font_path = '/BRUSHSCI.ttf';
        //$font_path2 = '/fonts/Arial Italic.ttf';

        

            // Print Text On Image
            imagettftext($png_image, 40, 0, 200, 200, $font_color, $font_path, $name);
       

        // Send Image to Browser
        imagejpeg($png_image);*/

        // Clear Memory
        //imagedestroy($png_image);
    }
/*$font = 'BRUSHSCI.ttf';
 $image = imagecreatefromjpeg("maxresdefault.jpg");
 $color = imagecolorallocate($image, 19, 21, 22);
 $name = "Al";
 imagettftext($image, 40, 0, 200, 200, $color, $font, $name);
 imagejpeg($image);
 imagedestroy($image);*/
?>
<?php
session_start();

function compress($source, $destination, $quality) 
{
  $info = getimagesize($source);
  
  if ($info['mime'] == 'image/jpeg')
  {
    $image = imagecreatefromjpeg($source);
  }
  elseif ($info['mime'] == 'image/gif')
  {
    $image = imagecreatefromgif($source);
  }
  elseif ($info['mime'] == 'image/png')
  {
    $image = imagecreatefrompng($source);
  }  
  imagejpeg($image, $destination, $quality);
  return $destination;
}

function resize($source, $destination)
{
  // Create image from file
  switch(strtolower($_FILES['image']['type']))
  {
    case 'image/jpeg': $image = imagecreatefromjpeg($_FILES['image']['tmp_name']);
    break;
    case 'image/png': $image = imagecreatefrompng($_FILES['image']['tmp_name']);
    break;
    case 'image/gif': $image = imagecreatefromgif($_FILES['image']['tmp_name']);
    break;
    default: exit('Unsupported type: '.$_FILES['image']['type']);
  }
  
  // Target dimensions
  $max_width = 240;
  $max_height = 180;

  // Get current dimensions
  $old_width  = imagesx($image);
  $old_height = imagesy($image);

  // Calculate the scaling we need to do to fit the image inside our frame
  $scale = min($max_width/$old_width, $max_height/$old_height);

  // Get the new dimensions
  $new_width  = ceil($scale*$old_width);
  $new_height = ceil($scale*$old_height);
  
  // Create new empty image
  $new = imagecreatetruecolor($new_width, $new_height);

  // Resize old image into new
  imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
  
  // Catch the imagedata
  ob_start();
  imagejpeg($new, $destination, 100);
  $data = ob_get_clean();
  
  // Destroy resources
  imagedestroy($image);
  imagedestroy($new);
  
  return $destination;
}

if ( isset($_FILES["file"]["type"]) )
{
  $max_size = 500 * 1024; // ? KB
  $destination_directory = "upload/";
  $validextensions = array("jpeg", "jpg", "png");
  $temporary = explode(".", $_FILES["file"]["name"]);
  $file_extension = end($temporary);
  
  // Check for image format and size again, because client-side code can be altered
  if ( (($_FILES["file"]["type"] == "image/png") ||
        ($_FILES["file"]["type"] == "image/jpg") ||
        ($_FILES["file"]["type"] == "image/jpeg")
       ) && in_array($file_extension, $validextensions))
  {
    if ( $_FILES["file"]["size"] < ($max_size) ) // Image must be less than max size
    {
      if ( $_FILES["file"]["error"] > 0 )
      {
        echo "<div class=\"alert alert-danger\" role=\"alert\">Error: <strong>" . $_FILES["file"]["error"] . "</strong></div>";
      }
      else
      {
        if ( file_exists($destination_directory . $_FILES["file"]["name"]) )
        {
          echo "<div class=\"alert alert-danger\" role=\"alert\">Error: File <strong>" . $_FILES["file"]["name"] . "</strong> already exists.</div>";
        }
        else
        {
          $sourcePath = $_FILES["file"]["tmp_name"];
          $source_img = $sourcePath;
          $destination_img = $targetPath;
          $d = compress($source_img, $destination_img, 50); // reduce resolution
          resize($source_img, $destination_img); // reduce dimensions
          
          $targetPath = $destination_directory . $_FILES["file"]["name"];
          move_uploaded_file($sourcePath, $targetPath);
          echo "<div class=\"alert alert-success\" role=\"alert\">";
          echo "<p>Image uploaded successful</p>";
          echo "<p>File Name: <a href=\"". $targetPath . "\"><strong>" . $targetPath . "</strong></a></p>";
          echo "<p>Type: <strong>" . $_FILES["file"]["type"] . "</strong></p>";
          echo "<p>Size: <strong>" . round($_FILES["file"]["size"]/1024, 2) . " kB</strong></p>";
          echo "<p>Temp file: <strong>" . $_FILES["file"]["tmp_name"] . "</strong></p>";
          echo "</div>";
        }
      }
    }
    else
    {
      echo "<div class=\"alert alert-danger\" role=\"alert\">The size of image you are attempting to upload is " . round($_FILES["file"]["size"]/1024, 2) . " KB, maximum size allowed is " . round($max_size/1024, 2) . " KB</div>";
    }
  }
  else
  {
    echo "<div class=\"alert alert-danger\" role=\"alert\">Invalid image format. Allowed formats: JPG, JPEG, PNG.</div>";
  }
}
?>
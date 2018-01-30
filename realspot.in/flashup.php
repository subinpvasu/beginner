<?php
if($_POST['submit'])
{

if (( ($_FILES["item_swf"]["type"] == "application/x-shockwave-flash") || 
								   ($_FILES["item_swf"]["type"] == "video/SWF") )
        && ($_FILES["item_swf"]["size"] < 800000))
           {
                if ($_FILES["item_swf"]["error"] > 0)
                  {
                     echo "Error: " . $_FILES["item_swf"]["error"] . "<br />";
                  }
                else if($width==1000 && $height==328)
                  {
                   if (file_exists('flash/' . $_FILES["item_swf"]["name"]))
                            {
                               echo $_FILES["item_swf"]["name"] . " already exists. ";
                             }
                   else
                            { 

  move_uploaded_file($val, 'flash/'.$_FILES['item_swf']['name']);
                               echo "done";
                        }
                  }
             else 
                 {
                    echo "size doest permit";
                 }  
            }
        else
            {
               echo "Not a valid swf file::";
            }                       

      
}
        ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>flash</title>
</head>
<body>
<form method="post" action="flashup.php">
<input type="file" name="item_swf" />
<input type="submit" name="submit" value="upload"/>
</form> 
</body>
</html>
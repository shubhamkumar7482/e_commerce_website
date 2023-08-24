<?php $path=$_REQUEST['filename'];
if(unlink($path)) echo "Deleted file ";
?>
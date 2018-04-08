<?php 
session_start();
session_destroy();
echo "<Script>
alert('Sampai Jumpa');
location.href='index.php';
</script>"
?>
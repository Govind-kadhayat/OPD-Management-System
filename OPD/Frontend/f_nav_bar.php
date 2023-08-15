


<?php 
$protocol = isset($_SERVER['HTTPS']) ? 'https' : 'http';
$server_name = $_SERVER['SERVER_NAME'];
$url = $protocol."://".$server_name."/TEST-1/Frontend/";
?>
   



    <link rel="stylesheet" href="../css/fdashboard.css">
    <link rel="stylesheet"  type="text/css" href="../css/fpage.css">

    <nav>
<label class="logo">OPD Management</label>
<ul>
    <li> <a href="<?php  echo $url.'fpage.php'; ?>"> Home</a></li>
    <li> <a href="<?php  echo $url.'f_register.php'; ?>"> Patient registration</a></li>
    <li> <a href="<?php  echo $url.'f_que_list.php'; ?>"> Que list</a></li>
    <li> <a href="#"> Contact</a></li>
    <li> <a href="#"> Admission</a></li>
   
</ul>
</nav>

</body>

</html>
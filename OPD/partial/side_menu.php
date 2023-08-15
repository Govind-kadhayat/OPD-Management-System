

<?php 
$protocol = isset($_SERVER['HTTPS']) ? 'https' : 'http';
$server_name = $_SERVER['SERVER_NAME'];
$url = $protocol."://".$server_name."/OPD/";
?>
       <link rel="stylesheet" href="css/side_menu.css">
   <div class="sidebar">
        <div class="sidebar_brand">
            <h1>
                <span class="head"> </span>
                OPD
            </h1>
        </div>
        <div class="side_menu">
            <ul>
                <li>
                    <a href="<?php  echo $url.'Dashboard.php'; ?>">
    
                    <span><img src="<?php  echo $url.'/icons/home.png'; ?>"alt="imag enot found" >Dashboard</span></a>
                </li>
                <li>
                    <a href=<?php  echo $url.'Doctorlist.php'; ?>><span><img src="<?php  echo $url.'/icons/adddoctor.png'; ?>"   alt="imag enot found" >Doctor list</span></a>
                </li>
                <li>
                    <a href=<?php  echo $url."patient_list.php"; ?>><span><img src="<?php  echo $url.'/icons/patient_list_FILL0_wght400_GRAD0_opsz48.png'; ?> " alt="imag enot found" >Patient list</span></a>
                </li>
                <li>
                    <a href=<?php  echo $url."user_list.php"; ?>><span><img src="<?php  echo $url.'/icons/patient_list_FILL0_wght400_GRAD0_opsz48.png'; ?> " alt="imag enot found" >User List</span></a>
                </li>
              
                <li>
                    <a href=<?php  echo $url."logout.php"; ?>><span><img src="<?php  echo $url.'/icons/logout_FILL0_wght400_GRAD0_opsz48.png'; ?> " alt="imag enot found" >logout</span></a>
                </li>
            </ul>
        </div>
    </div> 


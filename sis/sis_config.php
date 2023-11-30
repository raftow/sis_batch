<?php
    $pag_folder = "/var/www/html/v2/pag";
    
    $nartaqi_admin_name = "رفيق محمد نورالدين بوبكر";
    $email_admin = "rafiq@company.com";
    
    $email_supervisors = array();
    
    //$email_supervisors[] = "aalahmar@company.com";

    // $email_supervisors[] = "kalsayfen@company.com";
    // $email_supervisors[] = "almalki@company.com";
    $email_supervisors[] = "rafiq@company.com";
    
    $send_from = "مراقبة مركز خدمة العملاء<nartaqi-monitoring@company.com>";
    // $send_from = "قواعد بيانات المركز الوطني للمعلومات<nic-update-mon@company.com>";
    
    // obsolete require_once("$pag_folder/../external/smtp_config.php");
    $variables = $all_variables["nartaqi_monitoring"];
    
    require_once("$pag_folder/../external/db_config.php");  
        
    
    
    $continueAndSendAlert=false;
    
    $MODE_BATCH = true;
    
    
    date_default_timezone_set ("Asia/Riyadh");

?>
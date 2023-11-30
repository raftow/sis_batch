#!/bin/bash
<?php
$project_code = "sis_bootstrap_job";
$project = "AUTOMATIC SIS BOOTSTRAP JOB";

$date_time_run = $argv[1];

$lib_root_path = "/var/www/html/lib";
$batch_root_path = "/root/jobs";



require_once("$lib_root_path/afw/afw_autoloader.php");
// AfwAutoLoader::addModule("hrm");
AfwAutoLoader::addMainModule("sis");


require_once("$lib_root_path/afw/common_date.php");
include_once("$lib_root_path/afw/afw_shower.php");
require_once("$lib_root_path/hzm/alert/hzm_alerts.php");
//require_once("$lib_root_path/hzm/api/hzm_api_consume.php");
require_once("$lib_root_path/mail/hzm.mailer.php");
require_once("$batch_root_path/common/batch_functions.php");

require_once("$lib_root_path/../external/db.php");
require_once("$lib_root_path/afw/common.php");

// require_once("$batch_root_path/nartaqi/nartaqi_job_functions.php");
// require_once("$lib_root_path/../front/nartaqi/nartaqi_functions.php");

ini_set('error_reporting', E_ERROR | E_PARSE | E_RECOVERABLE_ERROR | E_CORE_ERROR | E_COMPILE_ERROR | E_USER_ERROR);
$lang = "ar";

include("$batch_root_path/sis/sis_config.php");
include("$batch_root_path/common/batch_init.php");




$forced_job_timestamp = date("Y-m-d H:i:s");  // "2018-11-20 00:00:00"; //

$print_sql = true;
$print_info = true;
$print_debugg = true;
$print_warning = true;
$print_error = true;
$print_important = true;

// require_once("$lib_root_path/../atm/scjob.php");
// $jb = new Scjob();
// $jb->load(1);
// $log_file_name = "/var/www/log_batch/survey/nartaqi/survey_nartaqi_job_$date_time_run";
// $jb_run = $jb->newRun($log_file_name);

                              
$recap_data = array();

list($err,$inf,$war,$tech) = School::bootstrapAllPaidSchoolsWork($lang);

if($err) AfwBatch::print_error($err);
if($inf) AfwBatch::print_info($inf);
if($war) AfwBatch::print_warning($war);
if($tech) AfwBatch::print_debugg($tech);

/*
$nb_survey_update_back = $res["nb_survey_update_back"];      
$nb_bad_customer       = $res["nb_bad_customer"];
$nb_bad_request        = $res["nb_bad_request"];


$row_0 = array('jobname'=>"migrate back survey result to C RM2",
               'update_back'=>$nb_survey_update_back, 'bad_customer'=>$nb_bad_customer, 'bad_request'=>$nb_bad_request,);

$recap_data[] = $row_0;
*/

// $jb_run->setNewItemValue($row_0["jobname"],"errors",$nb_errors);
// $jb_run->setNewItemValue($row_0["jobname"],"surveyed",$nb_surveyed);
// $jb_run->setNewItemValue($row_0["jobname"],"migrated",$nbrows_migrated);

/*
foreach($logs as $log)
{
       print_debugg($log);
}

foreach($errors as $err)
{
       print_error($err);
}
*/

// $recap_header = array('jobname'=>40, 'update_back'=>15, 'bad_customer'=>15, 'bad_request'=>15, );


/*
$recap_colors = array(
                rule1 => array(
                                 'code' => "min_val_of_col",
                                 col=>"migrated",
                                 colors=>array(1=>black),
                                 bg_colors=>array(1=>yellow)
                              ),
                              
                rule2 => array(
                                 'code' => "min_val_of_col",
                                 col=>"surveyed",
                                 colors=>array(1=>black),
                                 bg_colors=>array(1=>lightgreen)
                              ),               
                              
                rule3 => array(
                                 'code' => "min_val_of_col",
                                 col=>"errors",
                                 colors=>array(1=>white),
                                 bg_colors=>array(1=>red)
                              ),
                              
               );*/

// AfwBatch::print_data($recap_header,$recap_data, $recap_colors);


//die("nbrows_migrated = ".$nbrows_migrated);

// send mail to managers
/*
if($email_simulation)
{
        $to_email_arr = array();
        $to_email_arr[] = $email_admin;
}
else
{
        $to_email_arr = $email_supervisors;
} 

$subject = $project;

$body = array();
$body[] = headerMail("ltr");
$body[] = "<h3>$subject</h3>";
$body[] = "Date of run : $forced_job_timestamp";
$body[] = AfwBatch::html_data($recap_header,$recap_data, $recap_colors);
$body[] = footerMail();

$res = hzmMail($project_code,"$project_code-$forced_job_timestamp",$to_email_arr,$subject,$body, $send_from, $format="html", $language="ar");
*/

/*
$jb_run->endOfRun(count($errors)+$nb_errors, 0, $nb_surveyed+$nbrows_migrated);

$jb_run_header = array(id=>10, run_date=>20, run_time=>20, errors_nb=>15, warning_nb=>15, notification_nb=>15);

$jb_run_data = array();
$jb_run_data[0] = array();
$jb_run_data[0]["id"] = $jb_run->getId();
$jb_run_data[0]["run_date"] = $jb_run->getVal("run_end_date");
$jb_run_data[0]["run_time"] = $jb_run->getVal("run_end_time");
$jb_run_data[0]["errors_nb"] = $jb_run->getVal("errors_nb");
$jb_run_data[0]["warning_nb"] = $jb_run->getVal("warning_nb");
$jb_run_data[0]["notification_nb"] = $jb_run->getVal("notification_nb");

print_data($jb_run_header,$jb_run_data, null);
*/


?>
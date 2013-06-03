<?php
//bootstrap symfony
require_once(dirname(__FILE__).'/../../config/ProjectConfiguration.class.php');
require_once('classes/UpdateBalance.class.php');
$configuration = ProjectConfiguration::getApplicationConfiguration('backend', 'sandbox', true);
$instance = sfContext::createInstance($configuration);

$balance = $_GET['balance'];

$inmate_id = $_GET['inmate_id'];

if(!is_null($inmate_id) && !is_null($balance)) {

    $ub = new UpdateBalance();
    $ub->updateInmateBalance($inmate_id,$balance);
    $ub->reenqueue($inmate_id);
}

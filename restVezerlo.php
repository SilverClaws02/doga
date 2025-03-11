<?php

require_once("OscarrestKezelo.php");

$view = "";
if(isset($_GET["view"]))
    $view = $_GET["view"];

switch($view){

    case "all":
        $oscarrest = new OscarrestKezelo();
        $oscarrest->getAllOscars();
        break;

    case "single":
        $oscarrest = new OscarrestKezelo();
        $oscarrest->getOscarsByID(m_ID: $_GET["id"]);
        break;

    case "tipus":
        $oscarrest = new OscarrestKezelo();
        $oscarrest->getOscarsByType(Mt_name: $_GET["tid"]);
        break;

    default:
        $oscarrest = new OscarrestKezelo();
        $oscarrest->getFault();
}
?>

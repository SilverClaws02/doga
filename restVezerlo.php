<?php
require_once("OscarrestKezelo.php");

$view = $_GET["view"] ?? "";

$oscarrest = new OscarrestKezelo();

switch ($view) {
    case "all":
        $oscarrest->getAllOscars();
        break;
    case "single":
        if (!empty($_GET["id"])) {
            $oscarrest->getOscarsById($_GET["id"]);
        } else {
            $oscarrest->getFault();
        }
        break;
    case "tipus":
        if (!empty($_GET["tid"])) {
            $oscarrest->getOscarsByType($_GET["tid"]);
        } else {
            $oscarrest->getFault();
        }
        break;
    default:
        $oscarrest->getFault();
}
?>

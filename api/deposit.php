<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/utils/Auth.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/utils/UserRepo.php");

$req = json_decode(file_get_contents("php://input"), true);

if (!isset($req["amount"])) {
    reply(["error" => "no amount"]);
}

UserRepo::addUserBalance($req["amount"]);
reply(["success" => true]);

function reply(array $body)
{
    header("Content-Type: application/json; charset=utf-8");
    echo json_encode($body);
    die();
}

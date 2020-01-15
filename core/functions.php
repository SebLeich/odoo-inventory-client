<?php

require_once "./lib/ripcord-master/ripcord.php";

$uid;
$models;
$url;
$common;
$db;
$password;
$username;

/**
 * the method checks the login credentials
 */
function test_login(){
    global $common, $uid, $url, $db, $password, $username;
    $url = $_POST["url"];
    $db = $_POST["db"];
    $common = ripcord::client("$url/xmlrpc/2/common");
    try {
        $common->version();
    } catch (Exception $e) {
        return false;
    }
    $uid = $common->authenticate($_POST["db"], $_POST["username"], $_POST["password"], array());
    if($uid == "") return false;
    $username = $_POST["username"];
    $password = $_POST["password"];
    return true;
}

function init(){
    global $models, $url, $username;
    $models = ripcord::client("$url/xmlrpc/2/object");
    echo("
        <script>
            $('#current-username').text('$username');
        </script>
    ");
}
/**
 * the method returns all products from odoo
 */
function get_products()
{
    global $models, $db, $uid, $password;
    return $models->execute_kw($db, $uid, $password, 'product.product', 'search_read', array(), array('fields' => array('name', 'image_128', 'lst_price', 'qty_available'), 'limit' => 15));
}
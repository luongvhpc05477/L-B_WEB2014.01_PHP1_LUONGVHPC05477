<?php
include_once('pdo.php');
class ServiceAuth
{
    function register($user, $email, $pass)
    {
        $sql = "INSERT TAIKHOAN VALUES(NULL, '$user', '$pass', '$email','', '', 0)";
        pdo_execute($sql);
    }
    function login($user, $pass)
    {
        $sql = "SELECT * FROM TAIKHOAN WHERE USER = '$user' AND PASS = '$pass'";
        return pdo_query_one($sql);
    }
    function editAccount($user, $email, $pass, $phone, $address)
    {
        $sql = "UPDATE TAIKHOAN SET USER='$user', EMAIL = '$email', PASS = '$pass', TEL = '$phone', ADDRESS = '$address'";
        pdo_execute($sql);
    }
    function showPass($email)
    {
        $sql = "SELECT * FROM TAIKHOAN WHERE EMAIL = '$email'";
        return pdo_query_one($sql);
    }
    function listAccount()
    {
        $sql = "SELECT * FROM TAIKHOAN";
        return pdo_query($sql);
    }
}

$serviceAuth = new ServiceAuth();

<?php
require_once "config.php";

function emptyInputLogin($username, $pwd)
{
    $result = false;
    if (empty($username) or empty($pwd)) {
        $result = true;
    }
    return $result;
}
function userExists($conn, $username, $email)
{
    $sql = "SELECT * FROM users WHERE usersName = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function loginUser($conn, $userinput, $pwd)
{
    $userExistReturn = userExists($conn, $userinput, $userinput);
    if ($userExistReturn == false) {
        header("location: ../login_menu.php?error=userdontexist");
        exit();
    }

    $pwdHashed = $userExistReturn["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);
    
    if ($checkPwd === false){
        header("location: ../login_menu.php?error=invalidLogin");
        exit();
    }
    else if ($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $userExistReturn["usersId"];
        $_SESSION["useruid"] = $userExistReturn["usersUid"];
        header("location: ../main_menu/index.php");
        exit();    
    }

}

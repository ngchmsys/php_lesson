<?php
session_start();

if(!$_SESSION['singleton']) {
    $_SESSION['users'] = array();
    $_SESSION['singleton'] = true;
    array_push($_SESSION['users'], array(id=>1, name=>'Test1'));
    array_push($_SESSION['users'], array(id=>2, name=>'Test2'));
    array_push($_SESSION['users'], array(id=>3, name=>'Test3'));
    array_push($_SESSION['users'], array(id=>4, name=>'Test4'));
}

function router()
{
    $req = array();
    switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $res = $_SESSION['users'];
        break;
    case 'POST':
        $req = json_decode(file_get_contents('php://input'), $assoc= true);
        array_push($_SESSION['users'], $req);
        $res = $_SESSION['users'];
        break;
    case 'PUT':
        $_change = false;
        $req = json_decode(file_get_contents('php://input'), $assoc= true);
        foreach($_SESSION['users'] as $key => $user) {
            if($req['id'] == $_SESSION['users'][$key]['id']) {
                $_SESSION['users'][$key]['name'] = $req['name'];
                $_change = true;
                $res = $_SESSION['users'];
            }
        }
        if(!$_change) {
            echo 'User not found.';
        }
        break;
    case 'DELETE':
        $req = json_decode(file_get_contents('php://input'), $assoc= true);
        foreach($_SESSION['users'] as $key => $user) {
            if($req['id'] == $_SESSION['users'][$key]['id']) {
                unset($_SESSION['users'][$key]);
            }
        }
        $res = $_SESSION['users'];
        break;
    default:
        $res = "Not supprted methods.";
        break;
    }
    return $res;
}

echo json_encode(router());

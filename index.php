<?php
require_once (__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/MyClasses/Querys.php');
$query = new Query();


$loader = new Twig_Loader_Filesystem(__DIR__ . '/pages/templates');
$twig = new Twig_Environment($loader);



if (!empty($_GET['action'])) {
    if ($_GET['action'] == 'change') {

        if (!empty($_GET['name']) && !empty($_GET['id'])) {
            if ($_GET['id'] != '') {
                $query->changeName($_GET['id'], $_GET['name']);
                $_GET['action']='';
                header('Location:http://sqllearning');
                exit;
            }
        }
    }
    if ($_GET['action'] == 'delete') {
        if (!empty($_GET['id'])) {
            if ($_GET['id'] != '') {
                $query->delFriend($_GET['id']);
                $_GET['action']='';
                header('Location:http://sqllearning');
                exit;
            }
        }
    }
    if($_GET['action']=='add'){
        if(!empty($_GET['name'])){
            $query->addFriend($_GET['name']);
            $_GET['action']='';
            header('Location:http://sqllearning');
            exit;
        }
    }
}


$friends = $query->selectFriends();
echo $twig->render('main.twig', array(
    'content_h1'=> 'All Friends',
    'friends' => $friends
));
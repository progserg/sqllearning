<?php
//include(__DIR__ . '/MyClasses/DBConnect.php');
include(__DIR__ . '/MyClasses/Querys.php');
$query = new Query();


if (!empty($_GET['action'])) {
    if ($_GET['action'] == 'change') {

        if (!empty($_GET['name']) && !empty($_GET['id'])) {
            if ($_GET['id'] != '') {
                $query->changeName($_GET['id'], $_GET['name']);
            }
        }
    }
    if ($_GET['action'] == 'delete') {
        if (!empty($_GET['id'])) {
            if ($_GET['id'] != '') {
                $query->delFriend($_GET['id']);
            }
        }
    }
    if($_GET['action']=='add'){
        if(!empty($_GET['name'])){
            $query->addFriend($_GET['name']);
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>sqllearning</title>
</head>
<body>
<div class="echo">
    <h1>All Friends</h1>
    <form action="index.php?action=;name=" class="block-friend">
        <div class="friend">
            <input type="text" name="name" placeholder="Введите имя">
            <input type="hidden" name="action" value="add">
            <input type="submit" value="Добавить друга">
        </div>
    </form>
    <hr>
    <?php
    $friends = $query->selectFriends();
    foreach ($friends as $friend):
        ?>
        <div class="block-friend">
            <p class="friend">
                <?php
                echo $friend['name'];
                ?>
            </p>
            <form action="index.php?name=;id=;action=" method="get" class="friend">
                <input type="text" name="name" placeholder="Введите новое имя">
                <input type="hidden" name="id" value="<?php echo $friend['id'] ?>">
                <input type="hidden" name="action" value="change">
                <input type="submit" value="Изменить имя">
            </form>
            <form action="index.php?id=;action=" method="get" class="friend">
                <input type="hidden" name="id" value="<?php echo $friend['id'] ?>">
                <input type="hidden" name="action" value="delete">
                <input type="submit" value="Удалить друга">
            </form>
        </div>
        <?php
    endforeach;
    ?>
</div>
</body>
</html>
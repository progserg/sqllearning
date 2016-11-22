<?php
include(__DIR__ . '/DBConnect.php');
class Query
{
    //selectЫ
    protected $selectFriends = 'SELECT * FROM `friends`';

    protected $selectFriendsByName = 'SELECT * FROM `friends` ORDER BY `name`';

    //insertЫ
    protected $addFriend = 'INSERT INTO `friends`(`name`) VALUES ( :name ) ';


    //deletЫ
    protected $deleteFriend = 'DELETE FROM `friends` WHERE `id`= :id';


    //updatЫ
    protected $changeName = 'UPDATE `friends` SET `name`= :name WHERE `id` = :id';


    public function selectFriends()
    {
        $query = Database:: prepare($this->selectFriends);
        $query->execute();
        return $query;
    }

    public function selectFriendsByName()
    {
        $query = Database:: prepare($this->selectFriendsByName);
        $query->execute();
        return $query;
    }

    public function addFriend($name)
    {
        $query = Database:: prepare($this->addFriend);
        return $query->execute([':name' => $name]);
    }

    public function delFriend($id)
    {
        $query = Database:: prepare($this->deleteFriend);
        return $query->execute([':id' => $id]);
    }
    public function changeName($id, $name)
    {
        $values = [':id'=>$id, ':name'=>$name];
        $query = Database:: prepare($this->changeName);
        return $query->execute($values);
    }
}
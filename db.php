<?php

namespace lipa;

class db
{
    private $host;
    private $dbname;
    private $username;
    private $password;

    private $connection;

    public function __construct($host, $dbname, $username, $password)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;

        try {
            $this->connection = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->username, $this->password);
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getMenu()
    {
        $menuItems = [];
        $sql = "SELECT * FROM menu ";
        $query = $this->connection->query($sql);

        while ($row = $query->fetch()) {
            $menuItems[] = [
                'id'=>$row ['id'],
                'sysName'=>$row ['sysName'],
                'displayName' => $row ['displayName'],
                'link' => $row['link']

            ];
        }
        return $menuItems;
    }

    public function getAboutMenu()
    {
        $aboutMenuItems = [];
        $sql = "SELECT * FROM aboutmenu ";
        $query = $this->connection->query($sql);

        while ($row = $query->fetch()) {
            $aboutMenuItems[] = [
                'id'=>$row ['id'],
                'sysName'=>$row ['sysName'],
                'displayName' => $row ['displayName'],
                'link' => $row['link']

            ];
        }
        return $aboutMenuItems;
    }

    public function getBanner()
    {
        $bannerItems = [];
        $sql = "SELECT * FROM banner ";
        $query = $this->connection->query($sql);

        while ($row = $query->fetch()) {
            $bannerItems[] = [
                'id'=>$row ['id'],
                'title'=>$row ['title'],
                'mainText' => $row ['mainText'],
                'description' => $row['description'],
                'button' => $row['button'],
                'buttonLink' => $row['buttonLink'],
                'imageLink' => $row['imageLink']
            ];
        }
        return $bannerItems;
    }

    public function getOffers()
    {
        $offerItems = [];
        $sql = "SELECT * FROM offers";
        $query = $this->connection->query($sql);

        while ($row = $query->fetch()) {
            $offerItems[] = [
                'idOffer'=>$row ['idOffer'],
                'title'=>$row ['title'],
                'minPrice' => $row ['minPrice'],
                'description' => $row['description'],
                'imageLink' => $row['imageLink']
            ];
        }
        return $offerItems;
    }

    public function getContacts()
    {
        $contactItems = [];
        $sql = "SELECT * FROM contacts";
        $query = $this->connection->query($sql);

        while ($row = $query->fetch()) {
            $contactItems[] = [
                'id'=>$row ['id'],
                'companyName'=>$row ['companyName'],
                'phone' => $row ['phone'],
                'email' => $row['email'],
                'year' => $row['year'],
                'facebookLink' => $row['facebookLink'],
                'twitterLink' => $row['twitterLink'],
                'description' => $row['description'],
                'location' => $row['location']
            ];
        }
        return $contactItems;
    }

    public function insertBook($getDate, $returnDate, $fullName, $phone, $email){
        $dateTime = date('Y-m-d H:i:s', time());
        $status ="new";
        $sql="INSERT INTO autobooking (fullname, phone, email, getDate, returnDate, status, created, updated) VALUES('" . $fullName . "','" . $phone . "','" .$email."','" .$getDate."','" .$returnDate."','" . $status . "','" . $dateTime . "','".$dateTime."')";
        
        try {
            $this->connection->exec($sql);
            return true;
        } catch (\PDOException $e) {
            return false;
        }

    }

    public function getBookings(){
        $bookItems = [];
        $sql = "SELECT * FROM autobooking";
        $query = $this->connection->query($sql);

        while ($row = $query->fetch()) {
            $bookItems[] = [
                'id'=>$row ['id'],
                'fullName'=>$row ['fullName'],
                'phone' => $row ['phone'],
                'email' => $row['email'],
                'getDate' => $row['getDate'],
                'returnDate' => $row['returnDate'],
                'status' => $row['status'],
                'created' => $row['created'],
                'updated' => $row['updated']
            ];
        }
        return $bookItems;
    }

    public function deleteBooking($id){
        $sql="DELETE FROM autobooking WHERE id=".$id;
        try {
            $this->connection->exec($sql);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

     public function getBookingInfo($id){
        $sql="SELECT id, fullName, phone, email, getDate, returnDate, status FROM autobooking WHERE id=".$id;
        $result=[];

        try {
            $query=$this->connection->query($sql);
            $result=$query->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function updateBookingInfo($id,$getDate,$returnDate,$fullName,$phone,$email,$status){
        $dateTime = date('Y-m-d H:i:s', time());
        $sql="UPDATE autobooking SET getDate ='".$getDate."',returnDate ='".$returnDate."', fullName='".$fullName."', phone ='".$phone."',email='".$email."' ,updated='".$dateTime."', status='".$status."' WHERE id=".$id;
        try {
            $this->connection->exec($sql);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getComments(){
        $comItems = [];
        $sql = "SELECT * FROM comments";
        $query = $this->connection->query($sql);

        while ($row = $query->fetch()) {
            $comItems[] = [
                'id'=>$row ['id'],
                'fullName'=>$row ['fullName'],
                'position' => $row ['position'],
                'comment' => $row['comment']
            ];
        }
        return $comItems;
    }


    public function sendMessage($fullName, $email, $subject, $message){
        $dateTime = date('Y-m-d H:i:s', time());
        $sql="INSERT INTO messages (fullname, email, subject, message, created) VALUES('" . $fullName . "','" .$email."','" .$subject."','" .$message."','".$dateTime."')";
        try {
            $this->connection->exec($sql);
            return true;
        } catch (\PDOException $e) {
            return false;
        }

    }

    public function getMessages(){
        $mesItems = [];
        $sql = "SELECT * FROM messages";
        $query = $this->connection->query($sql);

        while ($row = $query->fetch()) {
            $mesItems[] = [
                'created'=>$row ['created'],
                'fullName'=>$row ['fullName'],
                'email' => $row ['email'],
                'subject' => $row['subject'],
                'message' => $row['message']
            ];
        }
        return $mesItems;
    }


    







}

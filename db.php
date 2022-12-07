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


    // public function getFoodMenu()
    // {
    //     $food_menuItems = [];
    //     $sql = "SELECT * FROM food_menu ";
    //     $query = $this->connection->query($sql);

    //     while ($row = $query->fetch()) {
    //         $food_menuItems[] = [
    //             'id'=>$row ['id'],
    //             'sys_name'=>$row ['sys_name'],
    //             'display_name' => $row ['display_name'],
    //             'image' => $row['image']

    //         ];

    //     }
    //     return $food_menuItems;
    // }

    // public function getWeeklyFood()
    // {
    //     $weekly_foodItems = [];
    //     $sql = "SELECT * FROM weekly_food ";
    //     $query = $this->connection->query($sql);

    //     while ($row = $query->fetch()) {
    //         $weekly_foodItems[] = [
    //             'id'=>$row ['id'],
    //             'sys_name'=>$row ['sys_name'],
    //             'display_name' => $row ['display_name'],
    //             'price' => $row ['price'],
    //             'food_name' => $row ['food_name'],
    //             'description' => $row ['description'],
    //             'image' => $row['image']

    //         ];

    //     }
    //     return $weekly_foodItems;
    // }

    // public function getBlogPosts()
    // {
    //     $blogItems = [];
    //     $sql = "SELECT *, DATE(created_at)AS date FROM blog ";
    //     $query = $this->connection->query($sql);

    //     while ($row = $query->fetch()) {
    //         $blogItems[] = [
    //             'id'=>$row ['id'],
    //             'sys_name'=>$row ['sys_name'],
    //             'display_name' => $row ['display_name'],
    //             'author' => $row ['author'],
    //             'image' => $row['image'],
    //             'image_blog_entries' => $row['image_blog_entries'],
    //             'text' => $row ['text'],
    //             'date' => $row ['date']

    //         ];

    //     }
    //     return $blogItems;
    // }

   
    // public function getMeals($title)
    // {
    //     $mealsItems = [];
    //     $sql = "SELECT M.*, T.title  FROM restaurant.meals AS M INNER JOIN type_meals_menu AS T ON M.type_id=T.id WHERE T.title ='".$title."'";
    //     $query = $this->connection->query($sql);

    //     while ($row = $query->fetch()) {
    //         $mealsItems[] = [
    //             'id'=>$row ['id'],
    //             'name'=>$row ['name'],
    //             'description' => $row ['description'],
    //             'price' => $row['price'],
    //             'image' => $row['image'],
    //             'type_id'=> $row['type_id']



    //         ];

    //     }
    //     return $mealsItems;
    // }

    // public function getTypeMealsMenu()
    // {
    //     $typeMealsItems = [];
    //     $sql = "SELECT * FROM type_meals_menu";
    //     $query = $this->connection->query($sql);

    //     while ($row = $query->fetch()) {
    //         $typeMealsItems []= [
    //             'id'=>$row ['id'],
    //             'title'=>$row ['title'],
    //             'image' => $row['image'],
    //             'alt'=> $row['alt'],
    //             'sys_name'=> $row['sys_name']



    //         ];

    //     }
    //     return $typeMealsItems;
    // }


    // public function insertContact($name,$email,$phone,$message){
    //     $dateTime = date('Y-m-d H:i:s', time());
    //     $sql="INSERT into contact ( name, email,phone, message,created_at,updated_at) VALUE('" . $name . "','" . $email . "','" .$phone."','" . $message . "','" . $dateTime . "','" . $dateTime . "')";
    //     try {
    //         $this->connection->exec($sql);
    //         return true;
    //     } catch (\PDOException $e) {
    //         return false;
    //     }

    // }




    // public function getAllContacts(){
    //     $emails = [];
    //     $sql="SELECT * FROM contact";
    //     $query = $this->connection->query($sql);

    //     while ($row = $query->fetch()) {
    //         $emails[] = [
    //             'id' => $row ['id'],
    //             'name' => $row ['name'],
    //             'email' => $row['email'],
    //             'phone' => $row['phone'],
    //             'message' => $row['message'],
    //             'created_at' => $row['created_at']
    //         ];

    //     }
    //     return $emails;
    // }

    // public function getAllReservations(){
    //     $reservations= [];
    //     $sql="SELECT * FROM reservation";
    //     $query = $this->connection->query($sql);

    //     while ($row = $query->fetch()) {
    //         $reservations[] = [
    //             'id' => $row ['id'],
    //             'day' => $row ['day'],
    //             'time' => $row['time'],
    //             'name' => $row['name'],
    //             'phone' => $row['phone'],
    //             'number_of_people' => $row['number_of_people'],
    //             'created_at' => $row['created_at'],
    //             'status' => $row['status']
    //         ];

    //     }
    //     return $reservations;
    // }

    // public function deleteContact($id){
    //     $sql="DELETE FROM contact WHERE id=".$id;
    //     try {
    //         $this->connection->exec($sql);
    //         return true;
    //     } catch (\PDOException $e) {
    //         return false;
    //     }
    // }




    // public function getContactDetail($id){
    //     $sql="SELECT id, name, email,phone, message FROM contact WHERE id=".$id;
    //     $result=[];

    //     try {
    //         $query=$this->connection->query($sql);
    //         $result=$query->fetchAll(\PDO::FETCH_ASSOC);
    //         return $result;
    //     } catch (\PDOException $e) {
    //         return false;
    //     }
    // }

    // public function updateContact($id,$name,$email,$phone,$message){
    //     $dateTime = date('Y-m-d H:i:s', time());
    //     $sql="UPDATE contact SET name ='".$name."',email ='".$email."', phone='".$phone."', message ='".$message."',updated_at='".$dateTime."' WHERE id=".$id;
    //     try {
    //         $this->connection->exec($sql);
    //         return true;
    //     } catch (\PDOException $e) {
    //         return false;
    //     }
    // }



    // public function insertBlogPost($sysName, $displayName, $author,$image,$image_blog_entries,$text )
    // {
    //     $dateTime = date('Y-m-d H:i:s', time());
    //     $sql =" INSERT into blog (sys_name, display_name,author,image,image_blog_entries,text,created_at,updated_at)
    //             VALUE('" . $sysName . "','" . $displayName . "','" . $author . "','" . $image . "','" . $image_blog_entries . "', '".$text."','".$dateTime."','".$dateTime."')";

    //     try {
    //         $this->connection->exec($sql);
    //         return true;
    //     } catch (\PDOException $e) { echo $e;
    //         return false;
    //     }
    // }

    // public function getAllBlogPosts(){
    //     $blog_posts =[];
    //     $sql="SELECT * FROM blog";
    //     $query = $this->connection->query($sql);

    //     while ($row = $query->fetch()) {
    //         $blog_posts[] = [
    //             'id' => $row ['id'],
    //             'sys_name' => $row ['sys_name'],
    //             'display_name' => $row['display_name'],
    //             'author' => $row['author'],
    //             'image' => $row['image'],
    //             'image_blog_entries' => $row['image_blog_entries'],
    //             'text' => $row['text'],
    //             'created_at' => $row['created_at']
    //         ];

    //     }
    //     return $blog_posts;
    // }

    // public function deleteBlog($id){
    //     $sql="DELETE FROM blog WHERE id=".$id;
    //     try {
    //         $this->connection->exec($sql);
    //         return true;
    //     } catch (\PDOException $e) {
    //         return false;
    //     }
    // }


    // public function getBlogDetail($id){
    //     $sql="SELECT id, sys_name, display_name,author,image,image_blog_entries,text FROM blog WHERE id=".$id;
    //     $result=[];

    //     try {
    //         $query=$this->connection->query($sql);
    //         $result=$query->fetchAll(\PDO::FETCH_ASSOC);
    //         return $result;
    //     } catch (\PDOException $e) {
    //         return false;
    //     }
    // }

    // public function updateBlog($id,$sys_name,$display_name,$author,$image,$image_blog_entries,$text){
    //     $dateTime = date('Y-m-d H:i:s', time());
    //     $sql="UPDATE blog SET sys_name ='".$sys_name."',display_name ='".$display_name."', author='".$author."', image ='".$image."',image_blog_entries='".$image_blog_entries."',text='".$text."',updated_at='".$dateTime."' WHERE id=".$id;
    //     try {
    //         $this->connection->exec($sql);
    //         return true;
    //     } catch (\PDOException $e) {
    //         return false;
    //     }
    // }

    // public function insertNewsletter($email){
    //     $dateTime = date('Y-m-d H:i:s', time());
    //     $sql="INSERT into newsletter (  email,created_at,updated_at) VALUE('" . $email. "','"  . $dateTime . "','" . $dateTime . "')";
    //     try {
    //         $this->connection->exec($sql);
    //         return true;
    //     } catch (\PDOException $e) {
    //         return false;
    //     }

    // }

    // public function getAllNewsletter(){
    //     $newsletter =[];
    //     $sql="SELECT * FROM newsletter";
    //     $query = $this->connection->query($sql);

    //     while ($row = $query->fetch()) {
    //         $newsletter[] = [
    //             'id' => $row ['id'],
    //             'email' => $row['email'],
    //             'created_at' => $row['created_at']
    //         ];

    //     }
    //     return $newsletter;
    // }

    // public function deleteNewsletter($id){
    //     $sql="DELETE FROM newsletter WHERE id=".$id;
    //     try {
    //         $this->connection->exec($sql);
    //         return true;
    //     } catch (\PDOException $e) {
    //         return false;
    //     }
    // }








}

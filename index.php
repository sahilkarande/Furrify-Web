<?
session_start();
$connection=mysqli_connect("localhost","root","","furrify") or die("Database connection failed");
$db = mysqli_select_db($connection,'furrify');


if($_SERVER['REQUEST_METHOD'] == "POST"){
    print_r($_POST);
}

class Post 
{
    private $error = "";

    public function create_post($data)
    {
        if(empty($data['post']))
        {
            $post = addslashes($data['post']);
        }else
        {
            $this->error .= "Please type something to post!<br>";
        }
        return $this->error;
    }
}



?>
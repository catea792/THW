<?
$linkTo = $_REQUEST["LinkTo"];
$userName = $_POST["UserName"];
$password = $_POST["Password"];

if (isset($userName)){
    $host= "localhost";
    $user = "root";
    $passwd = "";
    $database = "Lab12";
    $table_name = "Users";

    $query = "SELECT * FROM $table_name WHERE UserName='$userName' AND Password='$password'";
    $connect = mysqli_connect($host, $user, $passwd);

    if($connect){
        mysqli_select_db($database);
        $result = mysqli_query($query, $connect);

        $row = mysqli_fetch_row($result);
        if ($result && $row){
            if($linkTo != ""){
                header("Location: ".$linkTo);
            }else{
                header("Location: http://google.com/");
                exit();
            }
        }
    }
}

if(isset($user) && !$row){
    echo "<p>Invalid name and/or password</p>";
}
mysqli_free_result($result);

mysqli_close($connect);
?>






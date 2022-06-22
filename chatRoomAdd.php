<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "roommating";

// connect with database demo
$conn = new mysqli($servername, $username, $password, $dbname);

 // an array to display response
 $response = array();

 // on below line we are checking if the parameter send is id or not.
 if(isset($_POST['KakaoID1'], $_POST['KakaoID2'])){
     // if the parameter send from the user id id then
     // we will search the item for specific id.

     $inputKakaoIDMe = $_POST['KakaoID1'];
     $inputKakaoIDOther = $_POST['KakaoID1'];
 }
        //on below line we are selecting the course detail with below id.
   $stmt = $conn->prepare("INSERT INTO chatroom_tbl(KakaoId1, KakaoId2, Matched) values(?, ?, ?)");
   $stmt->bind_param("iii", $inputKakaoIDMe, $inputKakaoIDOther, 1);
   $result = $stmt->execute();

   $stmt = $conn->prepare("INSERT INTO chatroom_tbl(KakaoId1, KakaoId2, Matched) values(?, ?, ?)");
   $stmt->bind_param("iii",$inputKakaoIDOther, $inputKakaoIDMe, 1);
   $result = $stmt->execute();
   // on below line we are checking if our
   // table is having data with specific id.

   if($result == TRUE){
         // if we get the response then we are displaying it below.
         $response['error'] = false;
         $response['message'] = "save Successful!";
            }
   else{
         // if the id entered by user donot exist then
         // we are displaying the error message
         $response['error'] = true;
         $response['message'] = "Incorrect id";
     }

 // at last we are printing
 // all the data on below line.
 echo json_encode($response);
?>
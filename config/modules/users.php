<?php
function getAllUsers(){
    global $connection;
   $data = [];
   $query = "SELECT * FROM users";

   $result = mysqli_query($connection, $query);

  if(mysqli_num_rows($result)>0){
       $data = $result ->fetch_all(MYSQLI_ASSOC);
  }
    return $data;

}

function insert($table,$colums, $values, $connection){

}



// thêm dữ liệu 
function createUser($name,$email, $password, $confirm_password){
    global $connection;
    
    $query = "INSERT INTO users(name, email,password) 
            VALUES ('$name','$email','$password')";

            mysqli_query($connection,$query);
}
createUser('Lương', 'luongvhpc05477@fpt.edu.vn', '2600', '2600');

?>
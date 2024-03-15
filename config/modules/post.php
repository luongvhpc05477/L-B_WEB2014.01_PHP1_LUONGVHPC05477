<?php
function getAllPost(){
    global $connection;
    $data = [];
    $query = "SELECT * FROM posts";

    $result = mysqli_query($connection, $query);

   if(mysqli_num_rows($result)>0){
        $data = $result ->fetch_all(MYSQLI_ASSOC);
   }
     return $data;
}


function getOnePost($id){
     global $connection;
     $data = [];
     $query = "SELECT * FROM posts WHERE `id` = $id";
     
     $result = mysqli_query($connection, $query);
 
    if(mysqli_num_rows($result)>0){
         $data = $result ->fetch_assoc();
    }
     return $data;
 }



 

function getAllPostCategories(){
    global $connection;
    $data = [];
    $query = "SELECT * FROM categories";

    $result = mysqli_query($connection, $query);

   if(mysqli_num_rows($result)>0){
        $data = $result ->fetch_all(MYSQLI_ASSOC);
   }
    return $data;
}

function getPostBycartegory($category_id){
   global $connection;
   $data = [];
   $query = "SELECT * FROM posts WHERE category_id = $category_id";

   $result = mysqli_query($connection, $query);

  if(mysqli_num_rows($result)>0){
       $data = $result ->fetch_all(MYSQLI_ASSOC);
  }
  return $data;
}


function createPost(    $name,
                        $slug ='',
                        $thumbnail,
                        $post_category_id,
                        $content
                    ){
                    global $connection;
    
    $query = "INSERT INTO posts (   
                        name,  
                        slug ,
                        thumbnail,
                        content,
                        category_id
                        ) 
            VALUES (
                        '$name',
                        '$slug',
                        '$thumbnail',
                        '$content',
                        '$post_category_id'
                    )";

            mysqli_query($connection,$query);
           
}


function updatePost( $name,
                        $slug ='',
                        $thumbnail,
                        $post_category_id,
                        $content,
                        $id
                    ){
                    global $connection;
                    $query = "UPDATE posts SET 
                    `name`='$name',
                    `thumbnail`='$thumbnail',

                    `content`='$content',
                    `category_id`='$post_category_id',
                    `content` = '$content'
                    WHERE `id` = $id 
                    ";
                    // echo $query;
                    mysqli_query($connection, $query);

//     $query = "INSERT INTO posts   
//                         name,  
//                         slug ,
//                         thumnail,
//                         content,
//                         post_category_id
//                         ) 
//             VALUES (
//                         'name',
//                         'slug'',
//                         'thumnail',
//                         'content',
//                         '$post_category_id'
//                     )";

          //   mysqli_query($connection,$query);
}








?>

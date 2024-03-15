<?php

// require_once '../../module/pdo.php';

function getAllcart()
{
     $query = "SELECT * FROM hoadon";
     pdo_query($query);
     return  pdo_query($query);
}



function getOnecart($id)
{
     $query = "SELECT name AS tenSanPham , price AS giaSanPham ,id as id , mota as mota, img as img  FROM sanpham WHERE `id` = $id";
     pdo_query($query);
     return  pdo_query_one($query);
}





// /**
//  * Lấy sản phẩm bằng danh 
//  * @return array
//  */
function getAllcartCategories()
{

}




// /**
//  * lấy sản phẩm bằng danh mục
//  * @param mixed $category_id
//  * @return array
//  */
function getcartByCategory($category_id)
{

}





function createcart(
     $id,
     $iduser,
     $img,
     $name,
     $price,
     $soluong,
     $idbill

) {
     global $connection;

     $query = "INSERT INTO hoadon (   
                        id,
                        iduser,
                        img,
                        name,
                        price,
                        soluong,
                        idbill
                        ) 
            VALUES (
                        'id',
                        'iduser',
                        'img',
                        'name',
                        'price',
                        'soluong',
                        'idbill'
                    )";

    
}


function updatecart(
    $id,
    $iduser,
    $img,
    $name,
    $price,
    $soluong,
    $idbill
) {
     global $connection;
     $query = "UPDATE hoadon SET 
                    `id`='$id',            
                    `iduser`='$iduser',
                    `img`='$img',
                    `name`='$name',
                    `price` = '$price',
                    `soluong` = '$soluong',
                    WHERE `idbill` =$idbill 
                    ";


     $query = "INSERT INTO hoadon 
                        id,
                        iduser,
                        img,
                        name,
                        price,
                        soluong,
                        idbill
                        ) 
            VALUES (
                        'id',
                        'iduser',
                        'img',
                        'name',
                        'price',
                        'soluong',
                        'idbill'
                    )";

}


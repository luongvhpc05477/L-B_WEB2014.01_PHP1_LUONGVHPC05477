<?php
class danhmuc{
    function insertCategory($nameCategory)
    {
        $sql = "INSERT INTO DANHMUC VALUES(NULL, '$nameCategory')";
        pdo_execute($sql);
    }
    
    function deleteCategory($id)
    {
        $sql = 'DELETE FROM DANHMUC WHERE ID=' . $id;
        pdo_execute($sql);
    }
    
    function loadCategoryAll()
    {
        $sql = 'SELECT * FROM DANHMUC ORDER BY ID DESC';
        return pdo_query($sql);
    }
    
    function updateCategory($id, $name)
    {
        $sql = "UPDATE DANHMUC SET NAME='$name' WHERE ID=$id";
        pdo_execute($sql);
    }
    function loadOne($id)
    {
        $sql = 'SELECT * FROM DANHMUC WHERE ID=' . $id;
        return pdo_query_one($sql);
    }
    
    function loadNameCate($id)
    {
        $sql = 'SELECT * FROM DANHMUC WHERE ID=' . $id;
        extract(pdo_query_one($sql));
        return $name;
    }
    
    
}
$category = new danhmuc;
?>

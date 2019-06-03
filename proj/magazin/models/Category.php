<?php

class Category 
{
    public static function getCategory()
    {
       $db = Db::getConnect();       
       $result = $db->query('Select * from category');
       
       $i = 0;
       $categoryList = [];
       while ($row = $result->fetch()) 
       {
           $categoryList[$i]['id'] = $row['id'];
           $categoryList[$i]['name'] = $row['name'];
           $i++;
       }       
       return $categoryList;
    }
    
    public static function getCategoryProducts($id)
    {
        $db = Db::getConnect();
        $result = $db -> prepare('Select * from product where category_id = :id');
        $result -> execute([':id' => $id]);        
        $categoryProducts = $result -> fetchAll(PDO::FETCH_ASSOC);
        return $categoryProducts;
    }
}
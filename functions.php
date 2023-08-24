<?php
function gettaxprice($conn, $pdid){ 
        $stmt = $conn->prepare("select gst, price from product where id = ".$pdid);
        $result_sql = $stmt->execute();
        $row_sql = $stmt->fetch();
        $gst = str_replace("%", "", $row_sql['gst']);
        $price = $row_sql['price'];
        $tax = ($gst/100)*$price;
        return  round($tax)." (".$row_sql['gst'].")";
}

function getorderdetail($conn, $ordid){
        $stmt = $conn->prepare("select * from orders where order_id = ".$ordid);
        $result_sql = $stmt->execute();
        $row_sql = $stmt->fetch();
        return $row_sql;
}


function slug($pid, $conn){
    $stmt = $conn->prepare('SELECT p.name, c.categories FROM `product` p left join `categories` c on p.categories = c.id  where p.id = '.$pid);
    $result_sql = $stmt->execute();
    $row_sql = $stmt->fetch();
    $slug = str_replace("/", "or", $row_sql['name']);
    $slug = str_replace("-", ">", $slug);
    $slug = str_replace(" ", "-", $slug);
    return $row_sql['categories']."/".$slug;
}

function getIdbySlug($slug, $conn){   
    if(is_numeric($slug['id'])){ return $slug['id']; }
    if(isset($slug['cid'])){
        $id = str_replace("-", " ", $slug['id']);
        $id = str_replace(">", "-",$id);
        //$id = str_replace("or", "/", $id);
        $stmt = $conn->prepare('SELECT p.id FROM `product` p left join `categories` c on p.categories = c.id  where p.name = "'.$id.'" and c.categories="'.$slug['cid'].'"');
        $result_sql = $stmt->execute();
        $row_sql = $stmt->fetch(); 
        return $row_sql['id'];
    }
}



// function slug($pid, $conn){
//     $stmt = $conn->prepare('SELECT p.slug, c.categories FROM `product` p left join `categories` c on p.categories = c.id  where p.id = '.$pid);
//     $result_sql = $stmt->execute();
//     $row_sql = $stmt->fetch(); 
//     return $row_sql['categories']."/".$row_sql['slug'];
// }

// function getIdbySlug($slug, $conn){   
//     if(is_numeric($slug['id'])){ return $slug['id']; }
//     if(isset($slug['cid'])){
//         $stmt = $conn->prepare('SELECT p.id FROM `product` p left join `categories` c on p.categories = c.id  where p.slug = "'.$slug['id'].'" and c.categories="'.$slug['cid'].'"');
//         $result_sql = $stmt->execute();
//         $row_sql = $stmt->fetch(); 
//         return $row_sql['id'];
//     }
// }


?>
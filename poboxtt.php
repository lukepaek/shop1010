<?php
  include('connection/connection.php');  
  session_start();
  
?>

<?php
        $sql = 
        "SELECT	lt.id,
         lt.email,
         lt.product_id,
         lt.qty,
         lt.price,
         lt.qty * lt.price Amount,
         lt.created_date,
         pl.product_desc,
         pl.image_url,
         tl.Total_Item,
         tl.Total_Order
         FROM	Order_List lt
         LEFT JOIN v_product_list pl ON lt.product_id = pl.id
         LEFT JOIN 
         (
             SELECT	COUNT(*) Total_Item, SUM(qty * price) Total_Order, email, status_desc
             FROM	Order_List  
             WHERE	email = 'dymong007@gmail.com' 
                     AND status_desc = 'Cart'
             GROUP	BY email, status_desc
         )tl ON tl.email = lt.email AND  tl.status_desc = tl.status_desc
            WHERE	lt.email = 'dymong007@gmail.com'
         AND lt.status_desc = 'Cart'"; 
        
        $result = sqlsrv_query($conn, $sql);  
?>

<!--
<div id = "frm">  
</div>
-->




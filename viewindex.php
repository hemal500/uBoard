<?php
    $db = new mysqli('localhost', 'root', 'qazwsx', 'tcbforum');
    if(mysqli_connect_errno ())
    {
        echo "Error Database connection error" ;
        //exit;
    }
    $db->select_db('tcbforum');

    $cat_query = "SELECT * FROM forums";
    $result = $db->query($cat_query);

    $table =  "<table class='indextable'>";
    
    for($i=0; $i < $result->num_rows; $i++)
    {
         $row = $result->fetch_assoc();
         if($row['forum_type'] == 0)
         {
             $table .= "<tr class='catrow'>
                            <td class='catnamecell'><span class='catheader'><a href=viewforum.php?f=".$row['forum_id'].">".$row['forum_name']."</a></span></br>
                            <span class='catdescr'>".$row['forum_descr']."</span></td>
                           <td>Topics</td>
                           <td>Posts</td>
                           <td>Last Topic</td>
                       </tr>";

             $forum_query = "SELECT * FROM forums WHERE forum_parent_id=".$row['forum_id'];
             $forum_result = $db->query($forum_query);


             if($forum_result->num_rows > 0)
             {
                 for($j=0; $j < $forum_result->num_rows; $j++)
                 {
                    $frows = $forum_result->fetch_assoc();

                    $table .= "<tr>
                                <td class='fcell'><span class='catheader'><a href=viewforum.php?f=".$frows['forum_id'].">".$frows['forum_name']."</a></span></br>
                                <span class='catdescr'>".$frows['forum_descr']."</span></td>
                           </tr>";
                 }
             }
         }
    }

    $table .= "</table>";
    echo $table;


?>


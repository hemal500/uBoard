<?php
    include_once 'header_main.php';
    $forum_id = $_GET['f'];

    $db = new mysqli('localhost', 'root', 'qazwsx', 'tcbforum');
    if(mysqli_connect_errno ())
    {
        echo "Error Database connection error" ;
        exit;
    }
    $db->select_db('tcbforum');

    $query = "SELECT * FROM topics WHERE forum_id=".$forum_id;
    $results = $db->query($query);

    $forum_query_results = $db->query("SELECT forum_name FROM forums WHERE forum_id=".$forum_id);
    $fname = $forum_query_results->fetch_assoc();

    $table =  "<table class='indextable'>";
    $table .= "<tr class='forumtitlerow'>
                   <td class='catnamecell'><span class='catheader'>".$fname['forum_name']."</span></td>
               </tr>";
    $table .= "<form action='topicposting.php' method='get'>
                <tr>
                    <td><input type='submit' value='New Topic'/></td>
                </tr>
               </form>";
    
    $table .= "<tr class='catrow'>
                   <td class='catnamecell'><span class='catheader'>Topics</span></td>
                   <td>Replies</td>
                   <td>Views</td>
                   <td>Last Post</td>
               </tr>";
    for($i=0; $i < $result->num_rows; $i++)
    {
         $row = $result->fetch_assoc();
         $table .= "<tr class='catrow'>
                            <td class='catnamecell'><span class='catheader'><a href=viewtopic.php?t=".$row['topic_id'].">".$row['topic_title']."</a></span></td>
                           <td>Topics</td>
                           <td>Posts</td>
                           <td>Last Topic</td>
                       </tr>";
    }
    $table .= "</table>";
    echo $table;

    include_once 'footer_main.php';
?>

<?php

/**
 * reviews management functions[approve,disapprove,del,display]
 * 
 * @author mohamed hussein 
 * @copyright 2017
 */
include_once('../includes/common.functions.php');

/**
 * approve review
 * @param int $id review id
 * @param int $revId reviewer id
 */
 function approveReview($id,$revId)
 {
    global $mysqli;
    $sql="UPDATE reviews SET approvedBy=$revId,approvalDate= NOW() WHERE reviewID=$id ";  
          $mysqli->query($sql)or die("query failed due to ".mysqli_error());
          logSuccess("review approved successfully");
 }
 
 /**
  * disapprove review
  * @param int $id review id
  */
  function unapproveReview($id)
 {
    global $mysqli;
    $sql="UPDATE reviews SET approvedBy=NULL WHERE reviewID=$id ";  
          $mysqli->query($sql)or die("query failed due to ".mysqli_error());
          logSuccess("review unapproved successfully");
 }
 
 /**
  * delete review
  * @param int $id review id
  */
  function delReview($id)
  {
    global $mysqli;
    $sql="DELETE FROM reviews WHERE reviewID=$id ";
   $mysqli->query($sql)or die("query failed due to ".mysqli_error());
    logSuccess("review deleted successfully");
  }
 
 /**
  * display all reviews and management actions
  * @param result $result query result
  */
  function displayReviews($result)
  {
    global $mysqli;
    echo '<table><tr><th>N</th><th>Review</th><th>Author</th> <th>App Name</th> <th>Review Date</th><th>actions</th></tr>';
       $count=1;
        while($row=$result->fetch_assoc())
        {
            if($row['approvedBy']==NULL)
            {
                echo '<tr id="unapproved">';
                $action="approve";
                $actionStr="approve";
            }
            else
            {
                echo '<tr id="approved">';
                $action="unapprove";
                $actionStr="unapprove";
            }
            echo '<td>'.$count.'</td>';
            $count++;
            echo '<td>'.$row['reveiwContent'].'</td>';
            echo '<td>'.$row['userFirstName'].' '.$row['userLastName'].'</td>';
            echo '<td>'.$row['appName'].'</td>';
            echo '<td>'.date('d-m-Y',strtotime($row['reviewDate'])).'</td>';
            echo '<td><a href="./reviews.php?action='.$action.'&id='.$row['reviewID'].'" id="hrefBtn">'.$actionStr.'</a>';
            echo '<a href="./reviews.php?action=del&id='.$row['reviewID'].'" id="hrefBtn">delete</a></td></tr>';
        }
        echo '</table>';
  }
  
?>
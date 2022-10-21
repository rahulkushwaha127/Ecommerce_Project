<?php 

    require('top.inc.php');

    if(isset($_GET['type']) && $_GET['type']!=''){
        $type = get_safe_value($con, $_GET['type']);
        if($type=='delete'){
            $id = get_safe_value($con, $_GET['id']);
            $delete_sql="delete from   where id='$id' ";
            mysqli_query($con, $delete_sql);
        }
    }

    $sql = "SELECT * from contact_us order by id asc";
    $res = mysqli_query($con, $sql);
    
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                         <h4 class="box-title">Contact_us </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                <tr class="text-center">
                                    
                                    <th >ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>mobile</th>
                                    <th>Query</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                    <?php $i=1;  while($row = mysqli_fetch_assoc($res)){?>
                                
                                <tr class="text-center">                                   
                                    <td><?php  echo "$row[id]";?></td>
                                    <td><?php  echo "$row[name]"; ?></td>
                                    <td><?php  echo "$row[email]"; ?></td>
                                    <td><?php  echo "$row[mobile]"; ?></td>
                                    <td><?php  echo "$row[comment]"; ?></td>
                                    <td><?php  echo "$row[added_on]"; ?></td>
                                    <td>
                                        <?php
                                        echo "<a  href='?type=delete&id=".$row['id']."'><span class='badge badge-delete'>Delete</span></a>";
                                        ?>
                                    </td>                                    
                                </tr>
                    <?php } ?>            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
             
<?php 
   require('footer.inc.php')
?>       
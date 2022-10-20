<?php 

    require('top.inc.php');

    if(isset($_GET['type']) && $_GET['type']!=''){
        $type = get_safe_value($con, $_GET['type']);
        if($type=='status'){
            $operation = get_safe_value($con, $_GET['operation']);
            $id = get_safe_value($con, $_GET['id']);
            if($operation=='active'){
                $status='1';
            }else{
                $status='0';
            }
            $update_status_sql="update categories set status='$status' where id='$id' ";
            mysqli_query($con, $update_status_sql);
        }
        if($type=='delete'){
            $id = get_safe_value($con, $_GET['id']);
            $delete_sql="delete from categories  where id='$id' ";
            mysqli_query($con, $delete_sql);
        
        

        }
    }

    $sql = "SELECT * from categories order by categories asc";
    $res = mysqli_query($con, $sql);
    
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                         <h4 class="box-title">Category </h4>
                         <h4 class="box-link"> <a href="manage_categories.php" >Add categories</a></h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                <tr class="text-center">
                                    
                                    <th >ID</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                    <?php $i=1;  while($row = mysqli_fetch_assoc($res)){?>
                                
                                <tr class="text-center">                                   
                                    <td><?php  echo "$row[id]";?></td>
                                    <td><?php  echo "$row[categories]"; ?></td>
                                    <td>
                                        <?php 
                                             if($row['status']=='1'){
                                                echo " <a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a> ";
                                             }else{
                                                echo " <a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a> ";
                                             }
                                        ?>
                                    </td>
                                    <td class="   btn-outline-success ">
                                        <?php
                                        echo "<a  href='?type=edit&id=".$row['id']."'>Edit</a>";
                                        ?>
                                    </td>
                                    <td class="   btn-outline-danger ">
                                        <?php
                                        echo "<a  href='?type=delete&id=".$row['id']."'>Delete</a>";
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
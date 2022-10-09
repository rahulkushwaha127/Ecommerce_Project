<?php 

    require('top.inc.php');
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
                                                echo "Active";
                                             }else{
                                                echo "Deactive";
                                             }
                                        ?>
                                    </td>
                                    <td><button class="button btn-outline-success btn ">Edit</button></td>
                                    <td><button class="button btn-outline-danger btn  ">Delete</button></td>                                    
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
<?php 

    require('top.inc.php'); 
    
    if(isset($_POST['submit'])){
        $categories=get_safe_value($con, $_POST['categories']);
        $sql="insert into categories ( categories, status) values ('$categories','1')";
        mysqli_query($con, $sql);
        header('location:categories.php');
        die();
    }
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                        <form method="post">
                        <div class="card-body card-block">
                           <div class="form-group">
                              <label for="categories" class=" form-control-label">Categories</label>
                              <input type="text" name="categories" class="form-control" placeholder="Enter Categories" required>
                           </div>
                           <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">Submit</button>
                        </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
<?php 
   require('footer.inc.php')
?>       
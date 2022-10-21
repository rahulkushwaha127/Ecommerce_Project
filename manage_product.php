<?php 
    require('top.inc.php'); 
    $categories='';
    $msg='';
    $categories_id='';
    $name='';
    $mrp='';
    $price='';
    $qty='';
    $image='';
    $short_desc='';
    $description='';
    $meta_title='';
    $meta_desc='';
    $meta_keyword='';
    if(isset($_GET['id']) && $_GET['id']!=''){
      $id=get_safe_value($con, $_GET['id']);
      $res=mysqli_query($con, "select * from product where id='$id' ");

      $check=mysqli_num_rows($res);
      if($check>0){
         $row=mysqli_fetch_assoc($res);
         $id=$row['id'];
         $categories=$row['categories_id'];
         $name=$row['name'];
         $mrp=$row['mrp'];
         $price=$row['price'];
         $qty=$row['qty'];
         $short_desc=$row['short_desc'];
         $description=$row['description'];
         $meta_title=$row['meta_title'];
         $meta_desc=$row['meta_desc'];
         $meta_keyword=$row['meta_keyword'];
         
      }else{
         header('location:product.php');
      }
   }
    
    if(isset($_POST['submit'])){
        $categories_id=get_safe_value($con, $_POST['categories_id']);
        $name=get_safe_value($con, $_POST['name']);
        $id=get_safe_value($con, $_POST['id']);
        $mrp=get_safe_value($con, $_POST['mrp']);
        $price=get_safe_value($con, $_POST['price']);
        $qty=get_safe_value($con, $_POST['qty']);
        $short_desc=get_safe_value($con, $_POST['short_desc']);
        $description=get_safe_value($con, $_POST['description']);
        $meta_title=get_safe_value($con, $_POST['meta_title']);
        $meta_desc=get_safe_value($con, $_POST['meta_desc']);
        $meta_keyword=get_safe_value($con, $_POST['meta_keyword']);
        
        
         $res=mysqli_query($con, "select * from product where name='$name' ");
         $check=mysqli_num_rows($res);
         if($check>0){
            $msg="product Already exist";

         }else{

         if($msg==''){
            if(isset($_GET['id']) && $_GET['id']!=''){
               mysqli_query($con,"update product set categories_id='$categories_id', name='$name',mrp='$mrp',price='$price',qty='$qty',image='$image',
               short_desc='$short_desc',description='$description',meta_title='$meta_title' ,meta_desc='$meta_desc',meta_keyword='$meta_keyword' where id='$id' ");
            }else{
               mysqli_query($con,
               "INSERT INTO `product`( `categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`)
                              VALUES ( '$categories_id','$name', '$mrp', '$price','$qty','$image','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1)");
            }
            header('location:product.php');
            die();
         }
      }
    }
?>
<div class="content pb-0">
   <div class="animated fadeIn">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header"><strong>Product</strong><small> Form</small></div>
               <form method="post">
               <div class="card-body card-block">

                  <div class="form-group">
                  <label for="categories" class=" form-control-label">Category</label>
                  <select class=" form-control">
                     <option value="">select category</option>
                     <?php
                     $res=mysqli_query($con,"select id,categories from categories order by categories asc");
                     
                     while($row=mysqli_fetch_assoc($res)){
                        if($row['id']==$categories_id){
                           echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
                        }else{
                           echo "<option value=".$row['id'].">".$row['categories']."</option>";
                        }
                        
                     } ?>
                  </select>
                  </div>

                  <div class="form-group">
                  <label for="categories" class=" form-control-label">Product Name</label>
                     <input type="text" name="name"  class="form-control" 
                     placeholder="Enter Product Name" required 
                     value="<?php echo $name ?>">
                  </div>

                  <div class="form-group">
                  <label for="mrp" class=" form-control-label"> MRP</label>
                     <input type="text" name="mrp"  class="form-control" 
                     placeholder="Enter Product  MRP" required 
                     value="<?php echo $mrp ?>">
                  </div>

                  <div class="form-group">
                  <label for="price" class=" form-control-label"> Price</label>
                     <input type="text" name="price"  class="form-control" 
                     placeholder="Enter Product  price" required 
                     value="<?php echo $price ?>">
                  </div>

                  <div class="form-group">
                  <label for="qty" class=" form-control-label">Quantity</label>
                     <input type="text" name="qty"  class="form-control" 
                     placeholder="Enter Product Quantity" required 
                     value="<?php echo $qty ?>">
                  </div>

                  <div class="form-group">
                  <label for="image" class=" form-control-label">Image</label>
                     <input type="file" name="image"  class="form-control" 
                     placeholder=""  >
                  </div>

                  <div class="form-group">
                  <label for="short_desc" class=" form-control-label">Short Description</label>
                     <textarea name="short_desc"   class="form-control" 
                     placeholder="Enter Product Short Description" required 
                     <?php echo $short_desc ?>></textarea>
                  </div>

                  <div class="form-group">
                  <label for="description" class=" form-control-label">Description</label>
                     <textarea name="description"   class="form-control" 
                     placeholder="Enter Product Description" required 
                     <?php echo $description ?>></textarea>
                  </div>

                  <div class="form-group">
                  <label for="meta_title" class=" form-control-label">Meta Title</label>
                     <input type="text" name="meta_title"  class="form-control" 
                     placeholder="Enter Product Meta Title"  
                     value="<?php echo $meta_title ?>">
                  </div>

                  <div class="form-group">
                  <label for="meta_desc" class=" form-control-label">Meta Description</label>
                     <input type="text" name="meta_desc"  class="form-control" 
                     placeholder="Enter Product Meta Description"  
                     value="<?php echo $meta_desc ?>">
                  </div>

                  <div class="form-group">
                  <label for="meta_keyword" class=" form-control-label">Meta Keyword</label>
                     <input type="text" name="meta_keyword"  class="form-control" 
                     placeholder="Enter Product Meta Keyword" required 
                     value="<?php echo $meta_keyword ?>">
                  </div>
               
               
                  <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">Submit</button>
                  <div class =field_error  ;><?php echo $msg ; ?></div>
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
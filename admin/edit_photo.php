<?php 

require_once("includes/init.php");

if(!$session->is_signed_in()) {
redirect("login.php");
}


if(empty($_GET['id'])) {
    
 redirect("photos.php");   
    
} else {
    
    $photo = Photo::find_by_id($_GET['id']);
    
    if(isset($_POST['update'])) {
        
    if($photo) {
        
        $photo->title = $_POST['title'];
        $photo->caption = $_POST['caption'];
        $photo->alternate_text = $_POST['alternate_text'];
        $photo->description = $_POST['description'];
        
        
        $photo->save();
        
    }    
        
    }
    
}




require_once("includes/header.php"); 

?>


        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Home Page</a>
            </div>
            <!-- Top Menu Items -->
          <?php include("includes/top_nav.php"); ?>
            
            
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
            <?php include("includes/side_nav.php"); ?>
            
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

         
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Photos <small>Statistics Overview</small>
                        </h1>
                      
     
 <form action="" method="post">                       
                        
<div class="col-md-8">
  
    <div class="form-group">
    <input type="text" name="title" class="form-control" value="<?=$photo->title?>">
    </div>
    
    
    
      <div class="form-group">
   <a href="#"><img src="<?=$photo->picture_path();?>" alt="" width="150" class="img-thumbnail"> </a>
    </div>
    
    
     <div class="form-group">
    <label for="caption">Caption</label>
    <input type="text" name="caption" class="form-control" value="<?=$photo->caption?>">
    </div>
    
    
    
     <div class="form-group">
    <label for="alternate_text">Alternate Text</label>
    <input type="text" name="alternate_text" class="form-control" id="alternate_text" value="<?=$photo->alternate_text?>" >
    </div>
    
    
    
    
     <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" id="" cols="30" rows="10"><?=$photo->description?></textarea>
           
    </div>
    
    
   </div>              

                        
<div class="col-md-4">
                        
   <div class="photo-info-box side_style" >
    <div class="info-box-header">
    <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>   
       
    </div>
       
    <div class="inside">
     <div class="box-inner">
     <p class="text">
         
       <span class="glyphicon glyphicon-calendar"></span>  
       Uploaded on:
    </p> 
    <p class="text">
     
        Photo Id: <span class="data photo_id_box">34</span>
         
    </p>
         
     <p class="text">
     
        Filename: <span class="data ">image.jpg</span>
         
    </p>
         
         
     <p class="text">
     
        File Type: <span class="data ">JPG</span>
         
    </p>
         
         
     <p class="text">
     
        File Size: <span class="data ">3245346</span>
         
    </p>
  
        
     </div> 
        
        
<div class="info-box-footer clearfix">
     <div class="info-box-delete pull-left">
    
    <a href="delete_photo.php?id=<?=$photo->id?>" class="btn btn-lg btn-danger">Delete</a>
    </div>

<div class="info-box-update pull-right">
    
   <input type="submit" name="update" value="Update" class="btn btn-lg btn-success">
  
    
    </div>
        
</div>
       
       
    </div>
    
   </div>                     
                        
</div>
                        
   </form>                     
                        
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
                <!-- /.row -->
            </div>              
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <?php include("includes/footer.php"); ?>
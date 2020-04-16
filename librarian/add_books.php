<?php 
    session_start();

    if(!isset($_SESSION["librarian"]))
    {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    include "connection.php";
    include "header.php";

?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add Books Info</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Books Name" name="booksname" required=""></td>
                                        </tr>
                                        <tr>
                                            <td>Books Image<input type="file" class="form-control" name="fl" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Books Author Name" name="booksauthorname" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Publication Name" name="pname" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Books Purchage date" name="bpurchasedt" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Books Price" name="bprice" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Books Quantity" name="bqty" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Available Quantity" name="aqty" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="submit" name="submit1" class="btn btn-default submit" value="Submit"></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php 
    if(isset($_POST["submit1"])){

        $destination_path = getcwd().DIRECTORY_SEPARATOR;
        $tm=md5(time());
        $fnm= $_FILES["fl"]["name"];
        $dst= $destination_path."./books_image/".$tm.$fnm;
        $dst1="books_image/".$tm.$fnm;

        move_uploaded_file($_FILES["fl"]["tmp_name"], $dst);

        mysqli_query($link,"INSERT INTO `add_books` (`id`, `books_name`, `books_image`, `books_author_name`, `books_publication_name`, `books_purchase_date`, `books_price`, `books_qty`, `available_qty`, `librarian_username`) 
                                            VALUES (NULL, '$_POST[booksname]', '$dst1', '$_POST[booksauthorname]', '$_POST[pname]', '$_POST[bpurchasedt]', '$_POST[bprice]', '$_POST[bqty]', '$_POST[aqty]', '$_SESSION[librarian]');" );
     ?>
        <script type="text/javascript">
            alert("books insert successfully");
        </script>

     <?php                                       
    }    
?>

<?php 
    include "footer.php";
?>
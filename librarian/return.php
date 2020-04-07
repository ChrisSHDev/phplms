<?php 

    include "connection.php";
    $id=$_GET["id"];
    $returnDate = date("d-m-Y");
    $res=mysqli_query($link, "update issue_books set books_return_date= '$returnDate' where id=$id");

?>

<script type="text/javascript">
    window.location="return_book.php";
</script>
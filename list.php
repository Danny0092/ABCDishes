<?php
  $nav_selected = "LIST";
  $left_buttons = "NO";
  $left_selected = "";
  
require 'functions.php';
require 'db_configuration.php';

$query = "SELECT * FROM dishes";
//list
$GLOBALS['data'] = mysqli_query($db, $query);
// $GLOBALS['ID'] = mysqli_query($db, $query);
// $GLOBALS['Name'] = mysqli_query($db, $query);
// $GLOBALS['Type'] = mysqli_query($db, $query);
// $GLOBALS['State'] = mysqli_query($db, $query);
// $GLOBALS['Country'] = mysqli_query($db, $query);
// $GLOBALS['Description'] = mysqli_query($db, $query);
// $GLOBALS['Recipe_links'] = mysqli_query($db, $query);
// $GLOBALS['Video_links'] = mysqli_query($db, $query);
// $GLOBALS['Status'] = mysqli_query($db, $query);
// $GLOBALS['Notes'] = mysqli_query($db, $query);
  include("./nav.php");
  
?>

<?php include("./footer.php"); ?>

<?php $page_title = 'Dishes list'; ?>
<?php 
    $page="list.php";
    //verifyLogin($page);
?>

<style>
    #title {
        text-align: center;
        color: darkgoldenrod;
    }
    thead input {
        width: 100%;
    }
    .thumbnailSize{
        height: 100px;
        width: 100px;
        transition:transform 0.25s ease;
    }
    .thumbnailSize:hover {
        -webkit-transform:scale(3.5);
        transform:scale(3.5);
    }
</style>

<!-- Page Content -->
<br><br>
<div class="container-fluid">
<?php
        if(isset($_GET['createPuzzle'])){
            if($_GET["createPuzzle"] == "Success"){
                echo '<br><h3>Success! Your puzzle has been added!</h3>';
            }
        }

        if(isset($_GET['puzzleUpdated'])){
            if($_GET["puzzleUpdated"] == "Success"){
                echo '<br><h3>Success! Your puzzle has been modified!</h3>';
            }
        }

        if(isset($_GET['puzzleDeleted'])){
            if($_GET["puzzleDeleted"] == "Success"){
                echo '<br><h3>Success! Your puzzle has been deleted!</h3>';
            }
        }

        if(isset($_GET['createTopic'])){
            if($_GET["createTopic"] == "Success"){
                echo '<br><h3>Success! Your topic has been added!</h3>';
            }
        }

        if(isset($_GET['questionDeleted'])){
            if($_GET["questionDeleted"] == "Success"){
                echo '<br><h3>Success! Your topic has been addedTEST TEST!</h3>';
            }
        }
    ?>
   
   
    <h2 id="title">Dishes List</h2><br>
    
    <div id="customerTableView">
        <button><a class="btn btn-sm" href="createPuzzle.php">Create a Dish</a></button>
        <table class="display" id="ceremoniesTable" style="width:100%">
            <div class="table responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Names</th>
                    <th>Type</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Description</th>
                    <th>Recipe links</th>
                    <th>Video links</th>                
                    <th>Status</th>
                    <th>Notes</th>
                    <th>Modify</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // fetch the data from $_GLOBALS
                if ($data->num_rows > 0) {
                    // output data of each row
                    while($row = $data->fetch_assoc()) {
                        echo '<tr>
                                <td>'.$row["ID"].'</td>
                                <td>'.$row["Name"].' </span> </td>
                                <td>'.$row["Type"].'</td>
                                <td>'.$row["State"].'</td>
                                <td>'.$row["Country"].' </span> </td>
                                <td>'.$row["Description"].' </span> </td>
                                <td>'.$row["Recipe_links"].' </span> </td>
                                <td>'.$row["Video_links"].' </span> </td>
                                <td>'.$row["Status"].' </span> </td>
                                <td>'.$row["Notes"].' </span> </td>
                                                                                                                     
                                <td><a class="btn btn-warning btn-sm" href="modifyDish.php?id='.$row["ID"].'">Modify</a></td>
                                <td><a class="btn btn-danger btn-sm" href="deleteDish.php?id='.$row["ID"].'">Delete</a></td>
                            </tr>';
                    }//end while
                }//end if
                else {
                    echo "0 results";
                }//end else
                ?>
                </tbody>
            </div>
        </table>
    </div>
</div>

<!-- /.container -->
<!-- Footer -->
<footer class="page-footer text-center">
   
</footer>

<!--JQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

<!--Data Table-->
<script type="text/javascript" charset="utf8"
        src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

<script type="text/javascript" language="javascript">
    $(document).ready( function () {
        
        $('#ceremoniesTable').DataTable( {
            dom: 'lfrtBip',
            buttons: [
                'copy', 'excel', 'csv', 'pdf'
            ] }
        );

        $('#ceremoniesTable thead tr').clone(true).appendTo( '#ceremoniesTable thead' );
        $('#ceremoniesTable thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    
        var table = $('#ceremoniesTable').DataTable( {
            orderCellsTop: true,
            fixedHeader: true,
            retrieve: true
        } );
        
    } );

</script>
</body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Events</title>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

  </head>
  <body>
      <div class="container">
        <div class="row justify-content-center text-center">
            <div class="row">
                <div class="col-md-9">
                    <?php
                        include 'config.php';
                        $eventTables = $conn->query( "SELECT * FROM event") or die( $conn->error);
                    ?>
                    <div class="row justify-content-center">
                        <table class="table">
                            <thead>
                                <tr >
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center" colspan="3">Actions</th>
                                </tr>
                            </thead>
                            <?php while( $row = $eventTables->fetch_assoc() ): ?>
                                <tr>
                                    <td class="text-right"><?php echo $row['name'];?></td>
                                    <td class="text-left"><?php echo $row['description'];?></td>
                                    <td><?php echo $row['date'];?></td>
                                    <td>
                                        <a href="events.php?use=<?php echo $row['eventid']; ?>" class="btn btn-primary">Use</a>
                                        <a href="events.php?view=<?php echo $row['eventid']; ?>" class="btn btn-info">View</a>
                                        <a href="event_add.php?delete=<?php echo $row['eventid']; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </table>
                    </div>
                </div>
                <div class="col-md-3">
                    <?php 
                        require_once 'event_add.php'; 
                    ?>
                    <form action="event_add.php" method="POST">
                        <div class="form-group">
                            <label for="name">Event Name</label>
                            <input type="text" class="form-control" placeholder="Enter event name" name="name" >
                        </div>
                        <div class="form-group">
                            <label>Event Description</label>
                            <textarea class="form-control" placeholder="Enter event description" name="desc" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="date">Event Date</label>
                            <input class="form-control" name="date" placeholder="MM-DD-YYYY" type ="text"/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="save">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </body>
    
    <!--- Datepicker--->
    <script>
        $(document).ready(function(){
            var date_input=$('input[name="date"]');
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'mm-dd-yyyy',
                container: container,
                todayHighlight: true,
              autoclose: true,
            })
        })
    </script>
    
</html>
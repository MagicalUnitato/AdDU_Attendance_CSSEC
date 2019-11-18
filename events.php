<!doctype html>

<?php
    session_start();
    include_once 'config.php';
    $eventTables = $conn->query( "SELECT * FROM event") or die( $conn->error);
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Events</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/custom.css"/>
  </head>

  <body>
    <div class="navbar navbar-default navbar-static-top navbar-expand-lg navbar-dark" role="navigation">
        <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <a class="navbar-brand" href="#">
                <img src="img/avatar_2x_w.png" width="50" height="50">
                AdDU Computer Studies Cluster
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="events.php">Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registerAdDU.php">Attendance</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
      <div class="container">
        <div class="row justify-content-center text-center">
            <div class="row">
                <div class="col-md-9 justify-content-center">
                    <div class="row justify-content-center">
                        <table class="table table-striped">
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
                                        <a href="registerAdDU.php?use=<?php echo $row['eventid']; ?>" class="btn btn-primary">Use</a>
                                        <a href="viewEvent.php?view=<?php echo $row['eventid']; ?>" class="btn btn-info">View</a>
                                        <a href="processEvent.php?delete=<?php echo $row['eventid']; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </table>
                    </div>
                </div>
                <div class="col-md-3">
                    <?php
                        require_once 'processEvent.php';
                    ?>
                    <form action="processEvent.php" method="POST">

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

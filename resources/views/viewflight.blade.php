<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('vendor/bootstrap/css/styles.css')}}" rel="stylesheet" />
        <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>

        <title>Jittawan Web-Application</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    </head>
    <style>
        .select,
        #locale {
            width: 100%;
        }
        .like {
            margin-right: 10px;
        }
    </style>

    <script>

    </script>
    <body>
    <?php if(isset($carrier)) echo $carrier; ?>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Start Flight</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Main Menu</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Reports</a>

                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4">Main Menu</h1>
                    <form action="viewflight" method="post">
                    <table style="line-height:2em;">
                        <tr>
                            <td>Arr/Dep : &nbsp;</td>
                            <td><input type="radio" name="arr_dep" value="1" id="inp_ad"/>Arrival
                                <input type="radio" name="arr_dep" value="2" id="inp_ad"/>Departure
                            </td>
                        </tr>
                        <tr>
                            <td>Schedule Date Range :&nbsp;</td>
                            <td>
                            <input type="text" id="st_date" name="st_date" style="width:100px;height:1.75em;"/> to 
                            <input type="text" id="en_date" name="en_date" style="width:100px;height:1.75em;"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Carrier : &nbsp;</td>
                            <td><input type="text" id="inp_carrier" name="inp_carrier" style="width:50px;height:1.75em;"/>&nbsp;&nbsp;&nbsp;
                            Flt No. : &nbsp;<input type="text" id="inp_fltno" name="inp_fltno" style="width:50px;height:1.75em;"/>&nbsp;&nbsp;&nbsp;
                            Aircraft Type : &nbsp;<input type="text" id="inp_airport" name="inp_airport" style="width:100px;height:1.75em;"/>&nbsp;&nbsp;&nbsp;
                            <input type="submit" id="btn_show" value="show"/>
                            </td>
                        </tr>
                    </table>
                    </form>
                    <hr/>
                    
                    <table class="table table-striped table-bordered" id="sortTable">
                        <thead>
                        <th>STA_TM</th>    
                        <th>CARRIER</th>
                        <th>FLIGHTS No</th> 
                        <th>AcftType</th> 
                        <th>Gate</th> 
                        <th>Position</th> 
                        </thead>
                        <tbody>
                        <?php
                            $first=DB::table('Flight_Information')
                                    ->where('flight_type','=','Arrival')
                                    ->get();
                            foreach ($first as $object2){
                                echo "<tr>";
                                echo "<td>".$object2->schedule_date."</td>";
                                echo "<td>".$object2->carrier."</td>";
                                echo "<td>".$object2->flight_no."</td>";
                                echo "<td>".$object2->aircraft_type."</td>";
                                echo "<td>".$object2->gate."</td>";
                                echo "<td>".$object2->pos."</td>";
                                echo "</tr>";
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('vendor/bootstrap/js/scripts.js')}}"></script>

    </body>

    <script>
    $('#sortTable').DataTable();

    
    </script>

    <script>
    function sortTable() {
        var tables, sort, i, x, y, tableSort;
        tables = document.getElementById("#SortmyTable");

        sort= true;
        while (sort) {
            sort = false;
            tblrow = tables.rows; 
            
            for (i = 1; i < (tblrow.length - 1); i++) {
                ableSort = false;
                x = tblrow[i].getElementsByTagName("td")[n];
                y = tblrow[i + 1].getElementsByTagName("td")[n];
                if (x.innerHTML.toUpperCase() > y.innerHTML.toUpperCase()) {
                    tableSort = true;
                    break;
                }
            }
            if (tableSort) {
                tblrow[i].parentNode.insertBefore(tblrow[i + 1], tblrow[i]);
                sort = true;
            }
        }
    }
</script>
</html>

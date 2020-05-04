<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Gestion - Patients</title>
    <meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  	<link rel="stylesheet" type="text/css" href="css/panel/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="css/panel/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="css/panel/animate.css">
  	<link rel="stylesheet" type="text/css" href="css/panel/select2.min.css">
  	<link rel="stylesheet" type="text/css" href="css/panel/perfect-scrollbar.css">
  	<link rel="stylesheet" type="text/css" href="css/panel/util.css">
  	<link rel="stylesheet" type="text/css" href="css/panel/main.css">
  </head>
  <body>
    <div class="limiter">
      <div class="container-table100">
        <div class="wrap-table100">
          <div class="table100 ver1 m-b-110">
            <div class="table100-head">
              <table id="tablePatient">
                <thead>
                  <tr class="row100 head">
                    <th class="cell100 column1">Nom fichier</th>
                  </tr>
                </thead>
              </table>
            </div>

            <div class="table100-body js-pscroll">
              <table>
                <tbody>
                  <tr class="row100 body">
                    <td class="cell100 column1"><a href="dossier.pdf">dossier.pdf</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="js/panel/jquery-3.2.1.min.js"></script>
  	<script src="js/panel/popper.js"></script>
  	<script src="js/panel/bootstrap.min.js"></script>
  	<script src="js/panel/select2.min.js"></script>
  	<script src="js/panel/perfect-scrollbar.min.js"></script>
    <script src="js/panel/datatables.min.js"></script>
    <script>
      $(function (){
        $("tablePatient").DataTable({
          "responsive": true,
          "autoWidth": false,
          "searching": true,
          "info": true,
          "lengthching": true
        });
      });
    </script>
    <script>
      $('.js-pscroll').each(function(){
        var ps = new PerfectScrollbar(this);
        $(window).on('resize', function(){
          ps.update();
        })
      });
    </script>
    <script src="js/panel/main.js"></script>
  </body>
</html>

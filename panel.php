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
    <style>
      a {
        text-decoration: none;
        color: #808080;
      }
      a:hover {
        text-decoration: none;
        color: #808080;
      }
    </style>
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
                    <th class="cell100 column1">Nom Patient</th>
                    <th class="cell100 column2">Type</th>
                    <th class="cell100 column4">Medecin suiveur</th>
                    <th class="cell100 column5">Nombres Documents</th>
                  </tr>
                </thead>
              </table>
            </div>

            <div class="table100-body js-pscroll">
              <table>
                <tbody>
                  <tr class="row100 body">
                    <td class="cell100 column1"><a href="file.php">Victorine Drouin</a></td>
                    <td class="cell100 column2">Covid-19</td>
                    <td class="cell100 column4">Aaron Chapman</td>
                    <td class="cell100 column5">1</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Vallis Trudeau</td>
                    <td class="cell100 column2">Covid-19</td>
                    <td class="cell100 column4">Adam Stewart</td>
                    <td class="cell100 column5">2</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Clarice Rousseau</td>
                    <td class="cell100 column2">Accident</td>
                    <td class="cell100 column4">Aaron Chapman</td>
                    <td class="cell100 column5">1</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Montague Leblanc</td>
                    <td class="cell100 column2">Covid-19</td>
                    <td class="cell100 column4">Donna Wilson</td>
                    <td class="cell100 column5">1</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Brie Savard</td>
                    <td class="cell100 column2">Covid-19</td>
                    <td class="cell100 column4">Donna Wilson</td>
                    <td class="cell100 column5">3</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Valérie Méthot</td>
                    <td class="cell100 column2">Covid-19</td>
                    <td class="cell100 column4">Donna Wilson</td>
                    <td class="cell100 column5">2</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Jules Talon</td>
                    <td class="cell100 column2">Accident</td>
                    <td class="cell100 column4">Randy Porter</td>
                    <td class="cell100 column5">1</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Carine Moïse</td>
                    <td class="cell100 column2">Accident</td>
                    <td class="cell100 column4">Randy Porter</td>
                    <td class="cell100 column5">1</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Maurelle Loiselle</td>
                    <td class="cell100 column2">Covid-19</td>
                    <td class="cell100 column4">Randy Porter</td>
                    <td class="cell100 column5">2</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Joséphine Cousteau</td>
                    <td class="cell100 column2">Covid-19</td>
                    <td class="cell100 column4">Donna Wilson</td>
                    <td class="cell100 column5">1</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Morgana Plante</td>
                    <td class="cell100 column2">Accident</td>
                    <td class="cell100 column4">Randy Porter</td>
                    <td class="cell100 column5">1</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Noémi Pelletier</td>
                    <td class="cell100 column2">Covid-19</td>
                    <td class="cell100 column4">Aaron Chapman</td>
                    <td class="cell100 column5">1</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Charles Riel</td>
                    <td class="cell100 column2">Covid-19</td>
                    <td class="cell100 column4">Adam Stewart</td>
                    <td class="cell100 column5">15</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Leverett Dumont</td>
                    <td class="cell100 column2">Accident</td>
                    <td class="cell100 column4">Aaron Chapman</td>
                    <td class="cell100 column5">10</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Curtis Mailly</td>
                    <td class="cell100 column2">Covid-19</td>
                    <td class="cell100 column4">Donna Wilson</td>
                    <td class="cell100 column5">15</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Demi Truchon</td>
                    <td class="cell100 column2">Covid-19</td>
                    <td class="cell100 column4">Donna Wilson</td>
                    <td class="cell100 column5">10</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">André Bonami</td>
                    <td class="cell100 column2">Covid-19</td>
                    <td class="cell100 column4">Donna Wilson</td>
                    <td class="cell100 column5">20</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Amedee Echeverri</td>
                    <td class="cell100 column2">Accident</td>
                    <td class="cell100 column4">Randy Porter</td>
                    <td class="cell100 column5">10</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Crescent Deschênes</td>
                    <td class="cell100 column2">Accident</td>
                    <td class="cell100 column4">Randy Porter</td>
                    <td class="cell100 column5">10</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Cammile Desjardins</td>
                    <td class="cell100 column2">Covid-19</td>
                    <td class="cell100 column4">Randy Porter</td>
                    <td class="cell100 column5">15</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Baptiste Desilets</td>
                    <td class="cell100 column2">Covid-19</td>
                    <td class="cell100 column4">Donna Wilson</td>
                    <td class="cell100 column5">20</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cell100 column1">Lyle Neufville</td>
                    <td class="cell100 column2">Accident</td>
                    <td class="cell100 column4">Randy Porter</td>
                    <td class="cell100 column5">20</td>
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

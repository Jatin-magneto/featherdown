<?php
/* @var $this SiteController 

$this->pageTitle=Yii::app()->name;
*/
Yii::app()->clientScript->registerCoreScript('jquery');  
?>

<div class="container-fluid"> 
      
      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-title"> Dashboard </h1>
        </div>
      </div>
      <!-- /.row --> 
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Booking</h3>
            </div>
            <div class="panel-body">
              <div class="hotlink">
              	<ul>
                	<li><a href="#">Create booking</a></li>
                    <li><a href="#">Create booking on boerenbed.nl</a></li>
                    <li><a href="#">Create booking on countryhousehideout.co.uk</a></li>
                    <li><a href="#">Create booking on duynpark.nl</a></li>
                    <li><a href="#">Create booking on featherdown.co.uk</a></li>
                    <li><a href="#">Create booking on featherdown.co.za</a></li>
                    <li><a href="#">Create booking on featherdown.com</a></li>
                    <li><a href="#">Create booking on unlitaupre.fr</a></li>
                    <li><a href="#">Create booking on verborgenverblijf.nl</a></li>
                    <li><a href="#">Create booking on wiesenbett.de</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Brochure</h3>
            </div>
            <div class="panel-body">
              <div class="brochure">
                <ul>
                    <li><a href="#">Create brochure request</a></li>
                    <li><a href="#">Create brochure request on boerenbed.nl</a></li>
                    <li><a href="#">Create brochure request on countryhousehideout.co.uk</a></li>
                    <li><a href="#">Create brochure request on duynpark.nl</a></li>
                    <li><a href="#">Create brochure request on featherdown.co.uk</a></li>
                    <li><a href="#">Create brochure request on featherdown.co.za</a></li>
                    <li><a href="#">Create brochure request on featherdown.com</a></li>
                    <li><a href="#">Create brochure request on unlitaupre.fr</a></li>
                    <li><a href="#">Create brochure request on verborgenverblijf.nl</a></li>
                    <li><a href="#">Create brochure request on wiesenbett.de</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.row -->
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default chartBlock">
            <div class="panel-heading">
              <i class="fa fa-bar-chart-o fa-fw"></i>Charts
              <div class="pull-right">
                  <div class="btn-group">
                      <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                          Charts
                          <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu pull-right" role="menu">
                          <li><a href="#">Nights</a></li>
                          <li><a href="#">Nights by arrival</a></li>
                          <li><a href="#">Turnover</a></li>
                          <li><a href="#">Turnover by arrival</a></li>
                          <li><a href="#">Bookings</a></li>
                          <li><a href="#">Bookings by arrival</a></li>
                      </ul>
                  </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="charts">
              	<div id="chart1" style="width:600px; height:300px"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Booking Options</h3>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped" id="bookingoption">
          <thead>
            <tr>
              <th>Code</th>
              <th>Klant</th>
              <th>Locatie</th>
              <th>Vervaldatum</th>
              <th>Aankomstdatum</th>
              <th>Vertrekdatum</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>BB15NVXP</td>
              <td>Evert fe Feij</td>
              <td>De Lange Weide HeerenBoer</td>
              <td>-</td>
              <td>17-08-2015</td>
              <td>21-08-2015</td>
            </tr>
            <tr>
              <td>BB15NVXP</td>
              <td>Evert fe Feij</td>
              <td>De Lange Weide HeerenBoer</td>
              <td>-</td>
              <td>17-08-2015</td>
              <td>21-08-2015</td>
            </tr>
            <tr>
              <td>BB15NVXP</td>
              <td>Evert fe Feij</td>
              <td>De Lange Weide HeerenBoer</td>
              <td>-</td>
              <td>17-08-2015</td>
              <td>21-08-2015</td>
            </tr>
            <tr>
              <td>BB15NVXP</td>
              <td>Evert fe Feij</td>
              <td>De Lange Weide HeerenBoer</td>
              <td>-</td>
              <td>17-08-2015</td>
              <td>21-08-2015</td>
            </tr>
            <tr>
              <td>BB15NVXP</td>
              <td>Evert fe Feij</td>
              <td>De Lange Weide HeerenBoer</td>
              <td>-</td>
              <td>17-08-2015</td>
              <td>21-08-2015</td>
            </tr>
            <tr>
              <td>BB15NVXP</td>
              <td>Evert fe Feij</td>
              <td>De Lange Weide HeerenBoer</td>
              <td>-</td>
              <td>17-08-2015</td>
              <td>21-08-2015</td>
            </tr>
            <tr>
              <td>BB15NVXP</td>
              <td>Evert fe Feij</td>
              <td>De Lange Weide HeerenBoer</td>
              <td>-</td>
              <td>17-08-2015</td>
              <td>21-08-2015</td>
            </tr>
            <tr>
              <td>BB15NVXP</td>
              <td>Evert fe Feij</td>
              <td>De Lange Weide HeerenBoer</td>
              <td>-</td>
              <td>17-08-2015</td>
              <td>21-08-2015</td>
            </tr>
            <tr>
              <td>BB15NVXP</td>
              <td>Evert fe Feij</td>
              <td>De Lange Weide HeerenBoer</td>
              <td>-</td>
              <td>17-08-2015</td>
              <td>21-08-2015</td>
            </tr>
            <tr>
              <td>BB15NVXP</td>
              <td>Evert fe Feij</td>
              <td>De Lange Weide HeerenBoer</td>
              <td>-</td>
              <td>17-08-2015</td>
              <td>21-08-2015</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
        </div>
      </div><!-- /.row -->
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Booked nights</h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th>Market</th>
                      <th>2014</th>
                      <th>2015</th>
                      <th>+/-</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>BoerenBed</td>
                      <td>39</td>
                      <td>0</td>
                      <td class="redcolor">-100.00</td>
                    </tr>
                    <tr>
                      <td>Duynpark</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>Unlitaupre</td>
                      <td>0</td>
                      <td>0</td>
                      <td class="redcolor">-100.00</td>
                    </tr>
                    <tr>
                      <td>Duynpark</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>Unlitaupre</td>
                      <td>0</td>
                      <td>0</td>
                      <td class="redcolor">-100.00</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          	<div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Booked nights until today</h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th>Market</th>
                      <th>2014</th>
                      <th>2015</th>
                      <th>+/-</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>BoerenBed</td>
                      <td>39</td>
                      <td>0</td>
                      <td class="redcolor">-100.00</td>
                    </tr>
                    <tr>
                      <td>Duynpark</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>Unlitaupre</td>
                      <td>0</td>
                      <td>0</td>
                      <td class="redcolor">-100.00</td>
                    </tr>
                    <tr>
                      <td>Duynpark</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>Unlitaupre</td>
                      <td>0</td>
                      <td>0</td>
                      <td class="redcolor">-100.00</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.row -->
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Turnover until today</h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th>Market</th>
                      <th>2014</th>
                      <th>2015</th>
                      <th>+/-</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>BoerenBed</td>
                      <td>39</td>
                      <td>0</td>
                      <td class="redcolor">-100.00</td>
                    </tr>
                    <tr>
                      <td>Duynpark</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>Unlitaupre</td>
                      <td>0</td>
                      <td>0</td>
                      <td class="redcolor">-100.00</td>
                    </tr>
                    <tr>
                      <td>Duynpark</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>Unlitaupre</td>
                      <td>0</td>
                      <td>0</td>
                      <td class="redcolor">-100.00</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          	<div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Bookings until today</h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th>Market</th>
                      <th>2014</th>
                      <th>2015</th>
                      <th>+/-</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>BoerenBed</td>
                      <td>39</td>
                      <td>0</td>
                      <td class="redcolor">-100.00</td>
                    </tr>
                    <tr>
                      <td>Duynpark</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>Unlitaupre</td>
                      <td>0</td>
                      <td>0</td>
                      <td class="redcolor">-100.00</td>
                    </tr>
                    <tr>
                      <td>Duynpark</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>Unlitaupre</td>
                      <td>0</td>
                      <td>0</td>
                      <td class="redcolor">-100.00</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.row -->  
      
    </div>
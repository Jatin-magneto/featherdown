<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->baseUrl; ?>/favicon.ico">

<title>Feather Down Farm Days</title>

<!-- Bootstrap Core CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- Custom CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css"/>


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/html5shiv.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/respond.min.js"></script>
    <![endif]-->
<!-- jQuery --> 
 
<!-- Bootstrap Core JavaScript --> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.blockUI.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/common.js"></script>

<?php
Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".alert-info").animate({opacity: 1.0}, 3000).fadeOut("slow");
	$(".alert-error").animate({opacity: 1.0}, 3000).fadeOut("slow");
	$(".alert-warning").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
);
?>
<script type="text/javascript">
	// Dont remove uniqueURL variable.
	var uniqueURL 	= '<?php echo Yii::app()->baseUrl.'/'.$this->uniqueid; ?>';
	var baseURL		= '<?php echo Yii::app()->baseUrl.'/'; ?>';
	function updateEnvironment(id){
        jQuery.ajax({
            data: {environment_id : id},
            type: 'POST',
            url: '<?php echo $this->createUrl('/site/changeEnv/') ?>',
            success: function(){
              location.reload();
            }
        });
   }
   
   function slugify(text){return text.toString().toLowerCase().replace(/\s+/g, '-').replace(/[^\w\-]+/g, '').replace(/\-\-+/g, '-').replace(/^-+/, '').replace(/-+$/, '');}
   
   $(document).ready(function(){
		
		//$('input:submit').click(function(){
		//	$('input:submit').attr("disabled", true);	
		//});
		
		$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);

		$(".side-nav li").click(function(){
		  $(".side-nav li").removeClass("active");
		  $(".side-nav li.active ul").slideDown("9000");
		  $(this).addClass("active");
		  });
		  
		  $("#submenulavel2, #submenulavel3").click(function(){
		  	$(".side-nav li li").removeClass("select");
		  	$(this).addClass("select");
		});
	});
</script>

<!-- dropdown hover -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-hover-dropdown.min.js"></script>
    <script>
    // very simple to use!
    $(document).ready(function() {
	
	
	$('.js-activated').dropdownHover().dropdown();
    });
  </script>
</head>

<?php if(!Yii::app()->user->isGuest || Yii::app()->errorHandler->error) { ?>
<body>
<?php } else { ?>
<body class="login">
<?php } ?>

<?php if(Yii::app()->controller->action->id == 'index'){?>
<div>
<?php } else {?>
<div id="wrapper"> 
<?php } ?>


<?php if(!Yii::app()->user->isGuest) { ?>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
      <span class="sr-only">Toggle navigation</span> 
      <span class="icon-bar"></span> 
      <span class="icon-bar"></span> 
      <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="<?php echo $this->createUrl('/site') ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/admin-logo.png" alt=""/></a> </div>
    <!-- Top Menu Items -->
    <?php $list = CHtml::listData(Environment::model()->findAll(),'environment_id','env_title'); ?>
    <ul class="nav navbar-right top-nav">
      <li class="dropdown"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="fa fa-globe"></i><?php echo (Yii::app()->session['env_title'] != '')? '  '. Yii::app()->session['env_title']:'  Domain'; ?><b class="caret"></b></a>
        <ul class="dropdown-menu domain-dropdown">
            <li> <?php echo CHtml::link("All Domains","",array('onclick'=>"{updateEnvironment('');}")); ?> </li>
        <?php foreach($list as $key => $val){ 
            $active = (Yii::app()->session['environment_id'] == $key)?'active':'';
            ?>
          <li class="<?php echo $active; ?>"> <?php echo CHtml::link($val,"",array('onclick'=>"{updateEnvironment($key);}")); ?> </li>
        <?php } ?>
        </ul>
      </li>
      <li class="dropdown"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="fa fa-user"></i> User<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li> <a href="javascript:void(0)"><i class="fa fa-fw fa-user"></i> Profile</a> </li>
          <li> <a href="javascript:void(0)"><i class="fa fa-fw fa-gear"></i> Change password</a> </li>
          <li class="divider"></li>
          <li> <a href="<?php echo $this->createUrl('/site/logout') ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a> </li>
        </ul>
      </li>
    </ul>
     <!-- main Menu Items -->
    <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav mainMenu">
                <li><a href="<?php echo $this->createUrl('/site') ?>">Dashboard</a></li>
                <li class="dropdown">
                  <a href="javascript:void(0)" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown">Global <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo $this->createUrl('/admin/region/admin') ?>">Region</a></li>
				    <li><a href="<?php echo $this->createUrl('/admin/country/admin') ?>">Country</a></li>
                    <li><a href="<?php echo $this->createUrl('/admin/province/admin') ?>">Province</a></li>
					<li><a href="<?php echo $this->createUrl('/admin/city/admin') ?>">City</a></li>
				    <li><a href="<?php echo $this->createUrl('/admin/saleType/admin') ?>">Sale Type</a></li>
                    <li><a href="<?php echo $this->createUrl('/admin/saleChannelType/admin') ?>">Sale Channel</a></li>
				    <li><a href="<?php echo $this->createUrl('/admin/emailSettings/admin') ?>">Email Settings</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Components <b class="caret"></b></a>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                    <li><a href="<?php echo $this->createUrl('/product/productCategory/admin') ?>">Product Category</a></li>
                    <li><a href="<?php echo $this->createUrl('/product/product/admin') ?>">Product</a></li>
                    <li><a href="<?php echo $this->createUrl('/location/locationType/admin') ?>">Location Type</a></li>
				    <li><a href="<?php echo $this->createUrl('/location/location/admin') ?>">Location</a></li>
                </ul>
                </li>
                <li class="dropdown">
                  <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">User <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo $this->createUrl('/supplier/supplier/admin') ?>">Supplier</a></li>
					<!--<li><a href="<?php echo $this->createUrl('/location/owner/admin') ?>">Location Owner</a></li>-->
                    <li><a href="javascript:void(0)">User Permission</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">System <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo $this->createUrl('/admin/environment/admin') ?>">Environments</a></li>
                    <li><a href="<?php echo $this->createUrl('/admin/language/admin') ?>">Language</a></li>
				    <li><a href="<?php echo $this->createUrl('/admin/currency/admin') ?>">Currency</a></li>
		            <li><a href="<?php echo $this->createUrl('/admin/locale/admin') ?>">Locale</a></li>
                  </ul>
                </li>
                
                <li><a href="javascript:void(0)">Reports</a></li>
                <li class="dropdown">
                  <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Accounting <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo $this->createUrl('/account/ledger/admin') ?>">Ledger</a></li>
			        <li><a href="<?php echo $this->createUrl('/account/ledgerCategory/admin') ?>">Ledger Category</a></li>
				    <li><a href="<?php echo $this->createUrl('/admin/tax/admin') ?>">Tax</a></li>
				    <li><a href="<?php echo $this->createUrl('/admin/taxGroup/admin') ?>">Tax Group</a></li>
                    <li><a href="<?php echo $this->createUrl('/admin/paymentType/admin') ?>">Payment Type</a></li>
                    <li><a href="<?php echo $this->createUrl('/admin/bookingPaymentRules/admin') ?>">Payment Rules</a></li>
                  </ul>
                </li>
                
              </ul>
            </div>
            
    <!-- /.navbar-collapse --> 
  </nav>
<?php } ?>
  
  
   <!--content-->
  <?php echo $content; ?>
  
  
  
  </div>
<!-- /#wrapper --> 
<?php if(!Yii::app()->user->isGuest) { ?>
  <footer class="footer">
      <p class="copyright"> <?php echo date('Y'); ?> &copy; featherdown.co.uk. All Copyrights Reserved. </p>
  </footer>
  

  <?php if(Yii::app()->controller->action->id == 'index') { ?>
  <!-- chart -->

  <!-- Don't touch this! --> 
      
      <script class="include" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/syntaxhighlighter/scripts/jquery.jqplot.min.js"></script> 
      <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/syntaxhighlighter/scripts/shCore.min.js"></script> 
      <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/syntaxhighlighter/scripts/shBrushJScript.min.js"></script> 
      <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/syntaxhighlighter/scripts/shBrushXml.min.js"></script> 
      
      
      <!-- End additional plugins --> 
  <script class="code" type="text/javascript">

    $(document).ready(function () {
	
        var s1 = [[2002, 112000], [2003, 122000], [2004, 104000], [2005, 99000], [2006, 121000], 
        [2007, 148000], [2008, 114000], [2009, 133000], [2010, 161000], [2011, 173000]];
        var s2 = [[2002, 10200], [2003, 10800], [2004, 11200], [2005, 11800], [2006, 12400], 
        [2007, 12800], [2008, 13200], [2009, 12600], [2010, 13100]];

        plot1 = $.jqplot("chart1", [s2, s1], {
            // Turns on animatino for all series in this plot.
            animate: true,
            // Will animate plot on calls to plot1.replot({resetAxes:true})
            animateReplot: true,
            cursor: {
                show: true,
                zoom: true,
                looseZoom: true,
                showTooltip: false
            },
            series:[
                {
                    pointLabels: {
                        show: true
                    },
                    renderer: $.jqplot.BarRenderer,
                    showHighlight: false,
                    yaxis: 'y2axis',
                    rendererOptions: {
                        // Speed up the animation a little bit.
                        // This is a number of milliseconds.  
                        // Default for bar series is 3000.  
                        animation: {
                            speed: 2500
                        },
                        barWidth: 15,
                        barPadding: -15,
                        barMargin: 0,
                        highlightMouseOver: false
                    }
                }, 
                {
                    rendererOptions: {
                        // speed up the animation a little bit.
                        // This is a number of milliseconds.
                        // Default for a line series is 2500.
                        animation: {
                            speed: 2000
                        }
                    }
                }
            ],
            axesDefaults: {
                pad: 0
            },
            axes: {
                // These options will set up the x axis like a category axis.
                xaxis: {
                    tickInterval: 1,
                    drawMajorGridlines: false,
                    drawMinorGridlines: true,
                    drawMajorTickMarks: false,
                    rendererOptions: {
                    tickInset: 0.5,
                    minorTicks: 1
                }
                },
                yaxis: {
                    tickOptions: {
                        formatString: "$%'d"
                    },
                    rendererOptions: {
                        forceTickAt0: true
                    }
                },
                y2axis: {
                    tickOptions: {
                        formatString: "$%'d"
                    },
                    rendererOptions: {
                        // align the ticks on the y2 axis with the y axis.
                        alignTicks: true,
                        forceTickAt0: true
                    }
                }
            },
            highlighter: {
                show: true, 
                showLabel: true, 
                tooltipAxes: 'y',
                sizeAdjust: 7.5 , tooltipLocation : 'ne'
            }
        });
      
    });


</script>

<?php } } ?>
</body>
</html>
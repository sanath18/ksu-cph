<?php

if(!isset($_SESSION)){
    @session_start();
}
if(isset($_SESSION['id'])){
    $user_id=$_SESSION['id'];
}else{
    header("location: ../index.php");
    die();
}
?>
<!DOCTYPE html>
<html>

  <head>
  <meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>Carnegie</title>
<meta name='viewport' content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no' />
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script data-require="jquery@*" data-semver="2.0.3" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script data-require="bootstrap@*" data-semver="3.1.1" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
    <link data-require="bootstrap-css@3.1.1" data-semver="3.1.1" rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
    
	<style>
	

/* this is only to style the sidebar - you can make the sidebar look any way you want */
.sidebar {
  padding: 20px;
  background-color: #003366;
  border-right: 1px solid #eee;
}
.navbar.navbar-static .navbar-header {
  float: left;
}

.navbar .navbar-toggle.toggle-left {
  float: left;
  margin-left: 15px;
}



.navbar .navbar-toggle.toggle-sidebar, [data-toggle="sidebar"] {
  display: block;
}

/* sidebar settings */
.sidebar {
	
  display: block;
  top: -20px;
 
  bottom:0;
  z-index: 1000;
  min-height: 100%;
  max-height: none;
  overflow: auto;
}

.sidebar-left {
  left: 0;
}
.sidebar li a {
  color: 	#FFFFFF;
  display: block;
  text-decoration: none;
 
}




/* css to override hiding the sidebar according to different screen sizes */  
.row .sidebar.sidebar-left.sidebar-xs-show {
  left: 0;
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
  -moz-transform: none;
  
}

/*right sidebar is untested */

  
@media (min-width: 768px) {
  .row .sidebar.sidebar-left.sidebar-sm-show {
    left: 0;
    -webkit-transform: translate3d(0,0,0);
    transform: translate3d(0,0,0);
    -moz-transform: none;
	
  }

 /*right sidebar is untested */

} 

@media (min-width: 992px) {
  .row .sidebar.sidebar-left.sidebar-md-show {
    left: 0;
    -webkit-transform: translate3d(0,0,0);
    transform: translate3d(0,0,0);
    -moz-transform: none;
	
  }
}
@media (min-width: 1170px) {
  .row .sidebar.sidebar-left.sidebar-lg-show {
    left: 0;
    -webkit-transform: translate3d(0,0,0);
    transform: translate3d(0,0,0);
    -moz-transform: none;	
  }

}

/* animation class - optional: without it the sidebar would just pop in and out*/
.sidebar-animate {
  -webkit-transition: -webkit-transform 300ms ease;
  -moz-transition: -moz-transform 300ms ease;
  transition: transform 300ms ease;
}

/* Left panel positioning classes */
.sidebar.sidebar-left {
  -webkit-transform: translate3d(-100%,0,0);
  -moz-transform: translate3d(-100%,0,0);
  transform: translate3d(-100%,0,0);
}

.sidebar.sidebar-left.sidebar-open {
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
  -moz-transform: none;
}
	</style>
  </head>
  <body>
 <?php
include("../Classes/conn.php");
$query = "SELECT * from health_user where UserId='".$_SESSION['id']."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
    <!-- Begin page content -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-5 col-sm-3 col-md-2 sidebar sidebar-left sidebar-animate sidebar-md-show" >
          <ul class="nav navbar-stacked">
                <li class="sidebar-brand">
                    <h4 style="color:white;"><span class="fa fa-home solo"><center>Hello admin</center></span></h4>
                </li>
                <li <?php if(strripos($_SERVER['REQUEST_URI'],"admin.php")) {echo "class='active'";} ?>>
                    <a href="../admin/admin.php">
                        <span class="fa fa-anchor solo">Approve Points</span>
                    </a>
                </li>
                <li <?php if(strripos($_SERVER['REQUEST_URI'],"adminmap.php")) {echo "class='active'";} ?>>
                    <a href="../admin/adminmap.php">
                        <span class="fa fa-anchor solo">Admin map</span>
                    </a>
                </li>
                <li <?php if(strripos($_SERVER['REQUEST_URI'],"admin.php")) {echo "class='active'";} ?>>
                    <a href="../admin/addoreditpoint.php">
                        <span class="fa fa-anchor solo">Add/edit Points</span>
                    </a>
                </li>
                <li <?php if(strripos($_SERVER['REQUEST_URI'],"excelsheet.php")) {echo "class='active'";} ?>>
                    <a href="../admin/excelsheet.php">
                        <span class="fa fa-anchor solo">Export to excel</span>
                    </a>
                </li>
                <li <?php if(strripos($_SERVER['REQUEST_URI'],"adminaddquestion.php")) {echo "class='active'";} ?>>
                    <a href="../admin/adminaddquestion.php">
                        <span class="fa fa-anchor solo">Add question</span>
                    </a>
                </li>
				<li <?php if(strripos($_SERVER['REQUEST_URI'],"admineditquestionnew.php")) {echo "class='active'";} ?>>
                    <a href="../admin/admineditquestionnew.php">
                        <span class="fa fa-anchor solo">Edit Question</span>
                    </a>
                </li>
                <li <?php if(strripos($_SERVER['REQUEST_URI'],"adminaddcategory.php")) {echo "class='active'";} ?>>
                    <a href="../admin/adminaddcategory.php">
                        <span class="fa fa-anchor solo">Add Category</span>
                    </a>
                </li>
				<li <?php if(strripos($_SERVER['REQUEST_URI'],"admineditcategory.php")) {echo "class='active'";} ?>>
                    <a href="../admin/admineditcategory.php">
                        <span class="fa fa-anchor solo">Edit Category</span>
                    </a>
                </li>	
                	<li <?php if(strripos($_SERVER['REQUEST_URI'],"addstudent.php")) {echo "class='active'";} ?>>
                    <a href="../registrations/addstudent.php">
                        <span class="fa fa-anchor solo">Add Student</span>
                    </a>
                </li>	
              <li <?php if(strripos($_SERVER['REQUEST_URI'],"addteachers.php")) {echo "class='active'";} ?>>
                    <a href="../registrations/addteachers.php">
                        <span class="fa fa-anchor solo">Add Faculty</span>
                    </a>
                </li>	
                 <li <?php if(strripos($_SERVER['REQUEST_URI'],"facultytostudent.php")) {echo "class='active'";} ?>>
                    <a href="../registrations/facultytostudent.php?page=1">
                        <span class="fa fa-anchor solo">Students to Faculty</span>
                    </a>
                </li>	
				<li <?php if(strripos($_SERVER['REQUEST_URI'],"logout.php")) {echo "class='active'";} ?>>
                    <a href="../registrations/logout.php">
                        <span class="fa fa-anchor solo">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
      </div>
    </div>
	<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
        alert(1);
    });
    </script>
	<script>
	var height = $('#map').height()
$('.sidebar').height(height)​
	</script>
	<script>
	+function ($) {
  var Sidebar = function (element, options) {
    this.$element      = $(element)
    this.options       = $.extend({}, Sidebar.DEFAULTS, options)
    this.transitioning = null
    if (this.options.parent) this.$parent = $(this.options.parent)
    if (this.options.toggle) this.toggle()
  }
  Sidebar.DEFAULTS = {
    toggle: true
  }
  Sidebar.prototype.show = function () {
    if (this.transitioning || this.$element.hasClass('sidebar-open')) return
    var startEvent = $.Event('show.bs.sidebar')
    this.$element.trigger(startEvent);
    if (startEvent.isDefaultPrevented()) return
    this.$element
      .addClass('sidebar-open')
    this.transitioning = 1
    var complete = function () {
      this.$element
      this.transitioning = 0
      this.$element.trigger('shown.bs.sidebar')
    }
    if(!$.support.transition) return complete.call(this)
    this.$element
      .one($.support.transition.end, $.proxy(complete, this))
      .emulateTransitionEnd(400)
  }
  Sidebar.prototype.hide = function () {
    if (this.transitioning || !this.$element.hasClass('sidebar-open')) return
    var startEvent = $.Event('hide.bs.sidebar')
    this.$element.trigger(startEvent)
    if(startEvent.isDefaultPrevented()) return
    this.$element
      .removeClass('sidebar-open')
    this.transitioning = 1 
    var complete = function () {
      this.transitioning = 0
      this.$element
        .trigger('hidden.bs.sidebar')
    }
    if (!$.support.transition) return complete.call(this)
    this.$element
      .one($.support.transition.end, $.proxy(complete, this))
      .emulateTransitionEnd(400)
  }
  Sidebar.prototype.toggle = function () {
    this[this.$element.hasClass('sidebar-open') ? 'hide' : 'show']()
  }
  var old = $.fn.sidebar
  $.fn.sidebar = function (option) {
    return this.each(function (){
      var $this = $(this)
      var data = $this.data('bs.sidebar')
      var options = $.extend({}, Sidebar.DEFAULTS, $this.data(), typeof options == 'object' && option)
      if (!data && options.toggle && option == 'show') option = !option
      if (!data) $this.data('bs.sidebar', (data = new Sidebar(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }
  $.fn.sidebar.Constructor = Sidebar
  $.fn.collapse.noConflict = function () {
    $.fn.sidebar = old
    return this
  }
  $(document).on('click.bs.sidebar.data-api', '[data-toggle="sidebar"]', function (e) {
    var $this = $(this), href
    var target = $this.attr('data-target')
        || e.preventDefault()
        || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '')
    var $target = $(target)
    var data = $target.data('bs.sidebar')
    var option = data ? 'toggle' : $this.data()
    $target.sidebar(option)
  })
  $('html').on('click.bs.sidebar.autohide', function(event){
    var $this = $(event.target);
    var isButtonOrSidebar = $this.is('.sidebar, [data-toggle="sidebar"]') || $this.parents('.sidebar, [data-toggle="sidebar"]').length;
    if (isButtonOrSidebar) {
      return;
    } else {
      var $target = $('.sidebar');
      $target.each(function(i, trgt) {
        var $trgt = $(trgt);
        if($trgt.data('bs.sidebar') && $trgt.hasClass('sidebar-open')) {
            $trgt.sidebar('hide');
        }
      })
    }
  });
}(jQuery);
	</script>
  </body>
</html>
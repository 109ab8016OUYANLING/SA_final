<!DOCTYPE html>
<?php
include_once "SA_SQL.php";
header('content-type:text/html;charset=utf-8');
	$getDate= date("Y-m-d");
	$sql = "SELECT * FROM history";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	$sql = "SELECT * FROM img WHERE id = 4";
	$result = $conn->query($sql);
	$rowImg = mysqli_fetch_assoc($result);
?>
<html lang="en">
  
<!-- Mirrored from demo.adminbootstrap.com/right/1.0.0/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 13:14:27 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>即時監控系統－儀表板</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-favicon.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
    <!--<link href="css/font-awesome.min.css" rel="stylesheet">-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/jquery.scrollbar.css" rel="stylesheet">
    <link href="css/ion.rangeSlider.css" rel="stylesheet">
    <link href="css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="css/bootstrap-switch.min.css" rel="stylesheet">
    <link href="css/morris.css" rel="stylesheet">
    <link href="css/bootstrap-select.min.css" rel="stylesheet">
    <link class="demo__css" href="css/right.dark.css" rel="stylesheet">
    <link href="css/demo.css" rel="stylesheet"><!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script><![endif]-->
  </head>
  <body class="framed main-scrollable">
     <div class="wrapper">
        <nav class="navbar navbar-static-top header-navbar">
            <div class="header-navbar-mobile">
                <div class="header-navbar-mobile__menu">
                    <button class="btn" type="button"><i class="fa fa-bars"></i></button>
                </div>
                <!--<div class="header-navbar-mobile__title"><span>Dashboard</span></div>-->
                <div class="header-navbar-mobile__settings dropdown"><a class="btn dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-power-off"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#">Log Out</a></li>
                    </ul>
                </div>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">
                    <div class="logo text-nowrap">
                        <div class="logo__img"><i class="fa fa-eye"></i></div><span class="logo__text">即時監控系統</span>
                    </div>
                </a>
            </div>
            <div class="topnavbar">
                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="#"><span>Dashboard</span></a></li>
                    <li><a href="history.html"><span>History</span></a></li>
                    <!--<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>Pages&nbsp;<i class="caret"></i></span></a>
              <ul class="dropdown-menu">
                <li><a href="http://demo.adminbootstrap.com/right/1.0.0/products.html"><span>Products</span></a></li>
                <li><a href="http://demo.adminbootstrap.com/right/1.0.0/orders.html"><span>Orders</span></a></li>
                <li><a href="http://demo.adminbootstrap.com/right/1.0.0/users.html"><span>Users</span></a></li>
                <li class="divider" role="separator"></li>
                <li><a href="http://demo.adminbootstrap.com/right/1.0.0/login.html">Login</a></li>
                <li><a href="http://demo.adminbootstrap.com/right/1.0.0/blank.html">Blank</a></li>
              </ul>
            </li>-->
                </ul>
                <ul class="userbar nav navbar-nav">
                    <li class="dropdown"><a class="userbar__settings dropdown-toggle" href="fuck.html" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-power-off"></i></a>
                        <!--<ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#">Log Out</a></li>
                        </ul>-->
                    </li>
                </ul>
            </div>
        </nav>
        <div class="dashboard">
            <div class="sidebar">
                <div class="quickmenu">
                    <div class="quickmenu__cont">
                        <div class="quickmenu__list">
                            <div class="quickmenu__item active">
                                <div class="fa fa-fw fa-home"></div>
                            </div>
                            <!--<div class="quickmenu__item">
                  <div class="fa fa-fw fa-envelope-o"></div>
                </div>
                <div class="quickmenu__item new">
                  <div class="fa fa-fw fa-comments-o"></div>
                </div>
                <div class="quickmenu__item">
                  <div class="fa fa-fw fa-feed"></div>
                </div>
                <div class="quickmenu__item">
                  <div class="fa fa-fw fa-cog"></div>
                </div>-->
                        </div>
                    </div>
                </div>
                <div class="scrollable scrollbar-macosx">
                    <div class="sidebar__cont">
                        <div class="sidebar__menu">
                            <!--<div class="sidebar__title">Pages</div>-->
                            <ul class="nav nav-menu">
                                <li class="active">
                                    <a href="#">
                                        <div class="nav-menu__ico"><i class="fa fa-tachometer"></i></div>
                                        <div class="nav-menu__text"><span>Dashboard</span></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="history.html">
                                        <div class="nav-menu__ico"><i class="fa fa-history"></i></div>
                                        <div class="nav-menu__text"><span>History</span></div>
                                    </a>
                                </li>
                                <!--<li><a href="#">
                      <div class="nav-menu__ico"><i class="fa fa-fw fa-envelope"></i></div>
                      <div class="nav-menu__text"><span>Mailbox</span></div>
                      <div class="nav-menu__right"><i class="fa fa-fw fa-angle-right arrow"></i></div></a>
                    <ul class="nav nav-menu__second collapse">
                      <li><a href="http://demo.adminbootstrap.com/right/1.0.0/inbox.html">Inbox</a></li>
                      <li><a href="http://demo.adminbootstrap.com/right/1.0.0/sent.html">Sent</a></li>
                      <li><a href="http://demo.adminbootstrap.com/right/1.0.0/compose.html">Compose</a></li>
                    </ul>
                  </li>
                  <li><a href="http://demo.adminbootstrap.com/right/1.0.0/orders.html">
                      <div class="nav-menu__ico"><i class="fa fa-fw fa-truck"></i></div>
                      <div class="nav-menu__text"><span>Orders</span></div>
                      <div class="nav-menu__right"><i class="badge badge-default">2</i></div></a></li>
                  <li><a href="http://demo.adminbootstrap.com/right/1.0.0/users.html">
                      <div class="nav-menu__ico"><i class="fa fa-fw fa-user"></i></div>
                      <div class="nav-menu__text"><span>Users</span></div></a></li>
                  <li><a href="#">
                      <div class="nav-menu__ico"><i class="fa fa-fw fa-folder-o"></i></div>
                      <div class="nav-menu__text"><span>Other</span></div>
                      <div class="nav-menu__right"><i class="fa fa-fw fa-angle-right arrow"></i></div></a>
                    <ul class="nav nav-menu__second collapse">
                      <li><a href="http://demo.adminbootstrap.com/right/1.0.0/blank.html">Blank</a></li>
                      <li><a href="http://demo.adminbootstrap.com/right/1.0.0/login.html">Login</a></li>
                    </ul>
                  </li>-->
                            </ul>
                            <!--<div class="sidebar__title">Template</div>
                <ul class="nav nav-menu">
                  <li><a href="#">
                      <div class="nav-menu__ico"><i class="fa fa-fw fa-th-large"></i></div>
                      <div class="nav-menu__text"><span>UI Elements</span></div>
                      <div class="nav-menu__right"><i class="fa fa-fw fa-angle-right arrow"></i></div></a>
                    <ul class="nav nav-menu__second collapse">
                      <li><a href="http://demo.adminbootstrap.com/right/1.0.0/general.html">General</a></li>
                      <li><a href="http://demo.adminbootstrap.com/right/1.0.0/panels.html">Panels</a></li>
                      <li><a href="http://demo.adminbootstrap.com/right/1.0.0/tabs.html">Tabs</a></li>
                      <li><a href="http://demo.adminbootstrap.com/right/1.0.0/modals.html">Modals</a></li>
                      <li><a href="http://demo.adminbootstrap.com/right/1.0.0/buttons.html">Buttons</a></li>
                    </ul>
                  </li>
                  <li><a href="#">
                      <div class="nav-menu__ico"><i class="fa fa-fw fa-clone"></i></div>
                      <div class="nav-menu__text"><span>Forms</span></div>
                      <div class="nav-menu__right"><i class="fa fa-fw fa-angle-right arrow"></i></div></a>
                    <ul class="nav nav-menu__second collapse">
                      <li><a href="http://demo.adminbootstrap.com/right/1.0.0/controls.html">Controls</a></li>
                      <li><a href="http://demo.adminbootstrap.com/right/1.0.0/validation.html">Validation</a></li>
                      <li><a href="http://demo.adminbootstrap.com/right/1.0.0/texteditor.html">Text Editor</a></li>
                    </ul>
                  </li>
                  <li><a href="#">
                      <div class="nav-menu__ico"><i class="fa fa-fw fa-table"></i></div>
                      <div class="nav-menu__text"><span>Tables</span></div>
                      <div class="nav-menu__right"><i class="fa fa-fw fa-angle-right arrow"></i></div></a>
                    <ul class="nav nav-menu__second collapse">
                      <li><a href="http://demo.adminbootstrap.com/right/1.0.0/table_static.html">Static</a></li>
                      <li><a href="http://demo.adminbootstrap.com/right/1.0.0/table_sortable.html">Sortable</a></li>
                      <li><a href="http://demo.adminbootstrap.com/right/1.0.0/table_data.html">DataTable</a></li>
                    </ul>
                  </li>
                  <li><a href="http://demo.adminbootstrap.com/right/1.0.0/charts.html">
                      <div class="nav-menu__ico"><i class="fa fa-fw fa-pie-chart"></i></div>
                      <div class="nav-menu__text"><span>Charts</span></div></a></li>
                </ul>
              </div>
              <div class="sidebar__menu">
                <div class="sidebar__btn"><a class="btn btn-block btn-default" href="http://demo.adminbootstrap.com/right/1.0.0/compose.html">Compose Mail</a></div>
                <div class="sidebar__title">Mail</div>
                <ul class="nav nav-menu">
                  <li><a href="http://demo.adminbootstrap.com/right/1.0.0/inbox.html">
                      <div class="nav-menu__ico"><i class="fa fa-fw fa-inbox"></i></div>
                      <div class="nav-menu__text"><span>Inbox</span></div>
                      <div class="nav-menu__right"><i class="badge badge-default"><b>2</b> / 100</i></div></a></li>
                  <li><a href="http://demo.adminbootstrap.com/right/1.0.0/sent.html">
                      <div class="nav-menu__ico"><i class="fa fa-fw fa-upload"></i></div>
                      <div class="nav-menu__text"><span>Sent</span></div>
                      <div class="nav-menu__right"><i class="badge badge-default">30</i></div></a></li>
                </ul>
                <div class="sidebar__title">Tags</div>
                <div class="ul nav nav-menu">
                  <li><a href="http://demo.adminbootstrap.com/right/1.0.0/inbox.html">
                      <div class="nav-menu__ico tag_clients"><i class="fa fa-fw fa-tag"></i></div>
                      <div class="nav-menu__text"><span>Clients</span></div></a></li>
                  <li><a href="http://demo.adminbootstrap.com/right/1.0.0/inbox.html">
                      <div class="nav-menu__ico tag_social"><i class="fa fa-fw fa-tag"></i></div>
                      <div class="nav-menu__text"><span>Social</span></div></a></li>
                  <li><a href="http://demo.adminbootstrap.com/right/1.0.0/inbox.html">
                      <div class="nav-menu__ico tag_support"><i class="fa fa-fw fa-tag"></i></div>
                      <div class="nav-menu__text"><span>Support</span></div></a></li>
                </div>
              </div>
              <div class="sidebar__menu">
                <div class="sidebar__title">New Messages</div>
                <div class="lm-widget">
                  <div class="lm-widget__list">
                    <div class="lm-widget__item new">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag tag_support"></i><span>Support</span></div>
                      <div class="lm-widget__text">Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis.</div><a class="lm-widget__link" href="http://demo.adminbootstrap.com/right/1.0.0/inbox.html"></a>
                    </div>
                    <div class="lm-widget__item new">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag tag_clients"></i><span>Stephen Olson</span></div>
                      <div class="lm-widget__text">Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue.</div><a class="lm-widget__link" href="http://demo.adminbootstrap.com/right/1.0.0/inbox.html"></a>
                    </div>
                  </div>
                </div>
                <div class="sidebar__title">Recent list</div>
                <div class="lm-widget">
                  <div class="lm-widget__list">
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag tag_social"></i><span>Jesse Shaw</span></div>
                      <div class="lm-widget__text">Nam ultrices, libero non mattis pulvinar.</div><a class="lm-widget__link" href="http://demo.adminbootstrap.com/right/1.0.0/inbox.html"></a>
                    </div>
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag"></i><span>Mary Payne</span></div>
                      <div class="lm-widget__text">Vivamus tortor. Duis mattis egestas metus.</div><a class="lm-widget__link" href="http://demo.adminbootstrap.com/right/1.0.0/inbox.html"></a>
                    </div>
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag"></i><span>Bob Romero</span></div>
                      <div class="lm-widget__text">Morbi porttitor lorem id ligula.</div><a class="lm-widget__link" href="http://demo.adminbootstrap.com/right/1.0.0/inbox.html"></a>
                    </div>
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag tag_social"></i><span>Kevin Hosser</span></div>
                      <div class="lm-widget__text">Libero non mattis pulvinar.</div><a class="lm-widget__link" href="http://demo.adminbootstrap.com/right/1.0.0/inbox.html"></a>
                    </div>
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag tag_clients"></i><span>Perry Winter</span></div>
                      <div class="lm-widget__text">Tortor. Duis mattis egestas metus.</div><a class="lm-widget__link" href="http://demo.adminbootstrap.com/right/1.0.0/inbox.html"></a>
                    </div>
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag tag_support"></i><span>Ivan Nemirov</span></div>
                      <div class="lm-widget__text">Portitor lorem id ligula.</div><a class="lm-widget__link" href="http://demo.adminbootstrap.com/right/1.0.0/inbox.html"></a>
                    </div>
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag"></i><span>Jonny Fount</span></div>
                      <div class="lm-widget__text">Lorem id ligula morbi porttitor .</div><a class="lm-widget__link" href="http://demo.adminbootstrap.com/right/1.0.0/inbox.html"></a>
                    </div>
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag"></i><span>Hue Logan</span></div>
                      <div class="lm-widget__text">Pulvinar libero non mattis.</div><a class="lm-widget__link" href="http://demo.adminbootstrap.com/right/1.0.0/inbox.html"></a>
                    </div>
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag tag_clients"></i><span>Summer Gordon</span></div>
                      <div class="lm-widget__text">Hattis tortor. Duis egestas metus.</div><a class="lm-widget__link" href="http://demo.adminbootstrap.com/right/1.0.0/inbox.html"></a>
                    </div>
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag tag_support"></i><span>Sonya Blade</span></div>
                      <div class="lm-widget__text">Itor lorem id ligula.</div><a class="lm-widget__link" href="http://demo.adminbootstrap.com/right/1.0.0/inbox.html"></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="sidebar__menu">
                <div class="sidebar__title">Recent activity</div>
                <div class="ra-widget">
                  <div class="ra-widget__cont">
                    <div class="ra-widget__list">
                      <div class="ra-widget__item ra-widget__item_user">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text"><a href='index.html'>Gary Long</a> has registered.<span class="ra-widget__date">09:20</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_product">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text">New product <a href='index.html'>Sony PlayStation 4</a>.<span class="ra-widget__date">10:08</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_order">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text">Order <a href='index.html'>#35108243</a>.<span class="ra-widget__date">Jan 28, 09:42</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_subscriber">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text"><a href='index.html'>Julie Payne</a> subscribed to news.<span class="ra-widget__date">Jan 28, 18:06</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_mail">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text">30 letters was sent.<span class="ra-widget__date">Jan 27, 03:08</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_order">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text">Order <a href='index.html'>#35597433</a>.<span class="ra-widget__date">Jan 26, 19:02</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_payment">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text">$385 incoming payment.<span class="ra-widget__date">Jan 26, 18:06</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_payment">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text">$2824 incoming payment.<span class="ra-widget__date">Jan 26, 09:11</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_subscriber">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text"><a href='index.html'>Greg Bush</a> subscribed to news.<span class="ra-widget__date">Jan 26, 05:36</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_product">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text">New product <a href='index.html'>Shoober</a>.<span class="ra-widget__date">Jan 25, 23:19</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_order">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text">Order <a href='index.html'>#31248769</a>.<span class="ra-widget__date">Jan 25, 16:51</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_payment">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text">$3205 incoming payment.<span class="ra-widget__date">Jan 25, 10:44</span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="sidebar__menu">
                <div class="sidebar__title">Settings</div>
                <div class="ss-widget">
                  <div class="ss-widget__cont">
                    <div class="ss-widget__row">
                      <div class="ss-widget__cell">Site</div>
                      <div class="ss-widget__cell">
                        <input class="bs-switch" type="checkbox" checked="checked" data-size="micro" data-on-color="success" data-off-color="danger">
                      </div>
                    </div>
                    <div class="ss-widget__row">
                      <div class="ss-widget__cell">Mailing</div>
                      <div class="ss-widget__cell">
                        <input class="bs-switch" type="checkbox" data-size="micro" data-on-color="success" data-off-color="danger">
                      </div>
                    </div>
                    <div class="ss-widget__item">
                      <div class="ss-widget__label">Limit</div>
                      <div class="ss-widget__value">
                        <input class="settings-slider" type="text" name="" value="" data-grid="false" data-min="0" data-max="2000" data-from="600" data-step="200">
                      </div>
                    </div>
                    <div class="ss-widget__row">
                      <div class="ss-widget__cell">Timeout</div>
                      <div class="ss-widget__cell">
                        <input class="form-control input-sm" type="number" min="5" max="50" step="5" value="15">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="sidestat">
                  <div class="sidestat__cont">
                    <div class="sidestat__item">
                      <div class="sidestat__value">1,760</div>
                      <div class="sidestat__text">visits of your site</div>
                      <div class="sidestat__chart sparkline bar">1699,1686,8368,9011,6129,3837,0997,2034,0483,1457,2950,8946,0866,6247,8222,5727,0020,6883,3410,5224,2034,0483,1457,2950,5946,0866</div>
                    </div>
                    <div class="sidestat__item">
                      <div class="sidestat__value">2,034</div>
                      <div class="sidestat__text">views of your products</div>
                      <div class="sidestat__chart sparkline area">5696,6514,9647,6326,6028,8869,8251,9146,6137,8997,6892,9544,7011,6556,7737,8348,7011,6558,7556</div>
                    </div>
                    <div class="sidestat__item">
                      <div class="sidestat__value">$2,950</div>
                      <div class="sidestat__text">average day earning</div>
                      <div class="sidestat__chart sparkline bar_thin">6658,8005,9033,8360,3385,9018,9089,7804,5574,7556,6910,4327,7500,6563,0649,2584,8757,6815,8368,9011,6129,3837,0997,2034,0483,1457,2950,8946,0866,6247,3385,9018,9089,7804,5574,7556,6910,4327,7500,7804,5574,7556,6910,4327,7500,6563,0649,2584</div>
                    </div>
                    <div class="sidestat__item">
                      <div class="sidestat__value">290</div>
                      <div class="sidestat__text">month orders</div>
                      <div class="sidestat__chart sparkline line">075,487,581,520,075,630,350,631,794,666,466,322,833,471,721,703,042,328,844,996,099,342,841,599</div>
                    </div>
                  </div>
                </div>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="main">
                <div class="main__scroll scrollbar-macosx">
                    <div class="main__cont">
                        <div class="main-heading">
                            <div class="main-title">
                                <ol class="breadcrumb">
                                    <li class="active">History</li>
                                </ol>
                            </div>
                            <!--<div class="main-filter">
                  <form class="main-filter__search">
                    <div class="input-group">
                      <input class="form-control" type="text" placeholder="Search..."><span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                          <div class="fa fa-search"></div>
                        </button></span>
                    </div>
                  </form>
                </div>-->
                        </div>
                        <div class="container-fluid half-padding">
                            <div class="pages pages_dashboard">
                                <div class="row">
                                    <div class="col-md-9">
                                        <!--圖表 左上-->
                                        <div class="panel panel-danger">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="fa fa-line-chart" aria-hidden="true"></i> statistic</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="ld-widget">
                                                    <div class="ld-widget__cont">
                                                        <div class="ld-widget-main">
                                                            <div class="ld-widget-main__title">Levels</div>
                                                            <div class="ld-widget-main__chart"></div>
                                                        </div>
                                                        <div class="ld-widget-side">
                                                            
                                                            <!--<div class="ld-widget-side__title">Ratio</div>
                                <div class="ld-widget-side__chart"></div>
                                <div class="ld-widget-side__footer">
                                  <div class="ld-widget-side__item">
                                    <div class="ld-widget-side__label">Free</div>
                                    <div class="ld-widget-side__value">45</div>
                                  </div>
                                  <div class="ld-widget-side__item">
                                    <div class="ld-widget-side__label">Light</div>
                                    <div class="ld-widget-side__value">30</div>
                                  </div>
                                  <div class="ld-widget-side__item">
                                    <div class="ld-widget-side__label">Pro</div>
                                    <div class="ld-widget-side__value">20</div>
                                  </div>
                                </div>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-13">
                                        <!--右上-->
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="fa fa-industry" aria-hidden="true"></i> 機台狀態</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="ov-widget">
                                                    <div class="ov-widget__list">
                                                        <div class="ov-widget__item ov-widget__item_inc">
                                                            <div class="ov-widget__value">溫度</div>
                                                            <div class="ov-widget__info">
                                                                <!--<div class="ov-widget__title">1,950</div>-->
                                                                <div class="ov-widget__change"><span><!--15-->趙品淵臭ㄌㄐㄌㄐㄌㄐㄌㄐㄌㄐ</span>
                                                                    <!--<span class="fa fa-level-up"></span><span class="fa fa-level-down"></span><span class="fa fa-bolt"></span><span class="fa fa-thumb-tack"></span>*--></div>
                                                            </div>
                                                        </div>
                                                        <div class="ov-widget__item ov-widget__item_dec">
                                                            <div class="ov-widget__value">運轉時間</div>
                                                            <div class="ov-widget__info">
                                                                <div class="ov-widget__title">
                                                                    <!--$3,230-->
                                                                </div>
                                                                <div class="ov-widget__change"><span>吳劭祺假假</span>
                                                                    <!--<span class="fa fa-level-up"></span><span class="fa fa-level-down"></span><span class="fa fa-bolt"></span><span class="fa fa-thumb-tack"></span>--></div>
                                                            </div>
                                                        </div>
														
														<div class="ov-widget__item ov-widget__item_dec">
                                                            <div class="ov-widget__value">燈號</div>
                                                            <div class="ov-widget__info">
                                                                <div class="ov-widget__title">
                                                                    <!--$3,230-->
                                                                </div>
                                                                <div class="ov-widget__change"><span></span>
                                                                    <!--<span class="fa fa-level-up"></span><span class="fa fa-level-down"></span><span class="fa fa-bolt"></span><span class="fa fa-thumb-tack"></span>--></div>
                                                            </div>
                                                        </div>
                                                        <!--<div class="ov-widget__item ov-widget__item_warn">
                                <div class="ov-widget__value">Visits</div>
                                <div class="ov-widget__info">
                                  <div class="ov-widget__title"><12,450</div>
                                  <div class="ov-widget__change"><span>921</span><span class="fa fa-level-up"></span><span class="fa fa-level-down"></span><span class="fa fa-bolt"></span><span class="fa fa-thumb-tack"></span></div>
                                </div>
                              </div>-->
                                                        <!--<div class="ov-widget__item ov-widget__item_tack">
                                <div class="ov-widget__value">Orders</div>
                                <div class="ov-widget__info">
                                  <div class="ov-widget__title">1,087</div>
                                  <div class="ov-widget__change"><span></span><span class="fa fa-level-up"></span><span class="fa fa-level-down"></span><span class="fa fa-bolt"></span><span class="fa fa-thumb-tack"></span></div>
                                </div>
                              </div>-->
                                                        <!--<div class="ov-widget__bar"><span>Conquer the world</span>
                                <div class="progress">
                                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div>
                                </div>
                              </div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <!--左下-->
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="fa fa-cogs" aria-hidden="true"></i> 投入工作</h3>
                                            </div>
                                            <div class="feed-widget">
                                                <div class="feed-widget__wrap scrollable scrollbar-macosx">
                                                    <div class="feed-widget__cont">
                                                        <div class="feed-widget__list">
                                                            <div class="feed-widget__item feed-widget__item_user">
                                                                <div class="feed-widget__ico"><i class="fa fa-id-card-o" aria-hidden="true"></i>
                                                                    <!--<i class="fa fa-fw"></i>--></div>
                                                                <div class="feed-widget__info">
                                                                    <div class="feed-widget__text"><b>投入工作ＩＤ：</b>
                                                                        <!-- has registered.-->
                                                                    </div>
                                                                    <div class="feed-widget__date">IJ01</div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-widget__item feed-widget__item_product">
                                                                <div class="feed-widget__ico"><i class="fa fa-google-wallet"></i></div>
                                                                <div class="feed-widget__info">
                                                                    <div class="feed-widget__text"><b>投入線段：<!--Sony PlayStation 4--></b></div>
                                                                    <div class="feed-widget__date">L101</div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-widget__item feed-widget__item_order">
                                                                <div class="feed-widget__ico"><i class="fa fa-fighter-jet"></i></div>
                                                                <div class="feed-widget__info">
                                                                    <div class="feed-widget__text"><b>線速：</b></div>
                                                                    <div class="feed-widget__date">1200 m/hr</div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-widget__item feed-widget__item_subscriber">
                                                                <div class="feed-widget__ico"><i class="fa fa-clock-o"></i></div>
                                                                <div class="feed-widget__info">
                                                                    <div class="feed-widget__text"><b>開始時間：</b></div>
                                                                    <div class="feed-widget__date">00:00:00</div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-widget__item feed-widget__item_subscriber">
                                                                <div class="feed-widget__ico"><i class="fa fa-clock-o"></i></div>
                                                                <div class="feed-widget__info">
                                                                    <div class="feed-widget__text"><b>結束時間：</b></div>
                                                                    <div class="feed-widget__date">23:59:59</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--中-->
                                        <div class="panel panel-danger">
                                            <div class="panel-heading panel-heading_label">
                                                <h3 class="panel-title"><i class="fa fa-cogs" aria-hidden="true"></i> 產出工作</h3>
                                                <!--<div class="label label-danger">2</div>-->
                                            </div>
                                            <div class="feed-widget">
                                                <div class="feed-widget__wrap scrollable scrollbar-macosx">
                                                    <div class="feed-widget__cont">
                                                        <div class="feed-widget__list">
                                                            <div class="feed-widget__item feed-widget__item_user">
                                                                <div class="feed-widget__ico"><i class="fa fa-id-card-o" aria-hidden="true"></i>
                                                                    <!--<i class="fa fa-fw"></i>--></div>
                                                                <div class="feed-widget__info">
                                                                    <div class="feed-widget__text"><b>產出工作ＩＤ：</b>
                                                                        <!-- has registered.-->
                                                                    </div>
                                                                    <div class="feed-widget__date">OJ01</div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-widget__item feed-widget__item_product">
                                                                <div class="feed-widget__ico"><i class="fa fa-google-wallet"></i></div>
                                                                <div class="feed-widget__info">
                                                                    <div class="feed-widget__text"><b>產出線段：<!--Sony PlayStation 4--></b></div>
                                                                    <div class="feed-widget__date">L201</div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-widget__item feed-widget__item_order">
                                                                <div class="feed-widget__ico"><i class="fa fa-fighter-jet"></i></div>
                                                                <div class="feed-widget__info">
                                                                    <div class="feed-widget__text"><b>線速：</b></div>
                                                                    <div class="feed-widget__date">1200 m/hr</div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-widget__item feed-widget__item_subscriber">
                                                                <div class="feed-widget__ico"><i class="fa fa-clock-o"></i></div>
                                                                <div class="feed-widget__info">
                                                                    <div class="feed-widget__text"><b>開始時間：</b></div>
                                                                    <div class="feed-widget__date">00:00:00</div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-widget__item feed-widget__item_subscriber">
                                                                <div class="feed-widget__ico"><i class="fa fa-clock-o"></i></div>
                                                                <div class="feed-widget__info">
                                                                    <div class="feed-widget__text"><b>結束時間：</b></div>
                                                                    <div class="feed-widget__date">23:59:59</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<div class="sp-widget">
                          <div class="sp-widget__wrap scrollable scrollbar-macosx">
                            <div class="sp-widget__cont">
                              <div class="sp-widget__top">
                                <div class="sp-widget__info">
                                  <div class="sp-widget__title"><i class="fa fa-envelope-o"></i><span>2 New Messages</span></div>
                                </div>
                                <div class="sp-widget__all"><a class="btn btn-default btn-block" href="http://demo.adminbootstrap.com/right/1.0.0/inbox.html">Show All</a></div>
                              </div>
                              <div class="sp-widget__list">
                                <div class="sp-widget__item">
                                  <div class="sp-widget__user"><a href="index.html">Carol Burton</a><span class="sp-widget__date">, 18:06 pm</span></div>
                                  <div class="sp-widget__text">Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius.</div>
                                </div>
                                <div class="sp-widget__item">
                                  <div class="sp-widget__user"><a href="index.html">Judy Shaw</a><span class="sp-widget__date">, 11:38 pm</span></div>
                                  <div class="sp-widget__text">Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.</div>
                                </div>
                                <div class="sp-widget__item">
                                  <div class="sp-widget__user"><a href="index.html">Angela Kennedy</a><span class="sp-widget__date">, 13:03 pm - 01.09.2016</span></div>
                                  <div class="sp-widget__text">Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat.</div>
                                </div>
                                <div class="sp-widget__item">
                                  <div class="sp-widget__user"><a href="index.html">Larry Cole</a><span class="sp-widget__date">, 15:10 pm - 01.08.2016</span></div>
                                  <div class="sp-widget__text">Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius.</div>
                                </div>
                                <div class="sp-widget__item">
                                  <div class="sp-widget__user"><a href="index.html">Wanda Watson</a><span class="sp-widget__date">, 09:18 pm - 01.08.2016</span></div>
                                  <div class="sp-widget__text">Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.</div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>-->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <!--右下-->
                                        <div class="panel panel-warning">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="fa fa-list-alt" aria-hidden="true"></i> 製令</h3>
                                            </div>
                                            <div class="feed-widget">
                                                <div class="feed-widget__wrap scrollable scrollbar-macosx">
                                                    <div class="feed-widget__cont">
                                                        <div class="feed-widget__list">
                                                            <div class="st-widget__item st-widget__item_select">
                                                                <div class="st-widget__label">製令編號：</div>
                                                                <div class="st-widget__select">
                                                                    <select class="selectpicker form-control" placeholder="Variable">
                                                                        <option>None</option>
                                                                        <option>MO101</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="feed-widget__item feed-widget__item_product">
                                                                <div class="feed-widget__ico"><i class="fa fa-info-circle"></i></div>
                                                                <div class="feed-widget__info">
                                                                    <div class="feed-widget__text"><b>投入料號：<!--Sony PlayStation 4--></b></div>
                                                                    <div class="feed-widget__date">銅條(A)</div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-widget__item feed-widget__item_order">
                                                                <div class="feed-widget__ico"><i class="fa fa-long-arrow-down"></i></div>
                                                                <div class="feed-widget__info">
                                                                    <div class="feed-widget__text"><b>投入段長度：</b></div>
                                                                    <div class="feed-widget__date">1000 m</div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-widget__item feed-widget__item_subscriber">
                                                                <div class="feed-widget__ico"><i class="fa fa-sort-numeric-desc"></i></div>
                                                                <div class="feed-widget__info">
                                                                    <div class="feed-widget__text"><b>投入數量：</b></div>
                                                                    <div class="feed-widget__date">1</div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-widget__item feed-widget__item_subscriber">
                                                                <div class="feed-widget__ico"><i class="fa fa-info-circle"></i></div>
                                                                <div class="feed-widget__info">
                                                                    <div class="feed-widget__text"><b>產出料號：</b></div>
                                                                    <div class="feed-widget__date">銅絲(B)</div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-widget__item feed-widget__item_subscriber">
                                                                <div class="feed-widget__ico"><i class="fa fa-long-arrow-up"></i></div>
                                                                <div class="feed-widget__info">
                                                                    <div class="feed-widget__text"><b>產出段長度：</b></div>
                                                                    <div class="feed-widget__date">2000 m</div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-widget__item feed-widget__item_subscriber">
                                                                <div class="feed-widget__ico"><i class="fa fa-sort-numeric-asc"></i></div>
                                                                <div class="feed-widget__info">
                                                                    <div class="feed-widget__text"><b>產出數量：</b></div>
                                                                    <div class="feed-widget__date">3</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="st-widget">
                                                <div class="st-widget__wrap">
                                                    <div class="st-widget__cont">
                                                        <div class="st-widget__item st-widget__item_select">
                                                            <div class="st-widget__label">製令編號</div>
                                                            <div class="st-widget__select">
                                                                <select class="selectpicker form-control" placeholder="Variable">
                                                                    <option>None</option>
                                                                    <option>MO101</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="st-widget__item st-widget__item_switch">
                                                            <div class="st-widget__label">Site accessibility</div>
                                                            <div class="st-widget__switch">
                                                                <input class="bs-switch" type="checkbox" checked="checked" data-size="mini" data-on-color="success" data-off-color="danger">
                                                            </div>
                                                        </div>
                                                        <div class="st-widget__item st-widget__item_switch">
                                                            <div class="st-widget__label">Invite mailing</div>
                                                            <div class="st-widget__switch">
                                                                <input class="bs-switch" type="checkbox" data-size="mini" data-on-color="success" data-off-color="danger">
                                                            </div>
                                                        </div>
                                                        <div class="st-widget__item st-widget__item_slider">
                                                            <div class="st-widget__label">Delivery limit</div>
                                                            <div class="st-widget__slider">
                                                                <input class="settings-slider" type="text" name="" value="" data-grid="true" data-min="0" data-max="2000" data-from="600" data-step="200">
                                                            </div>
                                                        </div>
                                                        <div class="st-widget__item st-widget__item_number">
                                                            <div class="st-widget__label">Timeout value</div>
                                                            <div class="st-widget__number">
                                                                <input class="form-control" type="number" min="5" max="50" step="5" value="15">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="demo">
      <div class="demo__ico"></div>
      <div class="demo__cont">
        <div class="demo__settings">
          <div class="demo__group">
            <div class="demo__label">Color theme:</div>
            <div class="demo__themes">
              <div class="demo__theme demo__theme_active demo__theme_dark" data-css="css/right.dark.css" title="Dark"></div>
              <div class="demo__theme demo__theme_lilac" data-css="css/right.lilac.css" title="Lilac"></div>
              <div class="demo__theme demo__theme_light" data-css="css/right.light.css" title="Light"></div>
            </div>
          </div>
        </div>
      </div>
    </div>-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollbar.min.js"></script>
    <script src="js/bootstrap-tabdrop.min.js"></script>
    <script src="js/jquery.sparkline.min.js"></script>
    <script src="js/ion.rangeSlider.min.js"></script>
    <script src="js/inputNumber.js"></script>
    <script src="js/bootstrap-switch.min.js"></script>
    <script src="js/raphael.min.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/index.js"></script>
    <script src="js/main.js"></script>
    <script src="js/demo.js"></script><!-- Analytics and visitor tracking scripts can be placed here -->
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter34743530 = new Ya.Metrika({
                    id:34743530,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "../../../mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/34743530" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<script type="text/javascript">
    $('body').on('click', '.datalist-filter__search button', function() {
        yaCounter34743530.reachGoal('Filter');
    });
    $('body').on('click', '.quickmenu__item', function() {
        yaCounter34743530.reachGoal('Quick');
    });
    $('body').on('click', '.demo__theme', function() {
        yaCounter34743530.reachGoal('Theme');
    });
</script>
  </body>

<!-- Mirrored from demo.adminbootstrap.com/right/1.0.0/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 13:14:29 GMT -->
</html>
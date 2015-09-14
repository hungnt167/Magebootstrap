<!DOCTYPE html>
<html lang="en">
<head>
    <title>Title</title>
    <meta charset="UTF-8">
    <meta name=description content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <style>
        .product-panel{
            height:460px;
            overflow-y:scroll;
        }
        .container{
            padding-top: 52px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header col-lg-4 col-lg-offset-2">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Home</a>
    </div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

    <form class="navbar-form search-product" role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
</div>
</nav>
<div class="container">

    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                    <nav class="navbar navbar-default" role="navigation">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-ex1-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Customer</a>

                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-ex1-collapse">

                            <form class="navbar-form navbar-left search-customer" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                            </form>

                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                </div>
                <div class="modal-body body-customer">

                    <button type="button" class="btn-block btn btn-default" data-dismiss="modal">Customer 1</button>
                    <button type="button" class="btn-block btn btn-default" data-dismiss="modal">Customer 1</button>
                    <button type="button" class="btn-block btn btn-default" data-dismiss="modal">Customer 1</button>
                    <button type="button" class="btn-block btn btn-default" data-dismiss="modal">Customer 1</button>
                    <button type="button" class="btn-block btn btn-default" data-dismiss="modal">Customer 1</button>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-capitalize">

                <div class="panel panel-primary">
                	  <div class="panel-heading">
                			<h3 class="panel-title">Customer</h3>
                	  </div>
                	  <div class="panel-body">
                          <div class="table-responsive">
                          	<table class="table table-hover">
                          		<thead>
                                <tr>
                                    <th>Products</th>
                                    <th>Qty</th>
                                    <th>Tax</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                          		</thead>
                          		<tbody>
                          			<tr>
                          				<td></td>
                          			</tr>
                          		</tbody>
                          	</table>
                          </div>

                	  </div>
                </div>
            </div>

            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 ">

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <table class="panel-title">
                            <tbody>
                            <tr class="col-lg-12">
                                <td class="col-lg-4">Product</td>
                                <td class="col-lg-8">
                                    <form class="search-product">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="panel-body product-panel">
                        <div class="row">
                            <div class="col-sm-6 col-md-3 hero-feature">
                                <div class="thumbnail">
                                    <img alt="" src="http://placehold.it/700x400"/>

                                    <div class="caption">
                                        <h5>
                                            Feature Label
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 hero-feature">
                                <div class="thumbnail">
                                    <img alt="" src="http://placehold.it/700x400"/>

                                    <div class="caption">
                                        <h5>
                                            Feature Label
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 hero-feature">
                                <div class="thumbnail">
                                    <img alt="" src="http://placehold.it/700x400"/>

                                    <div class="caption">
                                        <h5>
                                            Feature Label
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 hero-feature">
                                <div class="thumbnail">
                                    <img alt="" src="http://placehold.it/700x400"/>

                                    <div class="caption">
                                        <h5>
                                            Feature Label
                                        </h5>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-3 hero-feature">
                                <div class="thumbnail">
                                    <img alt="" src="http://placehold.it/700x400"/>

                                    <div class="caption">
                                        <h5>
                                            Feature Label
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 hero-feature">
                                <div class="thumbnail">
                                    <img alt="" src="http://placehold.it/700x400"/>

                                    <div class="caption">
                                        <h5>
                                            Feature Label
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 hero-feature">
                                <div class="thumbnail">
                                    <img alt="" src="http://placehold.it/700x400"/>

                                    <div class="caption">
                                        <h5>
                                            Feature Label
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 hero-feature">
                                <div class="thumbnail">
                                    <img alt="" src="http://placehold.it/700x400"/>

                                    <div class="caption">
                                        <h5>
                                            Feature Label
                                        </h5>
                                    </div>
                                </div>
                            </div>

                        </div> <div class="row">
                            <div class="col-sm-6 col-md-3 hero-feature">
                                <div class="thumbnail">
                                    <img alt="" src="http://placehold.it/700x400"/>

                                    <div class="caption">
                                        <h5>
                                            Feature Label
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 hero-feature">
                                <div class="thumbnail">
                                    <img alt="" src="http://placehold.it/700x400"/>

                                    <div class="caption">
                                        <h5>
                                            Feature Label
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 hero-feature">
                                <div class="thumbnail">
                                    <img alt="" src="http://placehold.it/700x400"/>

                                    <div class="caption">
                                        <h5>
                                            Feature Label
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 hero-feature">
                                <div class="thumbnail">
                                    <img alt="" src="http://placehold.it/700x400"/>

                                    <div class="caption">
                                        <h5>
                                            Feature Label
                                        </h5>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-3 hero-feature">
                                <div class="thumbnail">
                                    <img alt="" src="http://placehold.it/700x400"/>

                                    <div class="caption">
                                        <h5>
                                            Feature Label
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 hero-feature">
                                <div class="thumbnail">
                                    <img alt="" src="http://placehold.it/700x400"/>

                                    <div class="caption">
                                        <h5>
                                            Feature Label
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 hero-feature">
                                <div class="thumbnail">
                                    <img alt="" src="http://placehold.it/700x400"/>

                                    <div class="caption">
                                        <h5>
                                            Feature Label
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 hero-feature">
                                <div class="thumbnail">
                                    <img alt="" src="http://placehold.it/700x400"/>

                                    <div class="caption">
                                        <h5>
                                            Feature Label
                                        </h5>
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

</div>
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#modal-id').modal({
            'show': true,
        });
        $('.search-customer').keyup(function () {
            $('.body-customer').button('loading');
            // var $btn = $(this);
            // $btn.button('loading');
            // simulating a timeout
            setTimeout(function () {
                $('.body-customer').button('reset');
            }, 1000);
        });

    });
</script>
</body>
</html>
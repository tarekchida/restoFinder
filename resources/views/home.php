
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Resto finder!</title>

        <meta name="description" content="Find the best restaurents arround you !"> 


        <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type="text/css"> 
        <link rel="stylesheet" href="assets/main.css" type="text/css">

    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a class="" href="#">
                                    <img alt="Brand" src="assets/images/logo.png">  
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div> 
            <div class="row content">
                <div class="col-md-8 col-md-offset-2">
                    <form id="searchForm" method="POST" action="#">
                        <div class="row searchContainer">
                            <div class="col-md-3"> 
                            </div>
                            <div class="col-md-3"> 
                                <div class="form-group "> 
                                    <input class="form-control" id="search" type="text" placeholder="Search your restaurant"/>
                                </div>
                            </div>
                            <div class="col-md-3"> 
                                <button type="button" id="searchButton" class="btn btn-default btn-lg btn-block">Search</button>

                            </div>
                            <div class="col-md-3"> 
                            </div>
                        </div> 
                        <div class="row sortContainer">
                            <div class="col-md-3"> 
                            </div>  
                            <div class="col-md-3"> 
                            </div>
                            <div class="col-md-3"> 
                                <label class="control-label sortLabel" for="searchSort">Sort restaurants by : </label>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="searchSort" id="searchSort" class="form-control">
                                        <option value="bestMatch">Best match</options>
                                        <option value="newest">Newest</options>
                                        <option value="ratingAverage">Rating average</options>
                                        <option value="distance">Distance</options>
                                        <option value="popularity">Popularity</options>
                                        <option value="averageProductPrice">Average product price</options>
                                        <option value="deliveryCosts">Delivery costs</options>
                                        <option value="minCost">Minimum cost</option>
                                        <option value="topRestaurants">Top restaurants</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">

                            </div>
                        </div>

                    </form> 
                    <div class="row grid restoGrid">  
                    </div>
                </div>
            </div>

        </div>
        <div id="footer" class="container-fluid footer">
            <div class="row">                

            </div>
        </div>

        <script src="assets/bower_components/jquery/dist/jquery.min.js"></script> 
        <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 
        <script src="assets/main.js"></script>
    </body>
</html>
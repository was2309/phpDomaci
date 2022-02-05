<!DOCTYPE HTML>
<html>

<head>
    <title>Restoran</title>
    <meta charset="UTF-8">

    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script>

    <script>
        // Ajax prikaz recenzija prilikom pokretanja stranice
        $.get("kontroler.php", {
                recenzija: "prikaz"
            })
            .done(function(data) {
                var ispis = '';
                var podaci = JSON.parse(data);
                for (var i = 0; i < podaci.length; i++) {
                    ispis += '<div class="blog_grid">' +
                        '<h2 class="post_title">' + podaci[i].restoran_grupa + '</h2>' +
                        '<ul class="links">' +
                        '<li><i class="fa fa-calendar"></i>' + podaci[i].restoran_id + '</li><br>' +
                        '<li><i class="fa fa-globe"></i> ' + podaci[i].restoran_opis + '</li><br>' +
                        '<li><i class="fa fa-money"></i>' + podaci[i].restoran_cena + '</li>' +
                        '</ul>' +
                        '</div>';
                };

                $('#recenzija').html(ispis);
            });


        //Ajax prikaz svih restorana
        $.get("kontroler.php", {
                restoran: "prikaz"
            })
            .done(function(data) {
                var ispis = '';
                var podaci = JSON.parse(data);
                for (var i = 0; i < podaci.length; i++) {
                    ispis += '<li value=' + podaci[i].restoran_id + '>*' + podaci[i].restoran_naziv + '</li>';

                }
                ispis += '<a style="color:red" href="uredjivanjeRestorana.php">+ Dodaj novi restoran kojeg nema na spisku</a>';
                $('#restoran').html(ispis);
            });


        //Sortiranje
        function sortAsc() {
            $.get("kontroler.php", {
                    recenzija: "sortAsc"
                })
                .done(function(data) {
                    var ispis = '';
                    var podaci = JSON.parse(data);
                    for (var i = 0; i < podaci.length; i++) {
                        ispis += '<div class="blog_grid">' +
                            '<h2 class="post_title">' + podaci[i].restoran_grupa + '</h2>' +
                            '<ul class="links">' +
                            '<li><i class="fa fa-calendar"></i>' + podaci[i].restoran_id + '</li>' +
                            '<li><i class="fa fa-globe"></i> ' + podaci[i].restoran_opis + '</li>' +
                            '<li><i class="fa fa-money"></i>' + podaci[i].restoran_cena + '</li>' +
                            '</ul>' +
                            '</div>';
                    };
                    $('#recenzija').html(ispis);
                });
        }

        function sortDesc() {
            $.get("kontroler.php", {
                    recenzija: "sortDesc"
                })
                .done(function(data) {
                    var ispis = '';
                    var podaci = JSON.parse(data);
                    for (var i = 0; i < podaci.length; i++) {
                        ispis += '<div class="blog_grid">' +
                            '<h2 class="post_title">' + podaci[i].restoran_grupa + '</h2>' +
                            '<ul class="links">' +
                            '<li><i class="fa fa-calendar"></i>' + podaci[i].restoran_id + '</li>' +
                            '<li><i class="fa fa-globe"></i> ' + podaci[i].restoran_opis + '</li>' +
                            '<li><i class="fa fa-money"></i>' + podaci[i].restoran_cena + '</li>' +
                            '</ul>' +
                            '</div>';
                    };
                    $('#recenzija').html(ispis);
                });
        }



        // Ajax pretraga
        function search() {
            $.get("kontroler.php", {
                    recenzija: 'pretraga',
                    tekst: $('#pretraga').val()
                })
                .done(function(data) {
                    var ispis = '';
                    var podaci = JSON.parse(data);
                    for (var i = 0; i < podaci.length; i++) {
                        ispis += '<div class="blog_grid">' +
                            '<h2 class="post_title">' + podaci[i].restoran_grupa + '</h2>' +
                            '<ul class="links">' +
                            '<li><i class="fa fa-calendar"></i>' + podaci[i].restoran_id + '</li>' +
                            '<li><i class="fa fa-globe"></i> ' + podaci[i].restoran_opis + '</li>' +
                            '<li><i class="fa fa-money"></i>' + podaci[i].restoran_cena + '</li>' +
                            '</ul>' +
                            '</div>';
                    };
                    $('#recenzija').html(ispis);
                });
        }
    </script>
</head>

<body>

    <nav class="navbar ">
        <ul class="nav navbar-nav">
            <a href="index.php" class="navbar-left"><img src="images/logoFastFood.jpg"></a>
            <li><a href="index.php">Početna</a></li>
            <li><a href="uredjivanjeRecenzija.php">Uredjivanje recenzija</a></li>
        </ul>
    </nav>


    <div class="about">
        <div class="container">
            <section class="title-section">
                <h1 class="title-header text-center"> Recenzije hrane </h1>
            </section>
            <div class="col-md-6" style="padding:0">
                <button class="btn btn-primary fa fa-arrow-down" onclick="sortDesc()"></button>
                <button class="btn btn-primary pull-right fa fa-arrow-up" onclick="sortAsc()"></button>
            </div>

            <div class="col-md-6">
            </div>
        </div>
    </div><br>



    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <input id="pretraga" type="search" onsearch="search()" class="form-control" placeholder="Pretraga..." onkeyup="search()" size="45">
                <div id="recenzija">
                </div>
            </div>

            <div class="col-md-6">
                <h3>Spisak svih aktivnih restorana u gradu:</h3>

                <ul class="sidebar" id="restoran">
                </ul>
            </div>
        </div>
    </div>
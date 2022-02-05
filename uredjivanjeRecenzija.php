<?php
include 'models/Recenzija.php';

if (isset($_POST['restoran_grupa'])) {

    $recenzija = new Recenzija();
    $recenzija->setRestoran_grupa($_POST['restoran_grupa']);
    $recenzija->setRestoran_cena($_POST['restoran_cena']);
    $recenzija->setRestoran_opis($_POST['restoran_opis']);
    $recenzija->setRestoran_id($_POST['restoran_id']);


    $recenzija->save();
}
?>


<!DOCTYPE HTML>
<html>

<head>
    <title>Recenzije</title>
    <meta charset="UTF-8">

    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script>


    <script src="//cdn.ckeditor.com/4.5.5/basic/ckeditor.js"></script>

    <script>
        $.get("kontroler.php", {
                recenzija: "prikaz"
            })
            .done(function(data) {
                var ispis = '';
                var podaci = JSON.parse(data);
                ispis = '';
                for (var i = 0; i < podaci.length; i++) {
                    ispis += '<div class="blog_grid">' +
                        '<p>' + podaci[i].restoran_grupa + ' - ' + podaci[i].restoran_opis + '</p>' +
                        '<ul class="links">' +
                        '<li><button type="button" onclick="obrisi(' + podaci[i].recenzija_id + ')" >Obrisi</button></li>' +
                        '</ul>' +
                        '</div>';
                };
                $('#firme').html(ispis);
            });

        //ispis delatnost
        $.get("kontroler.php", {
                restoran: "prikaz"
            })
            .done(function(data) {
                var ispis = '';
                var podaci = JSON.parse(data);
                for (var i = 0; i < podaci.length; i++) {
                    ispis += '<option  value=' + podaci[i].restoran_id + '>' + podaci[i].restoran_naziv + '</option>';
                };
                $('#delatnost').html(ispis);
            });


        function obrisi(id) {
            $.get('kontroler.php', {
                    obrisi: 'recenzija',
                    id: id
                })
                .done(function(data) {
                    if (data == 'OK') {
                        location.reload();
                    } else {
                        alert('Greska');
                    }
                });
        }
    </script>

    <div class="about">
        <div class="container">
            <section class="title-section">
                <h1 class="text-center" class="title-header"> Informacije o recenzijama </h1>
                <a href="index.php">
                    < Povratak na pocetnu</a>
            </section>
        </div>
    </div>

    <div class="container">
        <div id="content_left">
            <h1 class="text-center">Unos recenzije</h1>

            <div class="box">

                <p>
                <form class="form-group" action="" method="POST" name="unos">
                    <p>Naziv grupa</p>
                    <input class="form-control" type="text" name="restoran_grupa">
                    <p>Restoran za koji se pise recenzija</p>
                    <select class="form-control" id="delatnost" name="restoran_id">
                    </select>
                    <p>Opis</p>
                    <textarea name="restoran_opis"></textarea>
                    <script>
                        CKEDITOR.replace('restoran_opis');
                    </script>
                    <p>Cena</p>
                    <input type="text" class="form-control" name="restoran_cena">
                    <p></p><br><br>
                    <button type="submit" class="form-control" class="btn btn-danger">Zapamti</button>

                </form>
                </p>
            </div>

            <div class="row">
                <div class="col-md-6" id="firme">
                </div>
            </div>
        </div>
    </div>
<?php

class Restoran
{

    public $restoran_id = 0;
    public $restoran_naziv = '';

    public function getRestoran_id()
    {
        return $this->restoran_id;
    }

    public function getRestoran_naziv()
    {
        return $this->restoran_naziv;
    }

    public function setRestoran_id($restoran_id)
    {
        $this->restoran_id = $restoran_id;
    }

    public function setRestoran_naziv($restoran_naziv)
    {
        $this->restoran_naziv = $restoran_naziv;
    }

    public static function vratiSvePodatkeIzBaze()
    {
        include 'konekcija.php';
        $podaciIzBaze = $mysqli->query('SELECT * FROM restorani');
        $RestoranNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $restoran = new Restoran();
            $restoran->setRestoran_id($red['restoran_id']);
            $restoran->setRestoran_naziv($red['restoran_naziv']);
            array_push($RestoranNiz, $restoran);
        }
        return $RestoranNiz;
    }

    public function save()
    {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("INSERT INTO restorani (restoran_naziv)
            VALUES ('$this->restoran_naziv')");
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }







    public static function obrisi($restoran_id)
    {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query('DELETE FROM restorani WHERE restoran_id=' . $restoran_id);
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }
}

<?php

class Recenzija
{

    public $recenzija_id;
    public $restoran_grupa;
    public $restoran_opis;
    public $restoran_cena;
    public $restoran_id;

    public function getRecenzija_id()
    {
        return $this->recenzija_id;
    }

    public function getRestoran_grupa()
    {
        return $this->restoran_grupa;
    }

    public function getRestoran_opis()
    {
        return $this->restoran_opis;
    }

    public function getRestoran_cena()
    {
        return $this->restoran_cena;
    }

    public function getRestoran_id()
    {
        return $this->restoran_id;
    }

    public function setRecenzija_id($recenzija_id)
    {
        $this->recenzija_id = $recenzija_id;
    }

    public function setRestoran_grupa($restoran_grupa)
    {
        $this->restoran_grupa = $restoran_grupa;
    }

    public function setRestoran_opis($restoran_opis)
    {
        $this->restoran_opis = $restoran_opis;
    }

    public function setRestoran_cena($restoran_cena)
    {
        $this->restoran_cena = $restoran_cena;
    }

    public function setRestoran_id($restoran_id)
    {
        $this->restoran_id = $restoran_id;
    }

    public static function vratiSvePodatkeIzBaze()
    {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query('SELECT recenzija_id, restoran_grupa, restoran_opis, restoran_cena, recenzije.restoran_id 
                                        FROM restorani, recenzije
                                        WHERE restorani.restoran_id=recenzije.restoran_id');
        $recenzijaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $recenzija = new Recenzija();
            $recenzija->setRecenzija_id($red['recenzija_id']);
            $recenzija->setRestoran_grupa($red['restoran_grupa']);
            $recenzija->setRestoran_opis($red['restoran_opis']);
            $recenzija->setRestoran_cena($red['restoran_cena']);
            $recenzija->setRestoran_id($red['restoran_id']);
            array_push($recenzijaNiz, $recenzija);
        }
        return $recenzijaNiz;
    }

    public static function sortAsc()
    {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("SELECT recenzija_id, restoran_grupa, restoran_opis, restoran_cena, recenzije.restoran_id 
                                        FROM restorani, recenzije
                                        WHERE restorani.restoran_id=recenzije.restoran_id
                                        ORDER BY recenzija_id ASC");
        $recenzijaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $recenzija = new Recenzija();
            $recenzija->setRecenzija_id($red['recenzija_id']);
            $recenzija->setRestoran_grupa($red['restoran_grupa']);
            $recenzija->setRestoran_opis($red['restoran_opis']);
            $recenzija->setRestoran_cena($red['restoran_cena']);
            $recenzija->setRestoran_id($red['restoran_id']);
            array_push($recenzijaNiz, $recenzija);
        }
        return $recenzijaNiz;
    }

    public static function sortDesc()
    {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("SELECT recenzija_id, restoran_grupa, restoran_opis, restoran_cena, recenzije.restoran_id 
                                        FROM restorani, recenzije
                                        WHERE restorani.restoran_id=recenzije.restoran_id
                                        ORDER BY recenzija_id DESC");
        $recenzijaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $recenzija = new Recenzija();
            $recenzija->setRecenzija_id($red['recenzija_id']);
            $recenzija->setRestoran_grupa($red['restoran_grupa']);
            $recenzija->setRestoran_opis($red['restoran_opis']);
            $recenzija->setRestoran_cena($red['restoran_cena']);
            $recenzija->setRestoran_id($red['restoran_id']);
            array_push($recenzijaNiz, $recenzija);
        }
        return $recenzijaNiz;
    }

    public static function vratiPoNazivu($pretraga)
    {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("SELECT recenzija_id, restoran_grupa, restoran_opis, restoran_cena, recenzije.restoran_id 
                                        FROM restorani, recenzije
                                        WHERE restorani.restoran_id=recenzije.restoran_id and restoran_grupa LIKE '%$pretraga%'");
        $recenzijaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $recenzija = new Recenzija();
            $recenzija->setRecenzija_id($red['recenzija_id']);
            $recenzija->setRestoran_grupa($red['restoran_grupa']);
            $recenzija->setRestoran_opis($red['restoran_opis']);
            $recenzija->setRestoran_cena($red['restoran_cena']);
            $recenzija->setRestoran_id($red['restoran_id']);
            array_push($recenzijaNiz, $recenzija);
        }
        return $recenzijaNiz;
    }











    public function save()
    {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("INSERT INTO recenzije (restoran_grupa, restoran_opis, restoran_cena, restoran_id)
            VALUES ('$this->restoran_grupa', '$this->restoran_opis', '$this->restoran_cena', '$this->restoran_id')");
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }

    public static function obrisi($recenzija_id)
    {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query('DELETE FROM recenzije WHERE recenzija_id=' . $recenzija_id);
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }
}

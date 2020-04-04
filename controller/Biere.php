<?

class Biere {

    private $_id;
    private $_idBrasserie;
    private $_nom;
    private $_couleur;
    private $_degre;
    private $_gout;
    private $_alcool;
    private $_malt;
    private $_conservation;
    private $filtration;
    private $_type;
    private $_contenance;
    private $_desc;
    private $_photo;

    // Liste des getters

    public function id() { return $_id; }
    public function idBrasserie() { return $_idBrasserie; }
    public function nom() { return $_nom; }
    public function couleur() { return $_couleur; }
    public function degree() { return $_degree; }
    public function gout() { return $_gout; }
    public function alcool() { return $_alcool; }
    public function malt() { return $_malt; }
    public function conservation() { return $_conservation; }
    public function filtration() { return $_filtration; }
    public function type() { return $_type; }
    public function contenance() { return $_contenance; }
    public function desc() { return $_presentation; }
    public function photo() { return $_photo; }


    // Liste des Setters

    public function setIdBrasserie($idBrasserie) {

        $idBrasserie = (int) $idBrasserie;

        if($idBrasserie > 0) {
            $this->_idBrasserie = $idBrasserie;
        }
    }


    public function setNom($nom) {

        $nom = (string) $nom;

        if(strlen($nom) > 0) {
            $this->_nom = $nom;
        }
    }

    public function setCouleur($couleur) {

        $listeCouleur = Array('blonde', 'speciale', 'brune', 'noire', 'ambree', 'blanche');

        if(in_array($couleur, $listeCouleur)) {
            $this->_couleur = $couleur;
        }
    }

    public function setDegree($degree) {

        $degree = (int) $degree;

        if($degree > 0 && $degree < 50) {
            $this->_degree = $degree;
        }

    }

    public function setGout($gout) {

        if(strlen($gout) > 0) {
            $this->_gout = $gout;
        }
    }

    public function setAlcool($alcool) {

        if(is_string($alcool)) {
            if($alcool == 'oui' || $alcool == 'non') {
                $this->_alcool = $alcool;
            }
        }
    }

    public function setMalt($malt) {

        if(strlen($malt) > 0) {
            $this->_malt = $malt;
        }
    }

    public function setConservation($conversation) {

        if(is_string($conservation)) {
            if($conservation == 'pasteurisee' || $conservation == 'non pasteurisee') {
                $this->_conservation = $conservation;
            }
        }
    }

    public function setFiltration($filtration) {

        if(is_string($filtration)) {
            if($filtration == 'oui' || $filtration == 'non') {
                $this->_filtration = $filtration;
            }
        }
    }

    public function setType($type) {

        if(strlen($type) > 0) {
            $this->_type = $type;
        }
    }


    public function setDesc($desc) {

        if(strlen($desc) > 0) {
            $this->_desc = $desc;
        }
    }

    public function setPhoto($urlphoto) {

        if(is_string($urlphoto)) {

            if(stristr($urlphoto, 'jpg')
                || stristr($urlphoto, 'png')) {

                $this->_photo = $urlphoto;
            }
        }
    }

    function hydrate(array $biere) {

        foreach ($biere as $key => $value) {

            $methode = 'set'.ucfirst($key);

            if(method_exists(Biere, $methode())) {
                $methode($value);
            }
        }
    }
    
}
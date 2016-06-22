<?php
class Cliente {
  public $id;
  public $cognome;
  public $nome;
  public $comuneId;
  public $comune;

  public function setId($id) {
    $this->id = $id;
  }
  public function setCognome($cognome) {
    $this->cognome = $cognome;
  }
  public function setNome($Nome) {
    $this->nome = $Nome;
  }
  public function setComuneId($ComuneId) {
    $this->comuneId = $ComuneId;
  }
  public function setComune($Comune) {
    $this->comune = $Comune;
  }
}

?>

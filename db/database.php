<?php
    class DatabaseHelper{
        private $db;

        public function __construct($servername, $username, $password, $dbname, $port){
            $this->db = new mysqli($servername, $username, $password, $dbname, $port);
            if ($this->db->connect_error) {
                die("Connection failed: " . $this->db->connect_error);
            }        
        }

        public function getGruppiPerTipoLimit(string $tipo, int $limit) {
            $stmt = $this->db->prepare("SELECT * FROM gruppi WHERE tipo = ? ORDER BY codice DESC LIMIT ?");
            $stmt->bind_param('si', $tipo, $limit);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }
        
        public function getGruppiCasuali(int $limit) {
            $stmt = $this->db->prepare("SELECT * FROM gruppi ORDER BY RAND() LIMIT ?");
            $stmt->bind_param('i', $limit);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function getCorsi(){
            $stmt = $this->db->prepare("SELECT * FROM Corsi");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getDocenti(string $codiceCorso){
            $stmt = $this->db->prepare("SELECT Docenti.* FROM Docenti, Insegnamenti 
            WHERE Insegnamenti.CodiceDocente=Docenti.Codice AND Insegnamenti.CodiceCorso=?");
            $stmt->bind_param('s', $codiceCorso);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function getCorsiPerNome(string $nomeCorso){
            $stmt = $this->db->prepare("SELECT * FROM Corsi WHERE Corsi.Nome LIKE CONCAT ('%', ?, '%')");
            $stmt->bind_param('s', $nomeCorso);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function getGruppi(){
            $stmt = $this->db->prepare("SELECT Gruppi.Nome, Tipo, NumeroMembri, NumeroMembriAttuale, Gruppi.Codice, Corsi.Nome AS NomeCorso
            FROM Gruppi, Corsi WHERE Gruppi.CodiceCorso=Corsi.Codice");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getGruppiPerNome(string $nomeGruppo){
            $stmt = $this->db->prepare("SELECT Gruppi.Nome, Tipo, NumeroMembri, NumeroMembriAttuale, Gruppi.Codice, Corsi.Nome AS NomeCorso
            FROM Gruppi, Corsi WHERE Gruppi.CodiceCorso=Corsi.Codice AND Gruppi.Nome LIKE CONCAT ('%', ?, '%')");
            $stmt->bind_param('s', $nomeGruppo);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function getGruppiPerTipoPerCorso(string $tipo, string $corso){
            $stmt = $this->db->prepare("SELECT Gruppi.Nome, Tipo, NumeroMembri, NumeroMembriAttuale, Gruppi.Codice, Corsi.Nome AS NomeCorso
            FROM Gruppi, Corsi WHERE Gruppi.CodiceCorso=Corsi.Codice AND Gruppi.Tipo=? AND Corsi.Nome=?");
            $stmt->bind_param('ss', $tipo, $corso);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function getGruppiPerCorso(string $corso){
            $stmt = $this->db->prepare("SELECT Gruppi.Nome, Tipo, NumeroMembri, NumeroMembriAttuale, Gruppi.Codice, Corsi.Nome AS NomeCorso
            FROM Gruppi, Corsi WHERE Gruppi.CodiceCorso=Corsi.Codice AND Corsi.Nome=?");
            $stmt->bind_param('s', $corso);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function getGruppiPerTipo(string $tipo){
            $stmt = $this->db->prepare("SELECT Gruppi.Nome, Tipo, NumeroMembri, NumeroMembriAttuale, Gruppi.Codice, Corsi.Nome AS NomeCorso
            FROM Gruppi, Corsi WHERE Gruppi.CodiceCorso=Corsi.Codice AND Gruppi.Tipo=?");
            $stmt->bind_param('s', $tipo);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

    }
?>
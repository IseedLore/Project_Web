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
            $stmt = $this->db->prepare("SELECT * FROM corsi ORDER BY nome");
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


        function getIncontriStudente(string $matricola) {
        
            $query = "SELECT i.CodiceGruppo, g.Nome AS NomeGruppo, i.Data, i.Orario, i.Modalità, i.Luogo, i.Note 
                    FROM Iscrizioni isc
                    JOIN Gruppi g ON isc.CodiceGruppo = g.Codice
                    JOIN Incontri i ON g.Codice = i.CodiceGruppo
                    WHERE isc.MatricolaStudente = ?
                    ORDER BY i.Data ASC, i.Orario ASC";

            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s', $matricola);
            $stmt->execute();
            
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);                
        }

        function getGruppiSuggeriti(string $matricola, int $limit) {
        
            $query = "SELECT g.Codice, g.Nome, g.Descrizione, g.NumeroMembri, g.NumeroMembriAttuale, g.Tipo, c.Nome AS NomeCorso
                FROM Gruppi g
                JOIN Preferenze p ON g.CodiceCorso = p.CodiceCorso
                JOIN Corsi c ON g.CodiceCorso = c.Codice
                WHERE p.MatricolaStudente = ?
                    AND g.Codice NOT IN (
                        SELECT CodiceGruppo 
                        FROM Iscrizioni 
                        WHERE MatricolaStudente = ?
                    )
                ORDER BY RAND()
                LIMIT ?";

            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssi', $matricola, $matricola, $limit);
            $stmt->execute();
            
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);                
        }


        public function checkLogin(string $email, string $password){
        $query = "SELECT * FROM studenti WHERE email = ? AND password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
        }


        public function RegistrazioneUtente(string $matricola, string $nome, string $cognome, string $email, string $password) {
            $query = "INSERT INTO studenti (Matricola, Nome, Cognome, Email, Password, Immagine) VALUES (?, ?, ?, ?, ?, NULL)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('sssss',$matricola, $nome, $cognome, $email, $password);
            $stmt->execute();
            
            return $stmt->insert_id;
        }
 
        public function checkRegistrazion(string $matricola, string $email) {
            $query = "SELECT * FROM studenti WHERE matricola = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s',$matricola);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                return false;
            }            

            // $query = "SELECT * FROM studenti WHERE matricola = ? AND email = ?";
            // $stmt = $this->db->prepare($query);
            // $stmt->bind_param('ss',$matricola, $email);
            // $stmt->execute();
            // $result = $stmt->get_result();   
            // if($result->num_rows > 0){
            //     return false;
            // }       
            
            // return true;
        }
    }
                
?>
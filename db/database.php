<?php
    class DatabaseHelper{
        private $db;

        public function __construct($servername, $username, $password, $dbname, $port){
            $this->db = new mysqli($servername, $username, $password, $dbname, $port);
            if ($this->db->connect_error) {
                die("Connection failed: " . $this->db->connect_error);
            }        
        }

        public function getGruppiPerTipo(string $tipo, int $limit) {
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
    }
?>
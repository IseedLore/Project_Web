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
            $stmt = $this->db->prepare("SELECT Gruppi.Nome, Tipo, NumeroMembriRichiesti, NumeroMembriAttuali, Gruppi.Codice, Corsi.Nome AS NomeCorso
            FROM Gruppi, Corsi WHERE Gruppi.CodiceCorso=Corsi.Codice");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getGruppiPerNome(string $nomeGruppo){
            $stmt = $this->db->prepare("SELECT Gruppi.Nome, Tipo, NumeroMembriRichiesti, NumeroMembriAttuali, Gruppi.Codice, Corsi.Nome AS NomeCorso
            FROM Gruppi, Corsi WHERE Gruppi.CodiceCorso=Corsi.Codice AND Gruppi.Nome LIKE CONCAT ('%', ?, '%')");
            $stmt->bind_param('s', $nomeGruppo);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function getGruppiPerTipoPerCorso(string $tipo, string $corso){
            $stmt = $this->db->prepare("SELECT Gruppi.Nome, Tipo, NumeroMembriRichiesti, NumeroMembriAttuali, Gruppi.Codice, Corsi.Nome AS NomeCorso
            FROM Gruppi, Corsi WHERE Gruppi.CodiceCorso=Corsi.Codice AND Gruppi.Tipo=? AND Corsi.Nome=?");
            $stmt->bind_param('ss', $tipo, $corso);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function getGruppiPerCorso(string $corso){
            $stmt = $this->db->prepare("SELECT Gruppi.Nome, Tipo, NumeroMembriRichiesti, NumeroMembriAttuali, Gruppi.Codice, Corsi.Nome AS NomeCorso
            FROM Gruppi, Corsi WHERE Gruppi.CodiceCorso=Corsi.Codice AND Corsi.Nome=?");
            $stmt->bind_param('s', $corso);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function getGruppiPerTipo(string $tipo){
            $stmt = $this->db->prepare("SELECT Gruppi.Nome, Tipo, NumeroMembriRichiesti, NumeroMembriAttuali, Gruppi.Codice, Corsi.Nome AS NomeCorso
            FROM Gruppi, Corsi WHERE Gruppi.CodiceCorso=Corsi.Codice AND Gruppi.Tipo=?");
            $stmt->bind_param('s', $tipo);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function getGruppiPerStudenteLoggato(string $matricola){
            $stmt = $this->db->prepare("SELECT Gruppi.Nome, Tipo, NumeroMembriRichiesti, NumeroMembriAttuali, Gruppi.Codice, Corsi.Nome AS NomeCorso
            FROM Gruppi, Corsi WHERE Gruppi.CodiceCorso=Corsi.Codice AND Gruppi.MatricolaCreatore=?");
            $stmt->bind_param('s', $matricola);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function getGruppiPerStudenteLoggatoPerTipo(string $matricola, string $tipo){
            $stmt = $this->db->prepare("SELECT Gruppi.Nome, Tipo, NumeroMembriRichiesti, NumeroMembriAttuali, Gruppi.Codice, Corsi.Nome AS NomeCorso
            FROM Gruppi, Corsi WHERE Gruppi.CodiceCorso=Corsi.Codice AND Gruppi.MatricolaCreatore=? AND Gruppi.Tipo=?");
            $stmt->bind_param('ss', $matricola, $tipo);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function getGruppiPerStudenteLoggatoPerCorso(string $matricola, string $corso){
            $stmt = $this->db->prepare("SELECT Gruppi.Nome, Tipo, NumeroMembriRichiesti, NumeroMembriAttuali, Gruppi.Codice, Corsi.Nome AS NomeCorso
            FROM Gruppi, Corsi WHERE Gruppi.CodiceCorso=Corsi.Codice AND Gruppi.MatricolaCreatore=? AND Corsi.Nome=?");
            $stmt->bind_param('ss', $matricola, $corso);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function getGruppiPerStudenteLoggatoPerCorsoPerTipo(string $matricola, string $tipo, string $corso){
            $stmt = $this->db->prepare("SELECT Gruppi.Nome, Tipo, NumeroMembriRichiesti, NumeroMembriAttuali, Gruppi.Codice, Corsi.Nome AS NomeCorso
            FROM Gruppi, Corsi WHERE Gruppi.CodiceCorso=Corsi.Codice AND Gruppi.MatricolaCreatore=? AND Gruppi.Tipo=? AND Corsi.Nome=?");
            $stmt->bind_param('sss', $matricola, $tipo, $corso);
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
            $query = "SELECT g.Codice, g.Nome, g.Descrizione, g.NumeroMembriRichiesti, g.NumeroMembriAttuali, g.Tipo, c.Nome AS NomeCorso
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
 
        public function checkRegistrazion(string $matricola, string $email, string $password) {
            $query = "SELECT * FROM studenti WHERE matricola = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s',$matricola);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                return 1;
            }            

            $query = "SELECT * FROM studenti WHERE email = ? AND password = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();   
            if($result->num_rows > 0){
                return 2;
            }       
            
            return 0;
        }
        
        public function getGruppoPerCodice(int $codice){
            $query = "SELECT Gruppi.Nome AS NomeGruppo, Gruppi.Descrizione, Tipo, NumeroMembriRichiesti, NumeroMembriAttuali, Gruppi.Codice AS CodiceGruppo, Gruppi.DataConsegnaProgetto,
            Corsi.Nome AS NomeCorso, Corsi.Codice AS CodiceCorso FROM Gruppi, Corsi WHERE Gruppi.CodiceCorso=Corsi.Codice AND Gruppi.Codice=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i', $codice);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function getIncontriGruppo(int $codiceGruppo){
            $query = "SELECT * FROM Incontri WHERE CodiceGruppo=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i', $codiceGruppo);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function getIncontroGruppoPerId(int $codiceGruppo, string $data, string $orario){
            $query = "SELECT * FROM Incontri WHERE CodiceGruppo=? AND Data=? AND Orario=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('iss', $codiceGruppo, $data, $orario);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function updateIncontro(int $codiceGruppo, string $data, string $orario, string $mod, string $luogo, string $note){
            $query = "UPDATE Incontri SET Modalità=?, Luogo=?, Note=? WHERE CodiceGruppo=? AND Data=? AND Orario=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('sssiss', $mod, $luogo, $note, $codiceGruppo, $data, $orario);
            return $stmt->execute();
        }

        public function deleteIncontro(int $codiceGruppo, string $data, string $orario){
            $query = "DELETE FROM Incontri WHERE CodiceGruppo=? AND Data=? AND Orario=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('iss', $codiceGruppo, $data, $orario);
            return $stmt->execute();
        }

        public function insertIncontro(int $codiceGruppo, string $data, string $orario, string $mod, string $luogo, string $note){
            $query = "INSERT INTO Incontri(CodiceGruppo, Data, Orario, Modalità, Luogo, Note) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('isssss', $codiceGruppo, $data, $orario, $mod, $luogo, $note);
            return $stmt->execute();
        }

        public function getStudentiIscrittiGruppo(int $codiceGruppo){
            $query = "SELECT S.Nome, S.Cognome, S.Email, S.Matricola FROM Iscrizioni I, Studenti S
            WHERE I.MatricolaStudente=S.Matricola AND I.CodiceGruppo=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i', $codiceGruppo);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function insertNuovaIscrizioneGruppo(int $codiceGruppo, string $matricola){
            $query = "INSERT INTO Iscrizioni VALUES (?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('is', $codiceGruppo, $matricola);
            $stmt->execute();
            return $stmt->insert_id;
        }

        public function updateNumeroMembriGruppo(int $codiceGruppo){
            $query = "UPDATE Gruppi SET NumeroMembriAttuali = NumeroMembriAttuali+1 WHERE Codice=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i', $codiceGruppo);
            return $stmt->execute();
        }

        function getCreatoreGruppo(int $codiceGruppo){
            $query = "SELECT * FROM Gruppi WHERE Codice=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i', $codiceGruppo);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function getGruppiPerMatricola(string $matricola){
            $query = "SELECT g.Codice, g.Nome, g.DataConsegnaProgetto AS Data FROM Gruppi g
                    JOIN Iscrizioni I ON G.Codice = I.CodiceGruppo
                    WHERE I.MatricolaStudente = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s', $matricola);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function insertGruppoStudio(string $nome, string $descrizione, int $membriRichiesti, string $studente, string $corso){
            $query = "INSERT INTO Gruppi(Nome, Descrizione, NumeroMembriRichiesti, NumeroMembriAttuali, Tipo, MatricolaCreatore, CodiceCorso)
            VALUES (?, ?, ?, 1, 'Studio', ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssiss', $nome, $descrizione, $membriRichiesti, $studente, $corso);

            return $stmt->execute();
        }

        public function insertGruppoProgetto(string $nome, string $descrizione, int $membriRichiesti, string $studente, string $corso, string $dataConsegna){
            $query = "INSERT INTO Gruppi(Nome, Descrizione, NumeroMembriRichiesti, NumeroMembriAttuali, Tipo, MatricolaCreatore, CodiceCorso, DataConsegnaProgetto)
            VALUES (?, ?, ?, 1, 'Progetto', ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssisss', $nome, $descrizione, $membriRichiesti, $studente, $corso, $dataConsegna);

            return $stmt->execute();
        }

        public function insertIscrizioneNuovoGruppo(string $matricola){
            $query = "INSERT INTO Iscrizioni (CodiceGruppo, MatricolaStudente) VALUES (LAST_INSERT_ID(), ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s', $matricola);
 
            return $stmt->execute();
        }
    }
                
?>
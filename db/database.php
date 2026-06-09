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

        public function getDocenti(){
            $stmt = $this->db->prepare("SELECT * FROM Docenti");
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function getDocentiPerCorso(string $codiceCorso){
            $stmt = $this->db->prepare("SELECT Docenti.* , Insegnamenti.Classe AS Classe FROM Docenti, Insegnamenti 
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

            return $stmt->execute();
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

        public function getPreferencePerMatricola(string $matricola, int $limit = -1){
            $query = "SELECT c.Nome
                        FROM Preferenze p
                        JOIN Corsi c ON p.CodiceCorso = c.Codice
                        WHERE p.MatricolaStudente = ?
                        ORDER BY c.Nome ASC";
            
            if($limit > 0){
                $query .= " LIMIT ?";
            }
            $stmt = $this->db->prepare($query);
            if( $limit > 0){
                $stmt->bind_param('si', $matricola, $limit);
            } else {
                $stmt->bind_param('s', $matricola);
            }
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function getGruppiIscrittoNonCreatore(string $matricola) {
            $query = "SELECT g.Codice, g.Nome, g.Tipo, g.CodiceCorso, g.NumeroMembriRichiesti, g.NumeroMembriAttuali, c.Nome AS NomeCorso
                FROM Gruppi g
                JOIN Iscrizioni isc ON g.Codice = isc.CodiceGruppo
                JOIN Corsi c ON g.CodiceCorso = c.Codice
                WHERE isc.MatricolaStudente = ? AND g.MatricolaCreatore <> ?
                ORDER BY g.Nome ASC";

            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $matricola, $matricola);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function updateImg(string $matricola,string $img) {
            $query = "UPDATE Studenti SET Immagine = ? WHERE matricola=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $img , $matricola);
            return $stmt->execute();
        }

        public function getStudente(string $matricola) {
            $query = "SELECT * FROM Studenti WHERE matricola = ?";
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
            $stmt->execute();
            return $stmt->insert_id;
        }

        public function insertGruppoProgetto(string $nome, string $descrizione, int $membriRichiesti, string $studente, string $corso, string $dataConsegna){
            $query = "INSERT INTO Gruppi(Nome, Descrizione, NumeroMembriRichiesti, NumeroMembriAttuali, Tipo, MatricolaCreatore, CodiceCorso, DataConsegnaProgetto)
            VALUES (?, ?, ?, 1, 'Progetto', ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssisss', $nome, $descrizione, $membriRichiesti, $studente, $corso, $dataConsegna);
            $stmt->execute();
            return $stmt->insert_id;
        }

        public function deletePreferenze(string $matricola){
            $query = "DELETE FROM Preferenze WHERE MatricolaStudente = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s', $matricola);
            return $stmt->execute();
        }

        public function insertPreferenze(string $matricola, string $codice_preferenze_inserite){
            $query = "INSERT INTO Preferenze (CodiceCorso, MatricolaStudente) VALUES (?, ?) ";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $codice_preferenze_inserite, $matricola);
            return $stmt->execute();
        }

        public function checkAdmin(string $username, string $password){
            $query = "SELECT * FROM Amministratori WHERE Username=? AND Password=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function deleteIscrizioniGruppoCorso(string $corso){
            $query = "DELETE FROM Iscrizioni WHERE CodiceGruppo IN (SELECT Codice FROM Gruppi WHERE CodiceCorso=?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s', $corso);
            return $stmt->execute();
        }

        public function deleteGruppiCorso(string $corso){
            $query = "DELETE FROM Gruppi WHERE CodiceCorso=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s', $corso);
            return $stmt->execute();
        }

        public function deleteInsegnamentiCorso(string $corso, int $docente){
            $query = "DELETE FROM Insegnamenti WHERE CodiceCorso=? AND CodiceDocente=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $corso, $docente);
            return $stmt->execute();
        }

        public function deleteCorso(string $corso){
            $query = "DELETE FROM Corsi WHERE codice=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s', $corso);
            return $stmt->execute();
        }

        public function getCorsoPerCodice(string $corso){
            $query = "SELECT * FROM Corsi WHERE Codice=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s', $corso);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function insertCorso(string $codice, string $nome, int $cfu, string $descrizione, int $progetto){
            $query = "INSERT INTO Corsi (Codice, Nome, CFU, Descrizione, ProgettoRichiesto) VALUES(?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssisi', $codice, $nome, $cfu, $descrizione, $progetto);
            return $stmt->execute();
        }

        public function insertInsegnamento(int $docente, string $classe, string $corso){
            $query = "INSERT INTO Insegnamenti (CodiceDocente, Classe, CodiceCorso) VALUES(?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('iss', $docente, $classe, $corso);
            return $stmt->execute();
        }

        public function updateGruppiCorso(string $nuovo, string $vecchio){
            $query = "UPDATE Gruppi SET CodiceCorso=? WHERE CodiceCorso=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $nuovo, $vecchio);
            return $stmt->execute();
        }

        public function updateCodiceCorso(string $nuovo, string $vecchio){
            $query = "UPDATE Corsi SET Codice=? WHERE Codice=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $nuovo, $vecchio);
            return $stmt->execute();
        }

        public function updateCorso(string $codice, string $nome, int $cfu, string $descrizione, int $progetto){
            $query = "UPDATE Corsi SET Nome=?, CFU=?, Descrizione=?, ProgettoRichiesto=? WHERE Codice=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('sisis',  $nome, $cfu, $descrizione, $progetto, $codice);
            return $stmt->execute();
        }

        public function getInsegnamentiCorso(string $corso){
            $query = "SELECT * FROM Insegnamenti WHERE CodiceCorso=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s', $corso);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function deleteGruppo(int $codice){
            $query = "DELETE FROM Gruppi WHERE Codice=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i', $codice);
            return $stmt->execute();
        }

        public function updateGruppoNomeDescr(int $codice, string $nome, string $descrizione){
            $query = "UPDATE Gruppi SET Nome=?, Descrizione=? WHERE Codice=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssi', $nome, $descrizione, $codice);
            return $stmt->execute();
        }

    }
?>
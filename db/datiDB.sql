USE Gruppi_Studenti;

-- Studenti --
INSERT INTO Studenti
VALUES('0001081674', 'Irene', 'Borri', 'irene.borri@studio.unibo.it', 'ireneprojweb', '');


-- Docenti --
INSERT INTO Docenti
VALUES(1, 'Eleonora', 'Cinti');

INSERT INTO Docenti
VALUES(2, 'Antonella', 'Carbonaro');

INSERT INTO Docenti
VALUES(3, 'Mirko', 'Ravaioli');

INSERT INTO Docenti
VALUES(4, 'Roberto', 'Girau');

INSERT INTO Docenti
VALUES(5, 'Andrea', 'Piroddi');

INSERT INTO Docenti
VALUES(6, 'Luca', 'Moci');

INSERT INTO Docenti
VALUES(7, 'Luciano', 'Margara');

INSERT INTO Docenti
VALUES(8, 'Moreno', 'Marzolla');

INSERT INTO Docenti
VALUES(9, 'Vittorio', 'Maniezzo');

INSERT INTO Docenti
VALUES(10, 'Davide', 'Maltoni');

INSERT INTO Docenti
VALUES(11, 'Matteo', 'Ferrara');

INSERT INTO Docenti
VALUES(12, 'Raffaele', 'Cappelli');

INSERT INTO Docenti
VALUES(13, 'Fabrizio', 'Caselli');

INSERT INTO Docenti
VALUES(14, 'Jacopo', 'Gandini');

INSERT INTO Docenti
VALUES(15, 'Mirko', 'Viroli');

INSERT INTO Docenti
VALUES(16, 'Danilo', 'Pianini');

INSERT INTO Docenti
VALUES(17, 'Roberto', 'Casadei');

INSERT INTO Docenti
VALUES(18, 'Vittorio', 'Ghini');

INSERT INTO Docenti
VALUES(19, 'Annalisa', 'Franco');

INSERT INTO Docenti
VALUES(20, 'Luigi', 'Guiducci');

INSERT INTO Docenti
VALUES(21, 'Damiana', 'Lazzaro');

INSERT INTO Docenti
VALUES(22, 'Franco', 'Callegati');

INSERT INTO Docenti
VALUES(23, 'Stefano', 'Rizzi');

INSERT INTO Docenti
VALUES(24, 'Silvia', 'Mirri');

INSERT INTO Docenti
VALUES(25, 'Giovanni', 'Delnevo');

INSERT INTO Docenti
VALUES(26, 'Allessandro', 'Hill');

INSERT INTO Docenti
VALUES(27, 'Marco Antonio', 'Boschetti');

INSERT INTO Docenti
VALUES(28, 'Matteo', 'Golfarelli');

INSERT INTO Docenti
VALUES(29, 'Alessandra', 'Lumini');

INSERT INTO Docenti
VALUES(30, 'Alessandro', 'Ricci');

INSERT INTO Docenti
VALUES(31, 'Luisa', "Dall'Acqua");

INSERT INTO Docenti
VALUES(32, 'Gianluca', 'Moro');

INSERT INTO Docenti
VALUES(33, 'Catia', 'Prandi');

INSERT INTO Docenti
VALUES(34, 'Ciro', 'Barbone');

INSERT INTO Docenti
VALUES(35, 'Enrico', 'Fiumana');


-- Corsi --
INSERT INTO Corsi
VALUES('00013', 'Analisi Matematica', '', 12, FALSE);

INSERT INTO Corsi
VALUES('00819', 'Programmazione', '', 12, TRUE);

INSERT INTO Corsi
VALUES('58414', 'Algebra e Geometria', '', 6, FALSE);

INSERT INTO Corsi
VALUES('11929', 'Algoritmi e Strutture Dati', '', 12, FALSE);

INSERT INTO Corsi
VALUES('69731', 'Architetture degli Elaboratori', '', 12, FALSE);

INSERT INTO Corsi
VALUES('77776', 'Matematica Discreta e Probabilità', '', 6, FALSE);

INSERT INTO Corsi
VALUES('70219', 'Programmazione ad Oggetti', '', 12, TRUE);

INSERT INTO Corsi
VALUES('08574', 'Sistemi Operativi', '', 12, FALSE);

INSERT INTO Corsi
VALUES('10906', 'Basi di Dati', '', 12, TRUE);

INSERT INTO Corsi
VALUES('00405', 'Fisica', '', 6, FALSE);

INSERT INTO Corsi
VALUES('66736', 'Metodi Numerici', '', 6, FALSE);

INSERT INTO Corsi
VALUES('70226', 'Programmazione di Reti', '', 6, FALSE);

INSERT INTO Corsi
VALUES('09032', 'Ingegneria del Software', '', 6, FALSE);

INSERT INTO Corsi
VALUES('70218', 'Reti di Telecomunicazione', '', 6, FALSE);

INSERT INTO Corsi
VALUES('41731', 'Tecnologie Web', '', 6, TRUE);

INSERT INTO Corsi
VALUES('00884', 'Ricerca Operativa', '', 6, FALSE);

INSERT INTO Corsi
VALUES('70090', 'Computer Graphics', '', 6, TRUE);

INSERT INTO Corsi
VALUES('70227', 'Informatica e Diritto', '', 6, FALSE);

INSERT INTO Corsi
VALUES('77780', 'Sistemi Embedded e Internet-Of-Things', '', 6, TRUE);

INSERT INTO Corsi
VALUES('84339', 'Basi di Dati Avanzate', '', 6, FALSE);

INSERT INTO Corsi
VALUES('72796', 'Programmazione di Applicazioni Data Intensive', '', 6, TRUE);

INSERT INTO Corsi
VALUES('72787', 'Programmazione di Sistemi Mobile', '', 6, TRUE);

INSERT INTO Corsi
VALUES('17634', 'Visione Artificiale', '', 6, FALSE);

INSERT INTO Corsi
VALUES('72778', 'High-Performance Computing', '', 6, TRUE);

INSERT INTO Corsi
VALUES('14015', 'Crittografia', '', 6, FALSE);

INSERT INTO Corsi
VALUES('96642', 'Virtualizzazione e Integrazione di Sistemi', '', 6, FALSE);


-- Insegnamenti --
INSERT INTO Insegnamenti
VALUES(1, '00013', '');

INSERT INTO Insegnamenti
VALUES(2, '00819', 'A');
INSERT INTO Insegnamenti
VALUES(3, '00819', 'A');
INSERT INTO Insegnamenti
VALUES(4, '00819', 'B');
INSERT INTO Insegnamenti
VALUES(5, '00819', 'B');

INSERT INTO Insegnamenti
VALUES(6, '58414', '');

INSERT INTO Insegnamenti
VALUES(7, '11929', 'A');
INSERT INTO Insegnamenti
VALUES(8, '11929', ''); 
/* Se la classe non è indicata, significa che il docente insegna in tutte le classi di quel corso */
INSERT INTO Insegnamenti
VALUES(9, '11929', 'B');

INSERT INTO Insegnamenti
VALUES(10, '69731', 'A'); 
INSERT INTO Insegnamenti
VALUES(11, '69731', ''); 
INSERT INTO Insegnamenti
VALUES(12, '69731', 'B'); 

INSERT INTO Insegnamenti
VALUES(13, '77776', ''); 
INSERT INTO Insegnamenti
VALUES(14, '77776', ''); 

INSERT INTO Insegnamenti
VALUES(15, '70219', ''); 
INSERT INTO Insegnamenti
VALUES(16, '70219', '');
INSERT INTO Insegnamenti
VALUES(17, '70219', '');  

INSERT INTO Insegnamenti
VALUES(18, '08574', ''); 

INSERT INTO Insegnamenti
VALUES(19, '10906', ''); 

INSERT INTO Insegnamenti
VALUES(20, '00405', ''); 

INSERT INTO Insegnamenti
VALUES(21, '66736', ''); 

INSERT INTO Insegnamenti
VALUES(22, '70226', ''); 
INSERT INTO Insegnamenti
VALUES(4, '70226', ''); 
INSERT INTO Insegnamenti
VALUES(5, '70226', '');

INSERT INTO Insegnamenti
VALUES(23, '09032', '');  

INSERT INTO Insegnamenti
VALUES(22, '70218', ''); 

INSERT INTO Insegnamenti
VALUES(24, '41731', ''); 
INSERT INTO Insegnamenti
VALUES(25, '41731', ''); 

INSERT INTO Insegnamenti
VALUES(26, '00884', ''); 

INSERT INTO Insegnamenti
VALUES(21, '70090', ''); 

INSERT INTO Insegnamenti
VALUES(31, '70227', ''); 

INSERT INTO Insegnamenti
VALUES(30, '77780', ''); 

INSERT INTO Insegnamenti
VALUES(28, '84339', ''); 
INSERT INTO Insegnamenti
VALUES(29, '84339', '');

INSERT INTO Insegnamenti
VALUES(32, '72796', '');

INSERT INTO Insegnamenti
VALUES(33, '72787', '');

INSERT INTO Insegnamenti
VALUES(12, '17634', '');

INSERT INTO Insegnamenti
VALUES(8, '72778', '');

INSERT INTO Insegnamenti
VALUES(7, '14015', '');

INSERT INTO Insegnamenti
VALUES(18, '96642', '');
INSERT INTO Insegnamenti
VALUES(34, '96642', '');
INSERT INTO Insegnamenti
VALUES(35, '96642', '');


-- Preferenze --
INSERT INTO Preferenze
VALUES('77780', '0001081674');
INSERT INTO Preferenze
VALUES('70090', '0001081674');
INSERT INTO Preferenze
VALUES('00405', '0001081674');


-- Gruppi --
INSERT INTO Gruppi
VALUES(1, 'Progetto Web - Gruppi studenti', '', 2, 0, '', 'Progetto', '2026-05-04', '0001081674', '41731');
UPDATE Gruppi
SET NumeroMembriAttuale=NumeroMembriAttuale+1;


-- Incontri --
INSERT INTO Incontri
VALUES(1, '2026-05-13', '10:30:00', 'Da remoto', '', 'Primo incontro per disctuere idee per il progetto.');
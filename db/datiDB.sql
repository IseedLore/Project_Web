USE Gruppi_Studenti;

-- Docenti --
INSERT INTO Docenti VALUES
(1, 'Eleonora', 'Cinti'),
(2, 'Antonella', 'Carbonaro'),
(3, 'Mirko', 'Ravaioli'),
(4, 'Roberto', 'Girau'),
(5, 'Andrea', 'Piroddi'),
(6, 'Luca', 'Moci'),
(7, 'Luciano', 'Margara'),
(8, 'Moreno', 'Marzolla'),
(9, 'Vittorio', 'Maniezzo'),
(10, 'Davide', 'Maltoni'),
(11, 'Matteo', 'Ferrara'),
(12, 'Raffaele', 'Cappelli'),
(13, 'Fabrizio', 'Caselli'),
(14, 'Jacopo', 'Gandini'),
(15, 'Mirko', 'Viroli'),
(16, 'Danilo', 'Pianini'),
(17, 'Roberto', 'Casadei'),
(18, 'Vittorio', 'Ghini'),
(19, 'Annalisa', 'Franco'),
(20, 'Luigi', 'Guiducci'),
(21, 'Damiana', 'Lazzaro'),
(22, 'Franco', 'Callegati'),
(23, 'Stefano', 'Rizzi'),
(24, 'Silvia', 'Mirri'),
(25, 'Giovanni', 'Delnevo'),
(26, 'Allessandro', 'Hill'),
(27, 'Marco Antonio', 'Boschetti'),
(28, 'Matteo', 'Golfarelli'),
(29, 'Alessandra', 'Lumini'),
(30, 'Alessandro', 'Ricci'),
(31, 'Luisa', "Dall'Acqua"),
(32, 'Gianluca', 'Moro'),
(33, 'Catia', 'Prandi'),
(34, 'Ciro', 'Barbone'),
(35, 'Enrico', 'Fiumana');


-- Corsi --
INSERT INTO Corsi VALUES
('00013', 'Analisi Matematica', '', 12, FALSE),
('00819', 'Programmazione', '', 12, TRUE),
('58414', 'Algebra e Geometria', '', 6, FALSE),
('11929', 'Algoritmi e Strutture Dati', '', 12, FALSE),
('69731', 'Architetture degli Elaboratori', '', 12, FALSE),
('77776', 'Matematica Discreta e Probabilità', '', 6, FALSE),
('70219', 'Programmazione ad Oggetti', '', 12, TRUE),
('08574', 'Sistemi Operativi', '', 12, FALSE),
('10906', 'Basi di Dati', '', 12, TRUE),
('00405', 'Fisica', '', 6, FALSE),
('66736', 'Metodi Numerici', '', 6, FALSE),
('70226', 'Programmazione di Reti', '', 6, FALSE),
('09032', 'Ingegneria del Software', '', 6, FALSE),
('70218', 'Reti di Telecomunicazione', '', 6, FALSE),
('41731', 'Tecnologie Web', '', 6, TRUE),
('00884', 'Ricerca Operativa', '', 6, FALSE),
('70090', 'Computer Graphics', '', 6, TRUE),
('70227', 'Informatica e Diritto', '', 6, FALSE),
('77780', 'Sistemi Embedded e Internet-Of-Things', '', 6, TRUE),
('84339', 'Basi di Dati Avanzate', '', 6, FALSE),
('72796', 'Programmazione di Applicazioni Data Intensive', '', 6, TRUE),
('72787', 'Programmazione di Sistemi Mobile', '', 6, TRUE),
('17634', 'Visione Artificiale', '', 6, FALSE),
('72778', 'High-Performance Computing', '', 6, TRUE),
('14015', 'Crittografia', '', 6, FALSE),
('96642', 'Virtualizzazione e Integrazione di Sistemi', '', 6, FALSE);


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


-- Studenti --
INSERT INTO Studenti VALUES
('0001081674', 'Irene', 'Borri', 'irene.borri@studio.unibo.it', 'ireneprojweb', ''),
('0001081675', 'Mario', 'Rossi', 'mario.rossi@studio.unibo.it', 'rossiM_2k08!', ''),
('0001081676', 'Valentina', 'Marra', 'valentina.marra@studio.unibo.it', 'voqm290nja', ''),
('0001081677', 'Francesco', 'Rossi', 'francesco.rossi@studio.unibo.it', 'frw90nkd1n9', ''),
('0001081678', 'Luca', 'Russo', 'luca.russo@studio.unibo.it', 'lciqj0d1ns', ''),
('0001081679', 'Giulia', 'Ferraro', 'giulia.ferraro@studio.unibo.it', '1989GMts13', ''),
('0001081680', 'Marco', 'Bianchi', 'marco.bianchi@studio.unibo.it', 'mapdmq0921h', ''),
('0001081681', 'Federico', 'Galli', 'federico.galli@studio.unibo.it', 'apokm201b0', ''),
('0001081682', 'Annalisa', 'Fabbri', 'annalisa.fabbri@studio.unibo.it', 'halseu20cn', '');


-- Preferenze --
INSERT INTO Preferenze VALUES
('77780', '0001081674'),
('70090', '0001081674'),
('00405', '0001081674'),
('70226', '0001081675'),
('08574', '0001081675'),
('72778', '0001081675'),
('41731', '0001081675'),
('70218', '0001081675'),
('77780', '0001081677'),
('70219', '0001081677'),
('14015', '0001081677'),
('14015', '0001081678'),
('70227', '0001081678'),
('70227', '0001081679'),
('14015', '0001081679'), 
('69731', '0001081680'),
('70218', '0001081680'),
('72778', '0001081680'),
('17634', '0001081681'),
('70090', '0001081681'),
('70090', '0001081682'),
('72787', '0001081682'), 
('70219', '0001081682'), 
('41731', '0001081682'), 
('77780', '0001081682');


-- Gruppi --
INSERT INTO Gruppi (Nome, Descrizione, NumeroMembriRichiesti, NumeroMembriAttuali, Tipo, DataConsegnaProgetto, MatricolaCreatore, CodiceCorso) VALUES
('Progetto Web - Gruppi studenti', "Il gruppo si pone come obiettivo quello di realizzare per il progetto del corso di Tecnologie Web un sito 
che permette la gestione di gruppi studenteschi per lo studio e per i progetti.", 2, 0, 'Progetto', '2026-06-16', '0001081674', '41731'),
('Web - Cineforum', "Il gruppo vuole realizzare un sito web che permette l'organizzazione di cineforum tra studenti universitari, per l'elaborato di
Web", 4, 0, 'Progetto', '2026-09-10', '0001081675', '41731'),
('IoTLab', 'Gruppo per svolgere lab di IOT insieme.', 0, 0, 'Studio', '', '0001081677', '77780'),
('Computer Graphics - Lab insieme', "L'obiettivo è svolgere attività di laboratorio di Computer Graphics insieme, svolgendo non solo gli esercizi 
presentati a lezione, ma aggiungendo anche nuovi esercizi di approfondimento, che possono essere proposti da ogni membro. Il gruppo è indicato per chi 
è appassionato di CG :)", 0, 0, 'Studio', '', '0001081681', '70090');


-- Iscrizioni --
INSERT INTO Iscrizioni VALUES
(1, '0001081674'),
(2, '0001081675'),
(2, '0001081676'),
(3, '0001081677'),
(4, '0001081681'),
(4, '0001081682');

UPDATE Gruppi 
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=1;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+2
WHERE Codice=2;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=3;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+2
WHERE Codice=4;


-- Incontri --
INSERT INTO Incontri VALUES
(1, '2026-05-13', '10:30:00', 'Da remoto', '', 'Primo incontro per disctuere idee per il progetto.'),
(1, '2026-05-16', '10:30:00', 'Da remoto', '', 'Confronto sui mockup realizzati.'),
(1, '2026-05-20', '10:30:00', 'Da remoto', '', 'Presentazione DB + Suddivisione lavoro.'),
(1, '2026-05-23', '10:30:00', 'Da remoto', '', 'Decisione struttura delle cartelle + Presentazione pagine realizzate.'),
(1, '2026-05-27', '10:30:00', 'Da remoto', '', 'Presentazione pagine realizzate.'),
(1, '2026-05-29', '18:00:00', 'Da remoto', '', 'Ulteriore suddivisione pagine rimaste.'),
(1, '2026-06-03', '10:30:00', 'Da remoto', '', 'Presentazione pagine realizzate.'),
(1, '2026-06-06', '10:30:00', 'Da remoto', '', 'Presentazione pagine realizzate.'),
(1, '2026-06-10', '10:30:00', 'Da remoto', '', 'Ultimo confronto prima della consegna.'),
(2, '2026-06-10', '15:00:00', 'In presenza', 'Bar uni', 'Primo incontro per discutere sulla realizzazione del progetto.'),
(2, '2026-06-15', '15:00:00', 'Da remoto', '', 'Suddivisione lavoro.'),
(4, '2025-10-01', '17:30:00', 'Da remoto', '', 'Primo incontro per parlare delle attività che si potranno svolgere'),
(4, '2025-10-10', '15:00:00', 'In presenza', 'Lab 2.2', 'Primo lab');
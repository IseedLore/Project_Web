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
('0001081670', 'Alessia', 'Ricci', 'alessia.ricci@studio.unibo.it', 'x19xi1jqjc', ''),
('0001081671', 'Mirco', 'Ruggero', 'mirco.ruggero@studio.unibo.it', '109jx1j0y8', ''),
('0001081672', 'Marco', 'Evola', 'marco.evola@studio.unibo.it', 'alocpk209f', ''),
('0001081673', 'Martina', 'Rossi', 'martina.rossii@studio.unibo.it', 'lsvn19071y', ''),
('0001081674', 'Irene', 'Borri', 'irene.borri@studio.unibo.it', 'ireneprojweb', ''),
('0001081675', 'Mario', 'Rossi', 'mario.rossi@studio.unibo.it', 'rossiM_2k08!', ''),
('0001081676', 'Valentina', 'Marra', 'valentina.marra@studio.unibo.it', 'voqm290nja', ''),
('0001081677', 'Francesco', 'Rossi', 'francesco.rossi@studio.unibo.it', 'frw90nkd1n9', ''),
('0001081678', 'Luca', 'Russo', 'luca.russo@studio.unibo.it', 'lciqj0d1ns', ''),
('0001081679', 'Giulia', 'Ferraro', 'giulia.ferraro@studio.unibo.it', '1989GMts13', ''),
('0001081680', 'Marco', 'Bianchi', 'marco.bianchi@studio.unibo.it', 'mapdmq0921h', ''),
('0001081681', 'Federico', 'Galli', 'federico.galli@studio.unibo.it', 'apokm201b0', ''),
('0001081682', 'Annalisa', 'Fabbri', 'annalisa.fabbri@studio.unibo.it', 'halseu20cn', ''),
('0001081683', 'Emma', 'Balducci', 'emma.balducci@studio.unibo.it', 'emcar197jb', ''),
('0001081684', 'Tommaso', 'Dradi', 'tommaso.dradi@studio.unibo.it', 'smoo2180sf', ''), 
('0001081685', 'Paolo', 'Prioli', 'paolo.prioli@studio.unibo.it', 'so10sjdd82', ''), 
('0001081686', 'Federico', 'Protti', 'federico.protti@studio.unibo.it', '0123456789', ''), 
('0001081687', 'Elisa', 'Imola', 'elisa.imola@studio.unibo.it', '0123456789', ''),
('0001081688', 'Manuel', 'Barilari', 'manuel.barilari@studio.unbio.it', '0123456789', '');


-- Preferenze --
INSERT INTO Preferenze VALUES
('00013', '0001081670'),
('00819', '0001081670'),
('11929', '0001081671'),
('17634', '0001081672'),
('00013', '0001081673'),
('00819', '0001081673'),
('11929', '0001081673'),
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
('77780', '0001081682'),
('08574', '0001081685'),
('72778', '0001081685'),
('70090', '0001081688');


-- Gruppi --
INSERT INTO Gruppi (Nome, Descrizione, NumeroMembriRichiesti, NumeroMembriAttuali, Tipo, DataConsegnaProgetto, MatricolaCreatore, CodiceCorso) VALUES
('Progetto Web - Gruppi studenti', "Il gruppo si pone come obiettivo quello di realizzare per il progetto del corso di Tecnologie Web un sito 
che permette la gestione di gruppi studenteschi per lo studio e per i progetti.", 2, 0, 'Progetto', '2026-06-16', '0001081674', '41731'),
('Web - Cineforum', "Il gruppo vuole realizzare un sito web che permette l'organizzazione di cineforum tra studenti universitari, per l'elaborato di
Web", 4, 0, 'Progetto', '2026-09-10', '0001081675', '41731'),
('IoTLab', 'Gruppo per svolgere lab di IOT insieme.', 0, 0, 'Studio', '', '0001081677', '77780'),
('Computer Graphics - Lab insieme', "L'obiettivo è svolgere attività di laboratorio di Computer Graphics insieme, svolgendo non solo gli esercizi 
presentati a lezione, ma aggiungendo anche nuovi esercizi di approfondimento, che possono essere proposti da ogni membro. Il gruppo è indicato per chi 
è appassionato di CG :)", 0, 0, 'Studio', '', '0001081681', '70090'),
('Analisi per esame', "Studio insieme per prepararsi allo scritto.", 0, 0, 'Studio', '', '0001081670', '00013'),
('FISICA - Esercizi', "Gruppo per fare esercizi di fisica", 0, 0, 'Studio', '', '0001081683', '00405'),
('FISICA - Teoria', "Gruppo per studiare la teoria di fisica", 0, 0, 'Studio', '', '0001081682', '00405'), 
('C', "Gruppo per esercitarsi con il C per il corso di Programmazione", 0, 0, 'Studio', '', '0001081684', '00819'),
('Java', "Gruppo per esercitarsi con Java per esame pratico in lab di OOP", 0, 0, 'Studio', '', '0001081684', '70219'), 
('Ricerca Operativa - Approfondimenti', "Gruppo per approfondire gli argomenti trattati a Ricerca Operativa", 0, 0, 'Studio', '', '0001081680', '00884'),
('Gruppo Programmazione (I)', "Progetti parziali", 3, 0, 'Progetto', '', '0001081671', '00819'),
('Linux', "Per gli appassionati di sistemi operativi e in particolare di Linux :)", 0, 0, 'Studio', '', '0001081685', '08574'), 
('HPC', "Per studiare insieme HPC", 0, 0, 'Studio', '', '0001081685', '72778'),
('Ing SW', "UML per esame di Ingegneria del SW", 0, 0, 'Studio', '', '0001081686', '09032'),
('DB : ER', "Per svolgere insieme esercizi su schemi ER", 20, 0, 'Studio', '', '0001081686', '10906'),
('Algoritmi', "Esercizi", 0, 0, 'Studio', '', '0001081671', '11929'), 
('ZKP', "Gruppo per approfondire la ZKP", 0, 0, 'Studio', '', '0001081674', '14015'),
('Visione Artificiale - Lab +', "Laboratori aggiuntivi", 0, 0, 'Studio', '', '0001081679', '17634'),
('Web - JS', "Laboratori di JavaScript", 0, 0, 'Studio', '', '0001081675', '41731'),
('Algebra', "Preparazione all'esame insieme", 0, 0, 'Studio', '', '0001081687', '58414'),
('Metodi numerici', "Esercizi per comprendere meglio gli argomenti trattati nel corso", 0, 0, 'Studio', '', '0001081687', '66736'),
('MDP - Probabilità', "Focus group sulla parte relativa alla probabilità di MDP", 0, 0, 'Studio', '', '0001081687', '77776'),
('Assembly', "Focus group su Assembly", 0, 0, 'Studio', '', '0001081684', '69731'),
('Blender', "Per chi ama Blender :)", 0, 0, 'Studio', '', '0001081688', '70090'),
('Reti 1', "Gruppo studio per Reti 1", 0, 0, 'Studio', '', '0001081685', '70226'),
('Reti 2', "Gruppo studio per Reti 2", 0, 0, 'Studio', '', '0001081685', '70218'),
('OOP - Scotland Yard', "Progetto OOP : gioco da tavolo Scotland Yard", 3, 0, 'Progetto', '2026-09-14', '0001081674', '70219'),
('Diritto', '', 0, 0, 'Studio', '', '0001081678', '70227'),
('Mobile studio', "Studio per Programmazione di Sistemi Mobile", 0, 0, 'Studio', '', '0001081675', '72787'),
('Mobile proj', "Progetto per Programmazione di Sistemi Mobile", 4, 0, 'Progetto', '2026-09-10', '0001081675', '72787'),
('Data Intensive', "Studio", 0, 0, 'Studio', '', '0001081686', '72796'),
('Progetto Data Intensive', "Progetto con 6 persone", 6, 0, 'Progetto', '', '0001081686', '72796'),
('DB avanzato', "Per studiare e svolgere es.", 0, 0, 'Studio', '', '0001081686', '84339'),
('VM', "Per appassionati di Virtual Machines", 0, 0, 'Studio', '', '0001081685', '96642');




-- Iscrizioni --
INSERT INTO Iscrizioni VALUES
(1, '0001081674'),
(2, '0001081675'),
(2, '0001081676'),
(3, '0001081677'),
(4, '0001081681'),
(4, '0001081682'),
(5, '0001081671'),
(5, '0001081670'),
(5, '0001081678'),
(6, '0001081683'),
(6, '0001081682'),
(7, '0001081682'),
(8, '0001081684'),
(9, '0001081684'), 
(10, '0001081680'),
(11, '0001081671'),
(12, '0001081685'),
(13, '0001081685'), 
(14, '0001081686'),
(15, '0001081686'),
(16, '0001081671'), 
(17, '0001081674'),
(17, '0001081685'),
(17, '0001081680'),
(17, '0001081684'),
(17, '0001081673'),
(18, '0001081679'),
(19, '0001081675'),
(20, '0001081687'),
(20, '0001081682'),
(21, '0001081687'),
(22, '0001081687'),
(23, '0001081684'),
(24, '0001081688'),
(25, '0001081685'),
(26, '0001081685'), 
(27, '0001081674'),
(28, '0001081678'),
(29, '0001081675'),
(30, '0001081675'),
(30, '0001081682'),
(31, '0001081686'),
(32, '0001081686'),
(33, '0001081686'),
(34, '0001081685'),
(34, '0001081683');

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
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+3
WHERE Codice=5;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+3
WHERE Codice=6;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+3
WHERE Codice=7;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=8;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=9; 
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=10;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=11;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=12;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=13;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=14;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=15;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=16;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+5
WHERE Codice=17;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=18;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=19;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+2
WHERE Codice=20;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=21;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=22;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=23;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=24;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=25;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=26;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=27;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=28;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=29;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+2
WHERE Codice=30;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=31;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=32;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+1
WHERE Codice=33;
UPDATE Gruppi
SET NumeroMembriAttuali=NumeroMembriAttuali+2
WHERE Codice=34;


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
(4, '2025-10-10', '15:00:00', 'In presenza', 'Lab 2.2', 'Primo lab'),
(8, '2026-10-03', '16:30:00', 'In presenza', 'Lab 2.2', 'Primo lab'),
(9, '2026-10-12', '17:00:00', 'In presenza', 'Lab 2.2', 'Primo lab'),
(9, '2026-10-19', '17:00:00', 'In presenza', 'Lab 2.2', 'Secondo lab'),
(9, '2026-10-26', '17:00:00', 'In presenza', 'Lab 2.2', 'Terzo lab'),
(10, '2026-09-30', '18:45:00', 'Da remoto', '', 'Primo incontro per discutere su come lavorare'),
(17, '2026-07-01', '09:30:00', 'Da remoto', '', 'Intro'),
(27, '2026-07-04', '19:00:00', 'Da remoto', '', 'Definizione task'),
(27, '2026-07-08', '18:20:00', 'Da remoto', '', 'Suddivisione lavoro');



-- Amministratori --
INSERT INTO Amministratori (Username, Password) VALUES
("IreneBorri", "adminWeb2026");
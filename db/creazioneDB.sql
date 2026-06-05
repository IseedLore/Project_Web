-- Creazione DataBase --

DROP DATABASE IF EXISTS Gruppi_Studenti;

CREATE DATABASE IF NOT EXISTS Gruppi_Studenti;

USE Gruppi_Studenti;



-- Creazione Tabelle --

CREATE TABLE Studenti(
	Matricola VARCHAR(10) PRIMARY KEY,
    Nome VARCHAR(50) NOT NULL,
    Cognome VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Password VARCHAR(20) NOT NULL CHECK(length(Password)>=10),
    Immagine VARCHAR(100),
    CHECK(length(Matricola)=10)
);

CREATE TABLE Corsi(
	Codice VARCHAR(5) PRIMARY KEY,
    Nome VARCHAR(150) NOT NULL,
    Descrizione MEDIUMTEXT,
    CFU INT NOT NULL,
    ProgettoRichiesto BOOL NOT NULL,
    CHECK(length(Codice)=5)
);

CREATE TABLE Docenti(
	Codice INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(50) NOT NULL,
    Cognome VARCHAR(50) NOT NULL
);

CREATE TABLE Gruppi(
	Codice INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100) NOT NULL,
    Descrizione MEDIUMTEXT,
    NumeroMembriRichiesti INT,
    NumeroMembriAttuali INT NOT NULL,
    Tipo VARCHAR(10) NOT NULL CHECK (Tipo IN ('Studio', 'Progetto')),
    DataConsegnaProgetto DATE,
    MatricolaCreatore VARCHAR(10) NOT NULL,
    CodiceCorso VARCHAR(5) NOT NULL,
	FOREIGN KEY (MatricolaCreatore) REFERENCES Studenti(Matricola)
		ON DELETE CASCADE
        ON UPDATE NO ACTION,
	FOREIGN KEY (CodiceCorso) REFERENCES Corsi(Codice)
		ON DELETE CASCADE
        ON UPDATE NO ACTION,
    CHECK(NumeroMembriAttuali<=NumeroMembriRichiesti OR NumeroMembriRichiesti=0)
);

CREATE TABLE Incontri(
	CodiceGruppo INT NOT NULL,
    Data DATE,
    Orario TIME,
    Modalità VARCHAR(15) NOT NULL CHECK (Modalità IN ('Da remoto', 'In presenza')),
    Luogo VARCHAR(100),
    Note VARCHAR(500) NOT NULL,
    FOREIGN KEY (CodiceGruppo) REFERENCES Gruppi(Codice)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
    PRIMARY KEY (CodiceGruppo, Data, Orario)
);

CREATE TABLE Iscrizioni(
	CodiceGruppo INT NOT NULL,
    MatricolaStudente VARCHAR(10) NOT NULL,
    FOREIGN KEY (CodiceGruppo) REFERENCES Gruppi(Codice)
		ON DELETE CASCADE
        ON UPDATE NO ACTION,
	FOREIGN KEY (MatricolaStudente) REFERENCES Studenti(Matricola)
		ON DELETE CASCADE
        ON UPDATE NO ACTION,
	PRIMARY KEY (CodiceGruppo, MatricolaStudente)
);

CREATE TABLE Preferenze(
	CodiceCorso VARCHAR(5) NOT NULL,
    MatricolaStudente VARCHAR(10) NOT NULL,
    FOREIGN KEY (CodiceCorso) REFERENCES Corsi(Codice)
		ON DELETE CASCADE
        ON UPDATE NO ACTION,
	FOREIGN KEY (MatricolaStudente) REFERENCES Studenti(Matricola)
		ON DELETE CASCADE
        ON UPDATE NO ACTION,
	PRIMARY KEY (CodiceCorso, MatricolaStudente)
);

CREATE TABLE Insegnamenti(
	CodiceDocente INT NOT NULL,
	CodiceCorso VARCHAR(5) NOT NULL,
    Classe VARCHAR(1),
    FOREIGN KEY (CodiceDocente) REFERENCES Docenti(Codice)
		ON DELETE CASCADE
        ON UPDATE NO ACTION,
    FOREIGN KEY (CodiceCorso) REFERENCES Corsi(Codice)
		ON DELETE CASCADE
        ON UPDATE NO ACTION,
	PRIMARY KEY (CodiceDocente, CodiceCorso)
);
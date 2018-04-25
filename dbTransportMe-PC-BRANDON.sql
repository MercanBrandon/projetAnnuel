#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Course
#------------------------------------------------------------

CREATE TABLE Course(
        idCourse             int (11) Auto_increment  NOT NULL ,
        dateCourse           Date ,
        id_chauffeur         Int NOT NULL ,
        id_personne          Int NOT NULL ,
        id_personne_Personne Int NOT NULL ,
        id_adresse           Int NOT NULL ,
        id_adresse_Adresse   Int NOT NULL ,
        PRIMARY KEY (idCourse )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Chauffeur
#------------------------------------------------------------

CREATE TABLE Chauffeur(
        id_chauffeur  int (11) Auto_increment  NOT NULL ,
        date_embauche Char (25) ,
        date_permis   Date ,
        id_personne   Int NOT NULL ,
        PRIMARY KEY (id_chauffeur ,id_personne )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Personne
#------------------------------------------------------------

CREATE TABLE Personne(
        id_personne     int (11) Auto_increment  NOT NULL ,
        nom_personne    Char (25) ,
        prenom_personne Char (25) ,
        date_naissance  Date ,
        tel_personne    Char (25) ,
        email_personne  Char (100) ,
        PRIMARY KEY (id_personne ) ,
        INDEX (email_personne )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Client
#------------------------------------------------------------

CREATE TABLE Client(
        id_personne Int NOT NULL ,
        PRIMARY KEY (id_personne )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Vehicule
#------------------------------------------------------------

CREATE TABLE Vehicule(
        id_vehicule     int (11) Auto_increment  NOT NULL ,
        immatriculation Char (25) ,
        marque          Char (25) ,
        modele          Char (25) ,
        PRIMARY KEY (id_vehicule )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Adresse
#------------------------------------------------------------

CREATE TABLE Adresse(
        id_adresse     int (11) Auto_increment  NOT NULL ,
        lib_adresse    Char (50) ,
        ligne1_adresse Char (25) ,
        ligne2_adresse Char (25) ,
        CP_adresse     Int ,
        lib_ville      Char (50) ,
        PRIMARY KEY (id_adresse )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: attribuer
#------------------------------------------------------------

CREATE TABLE attribuer(
        debut_attribution Date ,
        fin_attribution   Date ,
        id_vehicule       Int NOT NULL ,
        id_chauffeur      Int NOT NULL ,
        id_personne       Int NOT NULL ,
        PRIMARY KEY (id_vehicule ,id_chauffeur ,id_personne )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: être facturer
#------------------------------------------------------------

CREATE TABLE etre_facturer(
        id_adresse  Int NOT NULL ,
        id_personne Int NOT NULL ,
        PRIMARY KEY (id_adresse ,id_personne )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: habiter
#------------------------------------------------------------

CREATE TABLE habiter(
        id_adresse  Int NOT NULL ,
        id_personne Int NOT NULL ,
        PRIMARY KEY (id_adresse ,id_personne )
)ENGINE=InnoDB;

ALTER TABLE Course ADD CONSTRAINT FK_Course_id_chauffeur FOREIGN KEY (id_chauffeur) REFERENCES Chauffeur(id_chauffeur);
ALTER TABLE Course ADD CONSTRAINT FK_Course_id_personne FOREIGN KEY (id_personne) REFERENCES Personne(id_personne);
ALTER TABLE Course ADD CONSTRAINT FK_Course_id_personne_Personne FOREIGN KEY (id_personne_Personne) REFERENCES Personne(id_personne);
ALTER TABLE Course ADD CONSTRAINT FK_Course_id_adresse FOREIGN KEY (id_adresse) REFERENCES Adresse(id_adresse);
ALTER TABLE Course ADD CONSTRAINT FK_Course_id_adresse_Adresse FOREIGN KEY (id_adresse_Adresse) REFERENCES Adresse(id_adresse);
ALTER TABLE Chauffeur ADD CONSTRAINT FK_Chauffeur_id_personne FOREIGN KEY (id_personne) REFERENCES Personne(id_personne);
ALTER TABLE Client ADD CONSTRAINT FK_Client_id_personne FOREIGN KEY (id_personne) REFERENCES Personne(id_personne);
ALTER TABLE attribuer ADD CONSTRAINT FK_attribuer_id_vehicule FOREIGN KEY (id_vehicule) REFERENCES Vehicule(id_vehicule);
ALTER TABLE attribuer ADD CONSTRAINT FK_attribuer_id_chauffeur FOREIGN KEY (id_chauffeur) REFERENCES Chauffeur(id_chauffeur);
ALTER TABLE attribuer ADD CONSTRAINT FK_attribuer_id_personne FOREIGN KEY (id_personne) REFERENCES Personne(id_personne);
ALTER TABLE etre_facturer ADD CONSTRAINT FK_etre_facturer_id_adresse FOREIGN KEY (id_adresse) REFERENCES Adresse(id_adresse);
ALTER TABLE etre_facturer ADD CONSTRAINT FK_etre_facturer_id_personne FOREIGN KEY (id_personne) REFERENCES Personne(id_personne);
ALTER TABLE habiter ADD CONSTRAINT FK_habiter_id_adresse FOREIGN KEY (id_adresse) REFERENCES Adresse(id_adresse);
ALTER TABLE habiter ADD CONSTRAINT FK_habiter_id_personne FOREIGN KEY (id_personne) REFERENCES Personne(id_personne);

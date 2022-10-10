create table support_devoir(
    iddev int not null auto_increment PRIMARY KEY,
    NSS int(11) not null,
    CodeSection varchar(256) not null,
    deadline varchar(50) ,
    Nom varchar(256) not null,
    CONSTRAINT FK_Support_Devoir_Enseignant FOREIGN KEY(NSS)  REFERENCES Enseignant(NSS),
    CONSTRAINT FK_Support_Devoir_section FOREIGN KEY(CodeSection)  REFERENCES section(CodeSection)
); (iddev*,Matricule*)
create table reponse_devoir(
    iddev int not null,
    Matricule varchar(18) not null,
    nom varchar(256) not null,
    CONSTRAINT PK_repense_devoir PRIMARY KEY(Matricule,iddev)
);
create table Etudiant(
    Matricule int(18) not null PRIMARY KEY,
    Nom varchar(120) not null,
    Prenom varchar(120) not null,
    Email varchar(120) not null,
    CodeSection varchar(10) not null ,
    Username varchar(256) not null,
    Password varchar(256) not null,
    img_status int(1) not null,
    CONSTRAINT FK_Etudiant_Section FOREIGN KEY(CodeSection) REFERENCES Section(CodeSection  ) on delete CASCADE
 
);
create table section(
    CodeSection varchar(50) not null PRIMARY KEY,
    Specialite  varchar(256) not null,
    NiveauSec varchar(5) not null
);
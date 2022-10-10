create table administrateur(
NSS varchar(12) not null PRIMARY KEY,
Nom varchar(20) not null,
prenom varchar(20) not null,
numtel varchar(25),
email varchar(125) not null,
Username varchar(20) not null,
Password varchar(256)
);
create table commentaire(
id_cm int(11) auto_increment PRIMARY key,
commentaire varchar(256) not null,
id_user varchar(12) not null,
type varchar(50) not null,
id_file int(11) not null,
Date varchar(50) not null
);
create table enseignant(
    NSS varchar(12) not null PRIMARY KEY ,
    Nom varchar(120) not null,
    Prenom varchar(120) not null,
    grade varchar(120) not null,
    NumTel int(25) not null,
    Username varchar(256) not null,
    Password varchar(256) not null,
    img_status int(1) not null,
    email varchar(120) not null
    CONSTRAINT FK_Enseignant_Section FOREIGN KEY(CodeSection,CodeSP,Niveau_specialité) REFERENCES Section(CodeSection,CodeSP,Niveau_specialité) on delete CASCADE
 
);
create table etudiant(
    matricule varchar(12) not null PRIMARY KEY,
    nom varchar(120) not null,
    prenom varchar(120) not null,
    email varchar(120) not null,
    Codesection varchar(10) not null ,
    Username varchar(256) not null,
    Password varchar(256) not null,
    img_status int(1) not null,
    status_online int(1) not null,
    Gp int(1) not null,
	CONSTRAINT fk_Etudiant_Section FOREIGN KEY(Codesection,Gp)  REFERENCES section(CodeSection,Gp) on DELETE CASCADE

);


CREATE  TABLE gestion(
    Codesection varchar(120) not null,
    NSS varchar(12) not null,
    Gp int(1)  null,
    type varchar(120) not null,
    Codemodule varchar(120) not null,
    CONSTRAINT pk_gestion PRIMARY KEY(Codesection,NSS,Gp,type,Codemodule),
    CONSTRAINT FK_gestion_module FOREIGN KEY(Codemodule) REFERENCES module(Codemodule),
    CONSTRAINT FK_gestion_enseignant FOREIGN KEY(NSS) REFERENCES enseignant(NSS),
    CONSTRAINT FK_gestion_section FOREIGN KEY(Codesection) REFERENCES section(Codesection)
);
 create table module(
    Codemodule varchar(120) not null PRIMARY KEY,
    titre varchchar(120) not null,
    coeficient int(12)not null,
    unite  int(12)not null,
 );
 create table publication(
    id int(11) not null auto_increment PRIMARY key,           
    NSS int(12) not null,
    titre varchar(50) not null,
    contenu text not null,
    bg_status int(1),
    file_status int(1),
    nom_file  varchar(256) ,
    CONSTRAINT PK_Publication PRIMARY KEY(id,NSS),
    CONSTRAINT PK_Publication    FOREIGN KEY(NSS) REFERENCES administrateur(NSS)
);
create table reponse_devoir(
    iddev int not null,
    matricule varchar(12) not null,
    nom_file varchar(256) not null,
    CONSTRAINT PK_repense_devoir PRIMARY KEY(matricule,iddev),
    CONSTRAINT fk_reponse_dev_etd FOREIGN KEY(matricule) REFERENCES etudiant(matricule)
);
create table section(
    Codesection varchar(50) not null,
    Gp int(1),
    CONSTRAINT pk_section PRIMARY KEY(Codesection,Gp)
);
create table support_cour(
    idcours int not null auto_increment PRIMARY KEY,
    NSS varchar(12) not null,
    Codesection varchar(256) not null,
    date varchar(50) ,
    nom varchar(120) not null,
    nom_file varchar(256) not null,
    CONSTRAINT FK_Support_Devoir_Enseignant FOREIGN KEY(NSS)  REFERENCES enseignant(NSS),
    CONSTRAINT FK_Support_Devoir_section FOREIGN KEY(Codesection)  REFERENCES section(Codesection) on update and delete cascade
);
create table support_devoir(
    iddev int not null auto_increment PRIMARY KEY,
    NSS varchar(12) not null,
    Codesection varchar(256) not null,
    deadline varchar(50) ,
    nom varchar(120) not null,
    nom_file varchar(256) not null,
    CONSTRAINT FK_dev_Enseignant FOREIGN KEY(NSS)  REFERENCES enseignant(NSS),
    CONSTRAINT FK_dev_section FOREIGN KEY(Codesection)  REFERENCES section(Codesection) on update and delete cascade
);
create table support_td_tp(
    idtd_tp int not null auto_increment PRIMARY KEY,
    NSS varchar(12) not null,
    Codesection varchar(256) not null,
    date varchar(50) ,
    Gp int(1) not null,
    nom varchar(120) not null,
    nom_file varchar(256) not null,
    CONSTRAINT pk_support_td_tp PRIMARY KEY(idtd_tp,NSS,Codesection,Gp),
    CONSTRAINT FK_dev_Enseignant FOREIGN KEY(NSS)  REFERENCES enseignant(NSS),
    CONSTRAINT FK_dev_section FOREIGN KEY(Codesection,GP)  REFERENCES section(Codesection,Gp) on update and delete cascade
);
create table historique(
    NSS varchar(12) PRIMARY KEY,
    cpt int not null,
    date varchar(50),
    CONSTRAINT pk_historique PRIMARY KEY(NSS,date),
    constraint fk_historique_enseignant FOREIGN KEY(NSS) REFERENCES enseignant(NSS);
);
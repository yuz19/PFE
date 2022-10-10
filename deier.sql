create table Specialite(
    CodeSP varchar(20) not null PRIMARY KEY,
    Niveau_specialité int(2)  not null
);
create table Section(
    CodeSection varchar(10) not null PRIMARY KEY,
    CodeSP  varchar(20) not null,
    CONSTRAINT FK_Section_Specialite FOREIGN KEY(CodeSP) REFERENCES Specialite(CodeSP) on delete cascade;
);
create table Enseignant(
    NSS int(12) not null PRIMARY KEY ,
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
create table Administrateur(
    NSS int(12) not null PRIMARY KEY ,
    Nom varchar(120) not null,
    Prenom varchar(120) not null,
    Email varchar(120) not null,
    NumTel int(25) not null,
    Username varchar(256) not null,
    Password varchar(256) not null
);
create table Etudiant(
    Matricule int(18) not null PRIMARY KEY,
    Nom varchar(120) not null,
    Prenom varchar(120) not null,
    Email varchar(120) not null,
    CodeSection varchar(10) not null ,
    Username varchar(256) not null,
    Password varchar(256) not null,
	CONSTRAINT Fk_Etudiant_Section FOREIGN KEY(CodeSection)  REFERENCES Section(CodeSection) on DELETE CASCADE

);
create table publication(
                
    NSS int(12) not null,
    titre varchar(50) not null,
    contenu text not null,
    bg_status int(1),
    CONSTRAINT PK_Publication PRIMARY KEY(id,NSS),
    CONSTRAINT PK_Publication    FOREIGN KEY(NSS) REFERENCES Administrateur(NSS)
);
create table umail(
    user_from(12) not null,
    Nuser_to  int(12) not null,
    titre varchar(50) not null,
    text text not null,
    file_status int(1),
    name_file varchar(256)
);
create table   SeanceEnligne(
  NSS int(12) not null PRIMARY KEY ,
  CodeSection varchar(10) not null PRIMARY KEY,
  CodeSP varchar(10) not null PRIMARY KEY,
  Niveau_specialite varchar(10) not null PRIMARY KEY,
  lien varchar(256) not null PRIMARY KEY,
  num_room varchar(256) not null ,
   CONSTRAINT FK_SeanceEnligne_Section  FOREIGN KEY(CodeSection) REFERENCES Section(CodeSection),
   CONSTRAINT  FK_SeanceEnligne_Enseignant FOREIGN KEY(NSS) REFERENCES Enseignant(NSS)
);  
create table  liste_noire(
    CodeList varchar(30) not null PRIMARY KEY,
    CodeModule varchar(40) not null PRIMARY KEY,
    NSS int(12) not null PRIMARY KEY ,
    Matricule int(18) not null PRIMARY KEY,
    Cause text not null,
    CONSTRAINT FK_liste_noire_Module FOREIGN KEY(CodeModule) REFERENCES Module(CodeModule),
    CONSTRAINT FK_liste_noire_Enseignant FOREIGN KEY(NSS) REFERENCES Enseignant(NSS),
    CONSTRAINT FK_liste_noire_Etudiant FOREIGN KEY(NSS) REFERENCES Etudiant(Matricule),
);
create table Devoir(
    CodeDevoir int() not null auto_increment PRIMARY KEY,
    CodeModule  varchar(40) not null,
    DateDebut Date not null,
    DateFin Date,
    NSS int(12) not null FOREIGN KEY REFERENCES Enseignant(NSS) 
);
 
 create table Module(
    CodeModule varchar(40) not null PRIMARY KEY,
    titre varchchar(50) not null,
    coeficient int(2)not null,
    unite  varchar(50)not null,
    CodeSP varchar(20) not null FOREIGN KEY REFERENCES Specialite(CodeSP)
 );
create table ReponseDevoir(
 
    Matricule varchar(40) not null ,
    Codedevoir varchar(256) not null PRIMARY KEY,
    CONSTRAINT FK_ReponseDevoir_Devoir FOREIGN KEY(CodeModule) REFERENCES Module(CodeModule),
    CONSTRAINT FK_ReponseDevoir_Etudiant FOREIGN KEY(NSS) REFERENCES Enseignant(NSS)
);
 
create table Cours(
    id int() not null auto_increment  PRIMARY KEY,
    NSS int(12) not null,
    CodeModule ,
    CodeSection ,
    CONSTRAINT FK_Cours_Enseignant FOREIGN KEY(NSS) REFERENCES Enseignant(NSS),
    CONSTRAINT FK_Cours_Module FOREIGN KEY(CodeModule) REFERENCES Module(CodeModule),
    CONSTRAINT FK_Cours_Section FOREIGN KEY(CodeSection) REFERENCES Section(CodeSection)
);

CREATE  TABLE gestion(
	Codesection varchar(120) not null,
   	NSS varchar(12) not null,
    Gp int(1) not null,
    type varchar(120) not null,
    Codemodule varchar(120) not null,
    CONSTRAINT FK_gestion_module FOREIGN KEY(Codemodule) REFERENCES module(Codemodule),
     CONSTRAINT FK_gestion_enseignant FOREIGN KEY(NSS) REFERENCES enseignant(NSS),
     CONSTRAINT FK_gestion_section FOREIGN KEY(Codesection,Gp) REFERENCES section(Codesection,Gp)
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
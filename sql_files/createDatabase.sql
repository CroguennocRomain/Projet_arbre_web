------------------------------------------------------------
--        Script Postgre 
------------------------------------------------------------

DROP TABLE IF EXISTS user CASCADE;
DROP TABLE IF EXISTS clc_secteur CASCADE;
DROP TABLE IF EXISTS fk_stadedev CASCADE;
DROP TABLE IF EXISTS fk_port CASCADE;
DROP TABLE IF EXISTS fk_revetement CASCADE;
DROP TABLE IF EXISTS fk_nomtech CASCADE;
DROP TABLE IF EXISTS feuillage CASCADE;
DROP TABLE IF EXISTS arbre CASCADE;

------------------------------------------------------------
-- Table: user
------------------------------------------------------------
CREATE TABLE public.user(
	id         SERIAL NOT NULL ,
	username   VARCHAR (20) NOT NULL ,
	password   VARCHAR (20) NOT NULL  ,
	CONSTRAINT user_PK PRIMARY KEY (id)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: clc_secteur
------------------------------------------------------------
CREATE TABLE public.clc_secteur(
	id_secteur   SERIAL NOT NULL ,
	secteur      VARCHAR (100) NOT NULL  ,
	CONSTRAINT clc_secteur_PK PRIMARY KEY (id_secteur)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: fk_stadedev
------------------------------------------------------------
CREATE TABLE public.fk_stadedev(
	id_stadedev   SERIAL NOT NULL ,
	stadedev      VARCHAR (20) NOT NULL  ,
	CONSTRAINT fk_stadedev_PK PRIMARY KEY (id_stadedev)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: fk_port
------------------------------------------------------------
CREATE TABLE public.fk_port(
	id_port   SERIAL NOT NULL ,
	port      VARCHAR (50) NOT NULL  ,
	CONSTRAINT fk_port_PK PRIMARY KEY (id_port)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: fk_revetement
------------------------------------------------------------
CREATE TABLE public.fk_revetement(
	id_revetement   SERIAL NOT NULL ,
	revetement      VARCHAR (10) NOT NULL  ,
	CONSTRAINT fk_revetement_PK PRIMARY KEY (id_revetement)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: fk_nomtech
------------------------------------------------------------
CREATE TABLE public.fk_nomtech(
	id_nomtech   SERIAL NOT NULL ,
	nomtech      VARCHAR (30) NOT NULL  ,
	CONSTRAINT fk_nomtech_PK PRIMARY KEY (id_nomtech)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: feuillage
------------------------------------------------------------
CREATE TABLE public.feuillage(
	id_feuillage   SERIAL NOT NULL ,
	feuillage      VARCHAR (20) NOT NULL  ,
	CONSTRAINT feuillage_PK PRIMARY KEY (id_feuillage)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: arbre
------------------------------------------------------------
CREATE TABLE public.arbre(
	id              SERIAL NOT NULL ,
	longitude       FLOAT  NOT NULL ,
	latitude        FLOAT  NOT NULL ,
	haut_tot        FLOAT  NOT NULL ,
	haut_tronc      FLOAT  NOT NULL ,
	tronc_diam      FLOAT  NOT NULL ,
	id_user         INT  NOT NULL ,
	id_secteur      INT  NOT NULL ,
	id_stadedev     INT  NOT NULL ,
	id_port         INT  NOT NULL ,
	id_revetement   INT  NOT NULL ,
	id_nomtech      INT  NOT NULL ,
	id_feuillage    INT  NOT NULL  ,
	CONSTRAINT arbre_PK PRIMARY KEY (id)

	,CONSTRAINT arbre_user_FK FOREIGN KEY (id_user) REFERENCES public.user(id) ON DELETE CASCADE
	,CONSTRAINT arbre_clc_secteur0_FK FOREIGN KEY (id_secteur) REFERENCES public.clc_secteur(id_secteur) ON DELETE CASCADE
	,CONSTRAINT arbre_fk_stadedev1_FK FOREIGN KEY (id_stadedev) REFERENCES public.fk_stadedev(id_stadedev) ON DELETE CASCADE
	,CONSTRAINT arbre_fk_port2_FK FOREIGN KEY (id_port) REFERENCES public.fk_port(id_port) ON DELETE CASCADE
	,CONSTRAINT arbre_fk_revetement3_FK FOREIGN KEY (id_revetement) REFERENCES public.fk_revetement(id_revetement) ON DELETE CASCADE
	,CONSTRAINT arbre_fk_nomtech4_FK FOREIGN KEY (id_nomtech) REFERENCES public.fk_nomtech(id_nomtech) ON DELETE CASCADE
	,CONSTRAINT arbre_feuillage5_FK FOREIGN KEY (id_feuillage) REFERENCES public.feuillage(id_feuillage) ON DELETE CASCADE
)WITHOUT OIDS;




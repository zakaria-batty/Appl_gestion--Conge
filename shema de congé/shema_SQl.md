## CREATE A DATABASE

  * create thé tables

```sql

CREATE TABLE `auth`
(
 `id`       integer NOT NULL AUTO_INCREMENT ,
 `email`    varchar(45) NOT NULL ,
 `password` varchar(45) NOT NULL ,

PRIMARY KEY (`id`)
);

```
```sql

CREATE TABLE `service`
(
 `id`      integer NOT NULL AUTO_INCREMENT ,
 `libelle` varchar(200) NOT NULL ,

PRIMARY KEY (`id`)
);

```
```sql

CREATE TABLE `employe`
(
 `id`                integer NOT NULL AUTO_INCREMENT ,
 `nom`               varchar(45) NOT NULL ,
 `prenom`            varchar(45) NOT NULL ,
 `CIN`               varchar(45) NOT NULL ,
 `Tel`               integer NOT NULL ,
 `email`             varchar(45) NOT NULL ,
 `grade`             varchar(45) NOT NULL ,
 `salaire`           float NOT NULL ,
 `date-embauche`     date NOT NULL ,
 `sexe`              char NOT NULL ,
 `id_auth`           integer NOT NULL ,
 `id_service`        integer NOT NULL ,
 `matricule`         integer NOT NULL ,
 `date-de-naissance` date NOT NULL ,

PRIMARY KEY (`id`),
KEY `fkIdx_35` (`id_auth`),
CONSTRAINT `FK_35` FOREIGN KEY `fkIdx_35` (`id_auth`) REFERENCES `auth` (`id`),
KEY `fkIdx_43` (`id_service`),
CONSTRAINT `FK_43` FOREIGN KEY `fkIdx_43` (`id_service`) REFERENCES `service` (`id`)
);

```

```sql

CREATE TABLE `demande_conge`
(
 `id`            NOT NULL ,
 `date-début`   date NOT NULL ,
 `date-fin`     date NOT NULL ,
 `number-jours` int NOT NULL ,
 `id_employe`   integer NOT NULL ,
 `type-conge`    NOT NULL ,
 `statut`       varchar(45) NOT NULL ,

PRIMARY KEY (`id`),
KEY `fkIdx_53` (`id_employe`),
CONSTRAINT `FK_53` FOREIGN KEY `fkIdx_53` (`id_employe`) REFERENCES `employe` (`id`)
);

```

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
CONSTRAINT `auth_1` FOREIGN KEY (`id_auth`) REFERENCES `auth` (`id`),
CONSTRAINT `service_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`)
)ENGINE = INNER;

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
CONSTRAINT `conge_1` FOREIGN KEY  (`id_employe`) REFERENCES `employe` (`id`)
)ENGINE = INNER;

```
## INSERT VALUE

```sql
INSERT INTO auth ( email, password)
   VALUES ('zakaria@gmail.com','zakara123'),
    ('amine@gmail.com','amine123'),
    ('ayoub@gmail.com','ayoub123'),	   
    ('dounia@gmail.com','dounia123'),
    ('akram@gmail.com','akram123');
```
| id | email             | password  |
|:--:|:------------------|:----------|
|  1 | zakaria@gmail.com | zakara123 |
|  2 | amine@gmail.com   | amine123  |
|  3 | ayoub@gmail.com   | ayoub123  |
|  4 | dounia@gmail.com  | dounia123 |
|  5 | akram@gmail.com   | akram123  |

```sql

INSERT INTO service ( libelle)
   VALUES ('resumé'),
    ('resumé'),
    ('resumé'),	   
    ('resumé'),
    ('resumé');
```
```sql
INSERT INTO employe (nom,prenom,CIN,Tel,email,grade,salaire,date_embauche,sexe,id_auth,id_service,matricule,date_de_naissance)
VALUES      ('zakaria','batty','HA:10011',0687904633,'zakaria@gmail.com','lv1',1500.5,01012020,'m',2,1,100100,01021997),
 ('amine','elachari','HA:20022',0602316795,'amine@gmail.com','lv2',2100,02022020,'m',2,2,200200,01031997),
 ('ayoub','rwiha','HA:30033',0638458545,'ayoub@gmail.com','lv1',1100.7,02122019,'m',1,3,300300,01121995),
 ('dounia','ycd','HA:40044',0644904644,'dounia@gmail.com','lv3',2300.5,10112019,'f',2,1,400400,01121998),
 ('akram','ettayfi','HA:50055',0698880222,'akram@gmail.com','lv2',1200.5,15112019,'m',3,1,500500,01111997);
```


```sql
INSERT INTO demande_conge ( date_début,date_fin,number_jours,id_employe,type-conge,liste_de_conge)
   VALUES ( '01-06-2020','15-06-2020',15,25,'Conge annuel','attendre'),
          ( '01-06-2020','15-06-2020',15,24,'Conge annuel','attendre'),
          ( '01-05-2020','05-07-2020',20,23,'Conge exceptionnel ou permissions d’absence','attendre'),	   
          ( '01-06-2020','15-06-2020',10,22,'conge demaladie','attendre'),
          ( '01-07-2020','15-10-2020',20,25,'Maternité 14 semaines','attendre');

```
| id | date_début  | date_fin   | number_jours | id_employe | type_conge                                    | liste_de_conge |
|:--:|:-----------:|:----------:|:------------:|:----------:|:----------------------------------------------|:---------------|
| 41 | 01-06-2020  | 15-06-2020 |           15 |         25 | Conge annuel                                  | attendre       |
| 42 | 01-06-2020  | 15-06-2020 |           15 |         24 | Conge annuel                                  | attendre       |
| 43 | 01-05-2020  | 05-07-2020 |           20 |         23 | Conge exceptionnel ou permissions dÔÇÖabsence | attendre       |
| 44 | 01-06-2020  | 15-06-2020 |           10 |         22 | conge demaladie                               | attendre       |
| 45 | 01-07-2020  | 15-10-2020 |           20 |         25 | Maternit├® 14 semaines                        | attendre       |
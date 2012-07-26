PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE "lh_user" (
"id"  INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
"name"  TEXT NOT NULL
);
INSERT INTO "lh_user" VALUES(1,'Alice');
INSERT INTO "lh_user" VALUES(2,'Bob');
INSERT INTO "lh_user" VALUES(3,'Rock');
INSERT INTO "lh_user" VALUES(4,'Paper');
INSERT INTO "lh_user" VALUES(5,'Scissors');
INSERT INTO "lh_user" VALUES(6,'Lizard');
INSERT INTO "lh_user" VALUES(7,'Spock');
COMMIT;

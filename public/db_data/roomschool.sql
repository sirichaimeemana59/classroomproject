-- Adminer 4.6.0 PostgreSQL dump

DROP TABLE IF EXISTS "migrations";
DROP SEQUENCE migrations_id_seq;
CREATE SEQUENCE migrations_id_seq INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "public"."migrations" (
    "id" integer DEFAULT nextval('migrations_id_seq') NOT NULL,
    "migration" character varying(255) NOT NULL,
    "batch" integer NOT NULL,
    CONSTRAINT "migrations_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "migrations" ("id", "migration", "batch") VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1);

DROP TABLE IF EXISTS "password_resets";
CREATE TABLE "public"."password_resets" (
    "email" character varying(255) NOT NULL,
    "token" character varying(255) NOT NULL,
    "created_at" timestamp(0)
) WITH (oids = false);

CREATE INDEX "password_resets_email_index" ON "public"."password_resets" USING btree ("email");


DROP TABLE IF EXISTS "teacher";
DROP SEQUENCE teacher_id_teacher_seq;
CREATE SEQUENCE teacher_id_teacher_seq INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "public"."teacher" (
    "id_teacher" integer DEFAULT nextval('teacher_id_teacher_seq') NOT NULL,
    "name_teacher" text NOT NULL,
    "lastname_teacher" text NOT NULL,
    "brithdate" date NOT NULL,
    "tell" text NOT NULL,
    "address" text NOT NULL,
    "photo" text NOT NULL,
    "updated_at" timestamp NOT NULL,
    "created_at" timestamp NOT NULL
) WITH (oids = false);

INSERT INTO "teacher" ("id_teacher", "name_teacher", "lastname_teacher", "brithdate", "tell", "address", "photo", "updated_at", "created_at") VALUES
(5,	'อุษา',	'ปัญญาวัง',	'2019-05-17',	'0845784512',	'เชียงใหม่',	'/images/ea1f2f536da77245e42a80eedd7043e7306880e9.jpg',	'2019-05-17 07:00:18',	'2019-05-17 07:00:18'),
(6,	'อนุชิต',	'ผิวนวล',	'2019-05-17',	'0875462254',	'เชียงใหม่',	'/images/3555a96ac70fcdad751ac94ebfa218e6296c267d.jpg',	'2019-05-17 07:00:43',	'2019-05-17 07:00:43'),
(4,	'ศิริชัย',	'มีมานะ',	'2019-05-17',	'0890233519',	'เชียงใหม่',	'/images/53d32aeb673d07d0d23821ccaac7cccf9335e7df.jpg',	'2019-05-17 07:58:32',	'2019-05-17 06:41:03');

DROP TABLE IF EXISTS "users";
DROP SEQUENCE users_id_seq;
CREATE SEQUENCE users_id_seq INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "public"."users" (
    "id" bigint DEFAULT nextval('users_id_seq') NOT NULL,
    "name" character varying(255) NOT NULL,
    "email" character varying(255) NOT NULL,
    "email_verified_at" timestamp(0),
    "password" character varying(255) NOT NULL,
    "remember_token" character varying(100),
    "created_at" timestamp(0),
    "updated_at" timestamp(0),
    "role" smallint DEFAULT 0,
    CONSTRAINT "users_email_unique" UNIQUE ("email"),
    CONSTRAINT "users_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "users" ("id", "name", "email", "email_verified_at", "password", "remember_token", "created_at", "updated_at", "role") VALUES
(3,	'anuchit',	'anuchit@nabour.me',	NULL,	'$2y$10$2XX5e3FWHVGnpL9xKPGVi.gK8wbj8O6FzIDvJmeZFpzHXJ1NnUw4K',	NULL,	'2019-05-17 07:46:49',	'2019-05-17 07:46:49',	NULL),
(4,	'ศิริชัย มีมานะ',	'admin@nabour.me',	NULL,	'$2y$10$jcwNWtbr5zkrrDtDEQP9RO0FYIGA6guDE9sn5e4KaCg4qVs5qnNHO',	NULL,	'2019-05-17 07:49:21',	'2019-05-17 07:49:21',	NULL),
(1,	'sirichai',	'sirichai@o-kaatplus.com',	NULL,	'$2y$10$L4IBJ3nzmDQqEbAOEeQMPeU6l1ZrvF9zDhCIiDr7bVc/kcWhE/Oym',	NULL,	'2019-05-17 06:03:09',	'2019-05-17 06:03:09',	1),
(2,	'usa',	'usa@nabour.me',	NULL,	'$2y$10$BorKtSY6rm/uGtWXI1TtVeQqAkTcS8MwbCNw7i9BPw8EzzI7QdFEG',	NULL,	'2019-05-17 07:44:09',	'2019-05-17 07:44:09',	0);

-- 2019-05-17 16:59:41.003902+07

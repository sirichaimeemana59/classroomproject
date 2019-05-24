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


DROP TABLE IF EXISTS "register_courses";
DROP SEQUENCE register_courses_id_courses_seq;
CREATE SEQUENCE register_courses_id_courses_seq INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "public"."register_courses" (
    "id_courses" integer DEFAULT nextval('register_courses_id_courses_seq') NOT NULL,
    "id_subject" integer NOT NULL,
    "user_create" integer NOT NULL,
    "user_approve" integer,
    "status" integer,
    "created_at" timestamp NOT NULL,
    "updated_at" timestamp NOT NULL,
    "id_teacher" integer,
    "code_subject" integer
) WITH (oids = false);

INSERT INTO "register_courses" ("id_courses", "id_subject", "user_create", "user_approve", "status", "created_at", "updated_at", "id_teacher", "code_subject") VALUES
(7,	5,	2,	NULL,	NULL,	'2019-05-22 05:13:22',	'2019-05-22 05:13:22',	6,	NULL),
(6,	6,	2,	6,	1,	'2019-05-22 05:13:22',	'2019-05-22 06:09:38',	6,	NULL),
(8,	8,	2,	NULL,	NULL,	'2019-05-22 09:19:31',	'2019-05-22 09:19:31',	6,	NULL),
(10,	9,	2,	NULL,	NULL,	'2019-05-22 09:43:33',	'2019-05-22 09:43:33',	6,	NULL),
(11,	10,	2,	NULL,	NULL,	'2019-05-22 10:40:52',	'2019-05-22 10:40:52',	6,	NULL),
(13,	20,	2,	6,	1,	'2019-05-23 08:32:03',	'2019-05-23 08:32:28',	6,	53316),
(14,	21,	2,	6,	1,	'2019-05-23 10:08:56',	'2019-05-23 10:09:12',	6,	71305);

DROP TABLE IF EXISTS "student";
DROP SEQUENCE student_id_teacher_seq;
CREATE SEQUENCE student_id_teacher_seq INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "public"."student" (
    "id_student" integer DEFAULT nextval('student_id_teacher_seq') NOT NULL,
    "name_student" text NOT NULL,
    "lastname_student" text NOT NULL,
    "brithdate" date NOT NULL,
    "tell" text NOT NULL,
    "address" text NOT NULL,
    "photo" text NOT NULL,
    "created_at" timestamp NOT NULL,
    "updated_at" timestamp NOT NULL
) WITH (oids = false);

INSERT INTO "student" ("id_student", "name_student", "lastname_student", "brithdate", "tell", "address", "photo", "created_at", "updated_at") VALUES
(2,	'อนุชิต',	'ผิวนวล',	'2019-05-21',	'0890233519',	'เชียงใหม่',	'/images/2294278eb10f5553468d60baf2986ecb5922f9d2.jpg',	'2019-05-21 03:21:05',	'2019-05-21 03:21:05'),
(3,	'ศิริชัย',	'มีมานะ',	'2019-05-21',	'0875462254',	'เชียงใหม่',	'/images/c8e8cf40c7e22916a2ba0b2b9b28a8eaba543993.jpg',	'2019-05-21 03:21:25',	'2019-05-21 03:21:25'),
(4,	'อรอุมา',	'จริงใจ',	'2019-05-21',	'0875462254',	'เชียงใหม่',	'/images/edbf847083eca74976dfe7b58b5bc7c3816c8b6c.jpg',	'2019-05-21 03:27:50',	'2019-05-21 03:28:36'),
(1,	'อุษา',	'ปัญญาวัง',	'2019-05-21',	'0845784512',	'เชียงใหม่',	'/images/625479a6251f8eb18cb2999d76811e5311a89456.jpg',	'2019-05-21 03:20:44',	'2019-05-21 03:45:19');

DROP TABLE IF EXISTS "subjects";
DROP SEQUENCE subjects_id_subject_seq;
CREATE SEQUENCE subjects_id_subject_seq INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "public"."subjects" (
    "id_subject" integer DEFAULT nextval('subjects_id_subject_seq') NOT NULL,
    "user_create" integer NOT NULL,
    "name_subject_th" text NOT NULL,
    "name_subject_en" text,
    "amount" text,
    "created_at" timestamp,
    "updated_at" timestamp,
    "time_start" integer,
    "time_stop" integer,
    "day" integer,
    "code_subject" integer
) WITH (oids = false);

INSERT INTO "subjects" ("id_subject", "user_create", "name_subject_th", "name_subject_en", "amount", "created_at", "updated_at", "time_start", "time_stop", "day", "code_subject") VALUES
(8,	6,	'ชีวะวิทยา',	'Biology',	'40',	'2019-05-22 09:19:07',	'2019-05-22 09:19:07',	5,	8,	1,	NULL),
(6,	6,	'ภาษาอังกฤษ',	'English',	'30',	'2019-05-21 07:00:22',	'2019-05-21 07:00:44',	3,	4,	2,	NULL),
(9,	6,	'เทคโนโลยีสารสนเทศ',	'Information technology',	'35',	'2019-05-22 09:26:07',	'2019-05-22 09:26:25',	7,	8,	4,	NULL),
(10,	6,	'การเขียนโปรแกรมสำเร็จรูป',	'Programming1',	'28',	'2019-05-22 10:40:08',	'2019-05-23 02:17:07',	7,	7,	2,	NULL),
(11,	6,	'การจัดการฐานข้อมูล',	'Database Management Systems',	'40',	'2019-05-23 02:46:25',	'2019-05-23 02:46:25',	5,	6,	2,	NULL),
(18,	6,	'การเขียนโปรแกรมเชิงวัตถุ',	'Object-oriented programming (OOP)',	'40',	'2019-05-23 05:24:13',	'2019-05-23 05:24:13',	0,	2,	0,	54907),
(5,	6,	'ภาษาไทย',	'Thai',	'35',	'2019-05-21 06:38:42',	'2019-05-23 07:38:11',	1,	2,	2,	NULL),
(19,	6,	'การรักษาความปลอดภัยทางข้อมูล',	'Information Security',	'40',	'2019-05-23 05:53:22',	'2019-05-23 08:02:18',	0,	6,	0,	4996),
(20,	6,	'การบัญชีเบื้องต้น',	'Accounting 1',	'29',	'2019-05-23 07:40:48',	'2019-05-23 08:32:03',	1,	3,	0,	53316),
(21,	6,	'การออกแบบกราฟฟิก',	'Graphic Design',	'39',	'2019-05-23 10:08:44',	'2019-05-23 10:08:56',	8,	11,	3,	71305);

DROP TABLE IF EXISTS "subjects_transection";
DROP SEQUENCE subjects_transection_id_seq;
CREATE SEQUENCE subjects_transection_id_seq INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "public"."subjects_transection" (
    "id" integer DEFAULT nextval('subjects_transection_id_seq') NOT NULL,
    "id_subject" integer,
    "user_create" integer,
    "time_start" integer,
    "time_stop" integer,
    "day" integer,
    "created_at" timestamp,
    "updated_at" timestamp
) WITH (oids = false);

INSERT INTO "subjects_transection" ("id", "id_subject", "user_create", "time_start", "time_stop", "day", "created_at", "updated_at") VALUES
(6,	53316,	6,	3,	6,	2,	'2019-05-23 07:40:48',	'2019-05-23 07:40:48'),
(7,	53316,	6,	2,	6,	6,	'2019-05-23 07:40:48',	'2019-05-23 07:40:48'),
(4,	4996,	6,	4,	7,	4,	'2019-05-23 05:53:22',	'2019-05-23 07:59:50'),
(3,	54907,	6,	1,	5,	4,	'2019-05-23 05:24:13',	'2019-05-23 08:00:53'),
(8,	71305,	6,	3,	5,	4,	'2019-05-23 10:08:44',	'2019-05-23 10:08:44');

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

COMMENT ON COLUMN "public"."users"."role" IS '0 => student 1 => admin 2 => teacher ';

INSERT INTO "users" ("id", "name", "email", "email_verified_at", "password", "remember_token", "created_at", "updated_at", "role") VALUES
(3,	'anuchit',	'anuchit@nabour.me',	NULL,	'$2y$10$2XX5e3FWHVGnpL9xKPGVi.gK8wbj8O6FzIDvJmeZFpzHXJ1NnUw4K',	NULL,	'2019-05-17 07:46:49',	'2019-05-17 07:46:49',	NULL),
(4,	'ศิริชัย มีมานะ',	'admin@nabour.me',	NULL,	'$2y$10$jcwNWtbr5zkrrDtDEQP9RO0FYIGA6guDE9sn5e4KaCg4qVs5qnNHO',	NULL,	'2019-05-17 07:49:21',	'2019-05-17 07:49:21',	NULL),
(1,	'sirichai',	'sirichai@o-kaatplus.com',	NULL,	'$2y$10$L4IBJ3nzmDQqEbAOEeQMPeU6l1ZrvF9zDhCIiDr7bVc/kcWhE/Oym',	NULL,	'2019-05-17 06:03:09',	'2019-05-17 06:03:09',	1),
(6,	'ราตรี กาวี',	'teacher@test.me',	NULL,	'$2y$10$06dbH8jtS4u.36rs2oG.nOq/zlfnObVSYuSG3kq./FMUtfpKpXOT.',	NULL,	'2019-05-21 04:48:36',	'2019-05-21 04:48:36',	2),
(5,	'bb',	'bb@nabour.me',	NULL,	'$2y$10$qBn6BiS/jMbJuuF/lz1YQeOCV0958BvUGOUdoTwpno9peI1HM6pWu',	NULL,	'2019-05-21 04:23:20',	'2019-05-21 04:23:20',	2),
(2,	'usa',	'usa@nabour.me',	NULL,	'$2y$10$BorKtSY6rm/uGtWXI1TtVeQqAkTcS8MwbCNw7i9BPw8EzzI7QdFEG',	'YjH83gO95ZlKFgOUgbBKG6cQ8MZpnCl0mrvluWXeUXt3kbD59pIhEcNu40gm',	'2019-05-17 07:44:09',	'2019-05-17 07:44:09',	0);

-- 2019-05-24 18:26:37.475926+07

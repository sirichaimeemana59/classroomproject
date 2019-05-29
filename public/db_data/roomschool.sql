-- Adminer 4.6.0 PostgreSQL dump

DROP TABLE IF EXISTS "answer_student";
DROP SEQUENCE answer_student_id_seq;
CREATE SEQUENCE answer_student_id_seq INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "public"."answer_student" (
    "id" integer DEFAULT nextval('answer_student_id_seq') NOT NULL,
    "code" text,
    "user_create" integer,
    "id_exm" integer,
    "id_ans" integer,
    "ans" smallint,
    "updated_at" timestamp,
    "created_at" timestamp,
    "id_subject" integer,
    "status" boolean DEFAULT false
) WITH (oids = false);


DROP TABLE IF EXISTS "examination";
DROP SEQUENCE examination_id_seq;
CREATE SEQUENCE examination_id_seq INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "public"."examination" (
    "id" integer DEFAULT nextval('examination_id_seq') NOT NULL,
    "code" text,
    "proposition_th" text,
    "proposition_en" text,
    "user_create" integer,
    "created_at" timestamp,
    "updated_at" timestamp,
    "photo" text,
    "id_subject" integer,
    "title_base_th" text,
    "title_base_en" text
) WITH (oids = false);


DROP TABLE IF EXISTS "examination_transection";
DROP SEQUENCE examination_transection_id_seq;
CREATE SEQUENCE examination_transection_id_seq INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "public"."examination_transection" (
    "id" integer DEFAULT nextval('examination_transection_id_seq') NOT NULL,
    "code" text,
    "choice_th" text,
    "choice_en" text,
    "status" boolean DEFAULT false,
    "created_at" timestamp,
    "updated_at" timestamp
) WITH (oids = false);


DROP TABLE IF EXISTS "migrations";
DROP SEQUENCE migrations_id_seq;
CREATE SEQUENCE migrations_id_seq INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "public"."migrations" (
    "id" integer DEFAULT nextval('migrations_id_seq') NOT NULL,
    "migration" character varying(255) NOT NULL,
    "batch" integer NOT NULL,
    CONSTRAINT "migrations_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


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


DROP TABLE IF EXISTS "score_students";
DROP SEQUENCE score_students_id_seq;
CREATE SEQUENCE score_students_id_seq INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "public"."score_students" (
    "id" integer DEFAULT nextval('score_students_id_seq') NOT NULL,
    "score" integer,
    "id_teacher" integer,
    "id_student" integer,
    "code" text,
    "id_ans" integer,
    "id_question" integer,
    "created_at" timestamp(0),
    "updated_at" timestamp(0),
    "id_subject" integer,
    CONSTRAINT "score_students_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


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


DROP TABLE IF EXISTS "summernotes";
DROP SEQUENCE summernotes_id_seq;
CREATE SEQUENCE summernotes_id_seq INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "public"."summernotes" (
    "id" integer DEFAULT nextval('summernotes_id_seq') NOT NULL,
    "content_en" text NOT NULL,
    "created_at" timestamp(0),
    "updated_at" timestamp(0),
    "id_subject" integer,
    "content_th" text,
    CONSTRAINT "summernotes_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


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


DROP TABLE IF EXISTS "teachers";
DROP SEQUENCE teachers_id_seq;
CREATE SEQUENCE teachers_id_seq INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "public"."teachers" (
    "id" bigint DEFAULT nextval('teachers_id_seq') NOT NULL,
    "created_at" timestamp(0),
    "updated_at" timestamp(0),
    CONSTRAINT "teachers_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


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


-- 2019-05-29 15:04:18.114063+07

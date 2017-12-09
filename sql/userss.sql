--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.20
-- Dumped by pg_dump version 9.3.20
-- Started on 2017-12-09 03:31:46 EET

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 178 (class 1259 OID 75361)
-- Name: users; Type: TABLE; Schema: public; Owner: dev; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    role_id integer,
    status integer DEFAULT 1 NOT NULL,
    user_name character varying(59),
    user_phone character varying(15)
);


ALTER TABLE public.users OWNER TO dev;

--
-- TOC entry 177 (class 1259 OID 75359)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO dev;

--
-- TOC entry 2016 (class 0 OID 0)
-- Dependencies: 177
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- TOC entry 1899 (class 2604 OID 75364)
-- Name: id; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- TOC entry 2011 (class 0 OID 75361)
-- Dependencies: 178
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY users (id, name, email, password, role_id, status, user_name, user_phone) FROM stdin;
2	test	test@my.com	$2y$10$7uXewVN0MKegHvLGXVwvp.NM8Vui3fk8E7PdlEKdU6GpG/Sy6jpfa	3	1	\N	\N
1	janus	janusnic@gmail.com	ghbdtn	1	1	Janus Nic	1234567
\.


--
-- TOC entry 2017 (class 0 OID 0)
-- Dependencies: 177
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('users_id_seq', 2, true);


--
-- TOC entry 1902 (class 2606 OID 75370)
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: dev; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


-- Completed on 2017-12-09 03:31:47 EET

--
-- PostgreSQL database dump complete
--


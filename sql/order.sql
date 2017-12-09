--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.20
-- Dumped by pg_dump version 9.3.20
-- Started on 2017-12-09 03:29:38 EET

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
-- TOC entry 185 (class 1259 OID 75409)
-- Name: orders; Type: TABLE; Schema: public; Owner: dev; Tablespace: 
--

CREATE TABLE orders (
    id integer NOT NULL,
    user_id integer,
    date timestamp with time zone DEFAULT now() NOT NULL,
    products text,
    status integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.orders OWNER TO dev;

--
-- TOC entry 184 (class 1259 OID 75407)
-- Name: orders_id_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE orders_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.orders_id_seq OWNER TO dev;

--
-- TOC entry 2017 (class 0 OID 0)
-- Dependencies: 184
-- Name: orders_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE orders_id_seq OWNED BY orders.id;


--
-- TOC entry 1899 (class 2604 OID 75412)
-- Name: id; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY orders ALTER COLUMN id SET DEFAULT nextval('orders_id_seq'::regclass);


--
-- TOC entry 2012 (class 0 OID 75409)
-- Dependencies: 185
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY orders (id, user_id, date, products, status) FROM stdin;
4	2	2017-12-09 02:24:57.471871+02	"[{\\"Id\\":\\"1\\",\\"Product\\":\\"Product\\u00a0Cat\\",\\"Price\\":\\"22\\",\\"Quantity\\":6,\\"Picture\\":\\"1.jpg\\"},{\\"Id\\":\\"3\\",\\"Product\\":\\"New\\u00a0Cat\\",\\"Price\\":\\"234\\",\\"Quantity\\":\\"3\\",\\"Picture\\":\\"3.jpg\\"}]"	1
\.


--
-- TOC entry 2018 (class 0 OID 0)
-- Dependencies: 184
-- Name: orders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('orders_id_seq', 10, true);


--
-- TOC entry 1903 (class 2606 OID 75419)
-- Name: order_pk; Type: CONSTRAINT; Schema: public; Owner: dev; Tablespace: 
--

ALTER TABLE ONLY orders
    ADD CONSTRAINT order_pk PRIMARY KEY (id);


-- Completed on 2017-12-09 03:29:39 EET

--
-- PostgreSQL database dump complete
--


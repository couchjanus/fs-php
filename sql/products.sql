--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.20
-- Dumped by pg_dump version 9.3.20
-- Started on 2017-12-09 03:31:10 EET

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
-- TOC entry 176 (class 1259 OID 75331)
-- Name: products; Type: TABLE; Schema: public; Owner: dev; Tablespace: 
--

CREATE TABLE products (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    status integer DEFAULT 1 NOT NULL,
    category_id integer,
    code character varying(255) NOT NULL,
    price double precision NOT NULL,
    brand character varying(255) NOT NULL,
    description text NOT NULL,
    is_new boolean DEFAULT true NOT NULL,
    is_recommended boolean DEFAULT false NOT NULL,
    picture character varying(100)
);


ALTER TABLE public.products OWNER TO dev;

--
-- TOC entry 175 (class 1259 OID 75329)
-- Name: products_id_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.products_id_seq OWNER TO dev;

--
-- TOC entry 2018 (class 0 OID 0)
-- Dependencies: 175
-- Name: products_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE products_id_seq OWNED BY products.id;


--
-- TOC entry 1899 (class 2604 OID 75334)
-- Name: id; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY products ALTER COLUMN id SET DEFAULT nextval('products_id_seq'::regclass);


--
-- TOC entry 2013 (class 0 OID 75331)
-- Dependencies: 176
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY products (id, name, status, category_id, code, price, brand, description, is_new, is_recommended, picture) FROM stdin;
1	Product Cat	1	1	111	22	test	Test product	t	f	1.jpg
3	New Cat	1	4	12	234	test	New Car	t	f	3.jpg
4	New Cat	1	1	123	777	test	New Cat is cool	t	f	4.jpg
\.


--
-- TOC entry 2019 (class 0 OID 0)
-- Dependencies: 175
-- Name: products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('products_id_seq', 4, true);


--
-- TOC entry 1904 (class 2606 OID 75342)
-- Name: products_pkey; Type: CONSTRAINT; Schema: public; Owner: dev; Tablespace: 
--

ALTER TABLE ONLY products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);


-- Completed on 2017-12-09 03:31:11 EET

--
-- PostgreSQL database dump complete
--


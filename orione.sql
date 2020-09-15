--
-- PostgreSQL database dump
--

-- Dumped from database version 11.9
-- Dumped by pg_dump version 11.9

-- Started on 2020-09-15 06:00:12

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 16384)
-- Name: adminpack; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS adminpack WITH SCHEMA pg_catalog;


--
-- TOC entry 2828 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION adminpack; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION adminpack IS 'administrative functions for PostgreSQL';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 198 (class 1259 OID 16444)
-- Name: actor_starred_in; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.actor_starred_in (
    movie_id integer,
    actor_id integer
);


--
-- TOC entry 197 (class 1259 OID 16437)
-- Name: actors; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.actors (
    actor_id integer NOT NULL,
    actor_name character varying(255) DEFAULT NULL::character varying,
    born_year integer NOT NULL,
    born_where character varying(255) NOT NULL
);


--
-- TOC entry 199 (class 1259 OID 16447)
-- Name: movies; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.movies (
    movie_id integer NOT NULL,
    title character varying(255) DEFAULT NULL::character varying,
    premiere_year integer NOT NULL
);


--
-- TOC entry 2821 (class 0 OID 16444)
-- Dependencies: 198
-- Data for Name: actor_starred_in; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.actor_starred_in (movie_id, actor_id) FROM stdin;
1	1
3	1
3	2
2	2
4	3
\.


--
-- TOC entry 2820 (class 0 OID 16437)
-- Dependencies: 197
-- Data for Name: actors; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.actors (actor_id, actor_name, born_year, born_where) FROM stdin;
1	Al Pacino	1969	Rome, Italy
2	Leonardo Di Caprio	1986	New York, United States
3	Jamie Foxx	1967	Terrell, Texas, United States
4	John Doe	1986	Poland
\.


--
-- TOC entry 2822 (class 0 OID 16447)
-- Dependencies: 199
-- Data for Name: movies; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.movies (movie_id, title, premiere_year) FROM stdin;
1	Godfather	1972
2	Titanic	1997
3	Scarface	1983
4	Django	2012
5	Avengers	2012
\.


--
-- TOC entry 2696 (class 2606 OID 16452)
-- Name: actors actors_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.actors
    ADD CONSTRAINT actors_pkey PRIMARY KEY (actor_id);


--
-- TOC entry 2698 (class 2606 OID 16454)
-- Name: movies movies_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.movies
    ADD CONSTRAINT movies_pkey PRIMARY KEY (movie_id);


-- Completed on 2020-09-15 06:00:12

--
-- PostgreSQL database dump complete
--


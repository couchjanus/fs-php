-- Table: users

-- DROP TABLE users;

CREATE TABLE users
(
  id serial NOT NULL,
  name character varying(255) NOT NULL,
  email character varying(255) NOT NULL,
  password character varying(255) NOT NULL,
  role_id integer,
  status integer NOT NULL DEFAULT 1,
  user_name character varying(59),
  user_phone character varying(15),
  CONSTRAINT users_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE users
  OWNER TO dev;


-- Table: roles

-- DROP TABLE roles;

CREATE TABLE roles
(
  id serial NOT NULL,
  name character varying(50) NOT NULL,
  CONSTRAINT roles_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE roles
  OWNER TO dev;

-- Table: role_permission

-- DROP TABLE role_permission;

CREATE TABLE role_permission
(
  role_id integer NOT NULL,
  permission_id integer NOT NULL,
  CONSTRAINT role_permission_permission_id_fkey FOREIGN KEY (permission_id)
      REFERENCES permissions (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT role_permission_role_id_fkey FOREIGN KEY (role_id)
      REFERENCES roles (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT role_permission_permission_id_check CHECK (permission_id >= 0),
  CONSTRAINT role_permission_role_id_check CHECK (role_id >= 0)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE role_permission
  OWNER TO dev;

-- Table: products

-- DROP TABLE products;

CREATE TABLE products
(
  id serial NOT NULL,
  name character varying(255) NOT NULL,
  status integer NOT NULL DEFAULT 1,
  category_id integer,
  code character varying(255) NOT NULL,
  price double precision NOT NULL,
  brand character varying(255) NOT NULL,
  description text NOT NULL,
  is_new boolean NOT NULL DEFAULT true,
  is_recommended boolean NOT NULL DEFAULT false,
  picture character varying(100),
  CONSTRAINT products_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE products
  OWNER TO dev;

-- Table: posts

-- DROP TABLE posts;

CREATE TABLE posts
(
  id serial NOT NULL,
  title character(255),
  content text,
  status integer NOT NULL DEFAULT 1,
  created_at timestamp with time zone NOT NULL DEFAULT now(),
  CONSTRAINT posts_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE posts
  OWNER TO dev;

-- Table: permissions

-- DROP TABLE permissions;

CREATE TABLE permissions
(
  id serial NOT NULL,
  name character varying(50) NOT NULL,
  CONSTRAINT permissions_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE permissions
  OWNER TO dev;

-- Table: orders

-- DROP TABLE orders;

CREATE TABLE orders
(
  id serial NOT NULL,
  user_id integer,
  date timestamp with time zone NOT NULL DEFAULT now(),
  products text,
  status integer NOT NULL DEFAULT 1,
  CONSTRAINT order_pk PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE orders
  OWNER TO dev;

-- Table: categories

-- DROP TABLE categories;

CREATE TABLE categories
(
  id serial NOT NULL,
  name character varying(255) NOT NULL,
  status integer NOT NULL DEFAULT 1,
  CONSTRAINT categories_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE categories
  OWNER TO dev;



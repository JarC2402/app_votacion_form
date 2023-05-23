CREATE TABLE region (
    id SERIAL PRIMARY KEY,
    name VARCHAR(30) NOT NULL,    
);

CREATE TABLE comuna (
    id SERIAL PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    region_id INT REFERENCES region (id)
);

CREATE TABLE candidato (
    id SERIAL PRIMARY KEY,
    name VARCHAR(30) NOT NULL,    
);

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    alias VARCHAR(30) NOT NULL,
    rut VARCHAR(8) NOT NULL,
    email VARCHAR(30) NOT NULL,
    region_id INT REFERENCES region (id),
    comuna_id INT REFERENCES comuna (id),
    candidato_id INT REFERENCES candidato (id),
    tv BOOLEAN,
    web BOOLEAN,
    socialred BOOLEAN,
    friend BOOLEAN
);
insert into region (name) values
('Metropolitana'), ('Ohiggins'), ('Los lagos');

insert into comuna (name, region_id) values
('Coquinbo', 1), ('Maipu', 1), ('Las Condes', 1), ('San Fernando', 2), ('Rancagua', 2), ('Santa Cruz', 2), ('Puerto Mont', 3), ('Osorno', 3), ('Puerto Varas', 3);

insert into candidato (name) values
('Link'), ('Zelda'), ('Minions');
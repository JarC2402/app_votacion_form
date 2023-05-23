CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    alias VARCHAR(30) NOT NULL,
    rut VARCHAR(8) NOT NULL,
    email VARCHAR(30) NOT NULL,
    region_id INT REFERENCES region (id),
    comuna_id INT REFERENCES comuna (id),
    candidato_id INT REFERENCES candidato (id),
    tv BOOLEAN NOT NULL,
    web BOOLEAN NOT NULL,
    socialred BOOLEAN NOT NULL,
    friend BOOLEAN NOT NULL
);

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
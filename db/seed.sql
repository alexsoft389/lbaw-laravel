CREATE TABLE users (
  id SERIAL PRIMARY KEY,
  username VARCHAR UNIQUE NOT NULL
);

CREATE TABLE list (
  id SERIAL PRIMARY KEY,
  name VARCHAR NOT NULL
);

CREATE TABLE item (
  id SERIAL PRIMARY KEY,
  list_id INTEGER REFERENCES list NOT NULL,
  description VARCHAR NOT NULL,
  done BOOLEAN NOT NULL DEFAULT FALSE
);

INSERT INTO users VALUES (DEFAULT, 'arestivo');

INSERT INTO list VALUES (DEFAULT, 'Things to do');
INSERT INTO item VALUES (DEFAULT, 1, 'Buy milk');
INSERT INTO item VALUES (DEFAULT, 1, 'Walk the dog', true);

INSERT INTO list VALUES (DEFAULT, 'Things not to do');
INSERT INTO item VALUES (DEFAULT, 2, 'Break a leg');
INSERT INTO item VALUES (DEFAULT, 2, 'Crash the car');

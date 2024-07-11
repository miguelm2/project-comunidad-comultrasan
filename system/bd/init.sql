CREATE TABLE Administrador (
  id_administrador INT IDENTITY(1, 1) PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL,
  correo VARCHAR(255) NOT NULL,
  telefono VARCHAR(255) NOT NULL,
  cedula VARCHAR(255) NOT NULL,
  pass VARCHAR(255) NOT NULL,
  estado INT NOT NULL,
  tipo INT NOT NULL,
  fecha_registro DATETIME NOT NULL
);

INSERT INTO
  Administrador (
    nombre,
    correo,
    telefono,
    cedula,
    pass,
    estado,
    tipo,
    fecha_registro
  )
VALUES
  (
    'Kondory Tecnologia',
    'contacto@kondori.co',
    '789',
    '789',
    'd023f10d2e59f09e18a4abe350483498eb896f6ed422d897fe18a686c264136f51909074da618bcff103e5bca6ce6982ab53382791287ca52cf80e82f200f706',
    1,
    0,
    '2022-07-26 19:01:56'
  );

CREATE TABLE Usuario (
  id_usuario INT IDENTITY(1, 1) PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL,
  correo VARCHAR(255) NOT NULL,
  telefono VARCHAR(255) NOT NULL,
  cedula VARCHAR(255) NOT NULL,
  pass VARCHAR(255) NOT NULL,
  estado INT NOT NULL,
  tipo INT NOT NULL,
  imagen VARCHAR(255) NOT NULL,
  fecha_registro DATETIME NOT NULL
);

CREATE TABLE Gestor (
  id_gestor INT IDENTITY(1, 1) PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL,
  correo VARCHAR(255) NOT NULL,
  telefono VARCHAR(255) NOT NULL,
  cedula VARCHAR(255) NOT NULL,
  pass VARCHAR(255) NOT NULL,
  estado INT NOT NULL,
  tipo INT NOT NULL,
  imagen VARCHAR(255) NOT NULL,
  fecha_registro DATETIME NOT NULL
);

CREATE TABLE TipoComunidad (
  id_tipo_comunidad INT IDENTITY(1, 1) PRIMARY KEY,
  titulo VARCHAR(255) NOT NULL,
  icono VARCHAR(255) NOT NULL,
  subtitulo VARCHAR(255) NOT NULL,
  contenido TEXT NOT NULL,
  imagen VARCHAR(255) NOT NULL,
  fecha_registro DATETIME NOT NULL
);

CREATE TABLE Foro (
  id_foro INT IDENTITY(1, 1) PRIMARY KEY,
  id_tipo_comunidad INT NOT NULL,
  id_usuario INT NOT NULL,
  megusta INT NOT NULL,
  fecha_registro DATETIME NOT NULL
);

CREATE TABLE Informacion (
  id_perfil INT IDENTITY(1, 1) PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL,
  direccion VARCHAR(255) NOT NULL,
  correo VARCHAR(255) NOT NULL,
  telefono VARCHAR(255) NOT NULL,
  departamento VARCHAR(255) NOT NULL,
  ciudad VARCHAR(255) NOT NULL,
  nit VARCHAR(255) NOT NULL,
  wp VARCHAR(255) NOT NULL,
  fb VARCHAR(255) NOT NULL,
  instagram VARCHAR(255) NOT NULL,
  imagen VARCHAR(255) NOT NULL,
  color1 VARCHAR(255) NOT NULL
);

CREATE TABLE Visitas (
  id_visita INT IDENTITY(1, 1) PRIMARY KEY,
  ip VARCHAR(255),
  session_id VARCHAR(255),
  fecha_registro DATETIME
);

CREATE TABLE PreguntaFrecuente (
  id_pregunta INT IDENTITY(1, 1) PRIMARY KEY,
  pregunta VARCHAR(255) NOT NULL,
  respuesta TEXT NOT NULL,
  fecha_registro DATETIME NOT NULL
);

CREATE TABLE BeneficiosPagina (
  id_beneficios_pagina INT IDENTITY(1, 1) PRIMARY KEY,
  titulo VARCHAR(255) NOT NULL,
  subtitulo VARCHAR(255) NOT NULL,
  contenido TEXT NOT NULL,
  requisitos TEXT NOT NULL,
  imagen VARCHAR(255) NOT NULL,
  fecha_registro DATETIME NOT NULL
);
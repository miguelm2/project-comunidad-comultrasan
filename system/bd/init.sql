CREATE TABLE Administrador (
  id_administrador INT IDENTITY(1, 1) PRIMARY KEY,
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

INSERT INTO
  Administrador (
    nombre,
    correo,
    telefono,
    cedula,
    pass,
    estado,
    tipo,
    imagen,
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
    'default.png',
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

ALTER TABLE
  Usuario
ADD
  fecha_nacimiento DATE NULL,
  tipo_documento INT NULL;

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
  contenido TEXT NOT NULL,
  fecha_registro DATETIME NOT NULL
);

CREATE TABLE Perfil (
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

SET
  IDENTITY_INSERT comultrasan_bd.dbo.Perfil ON;

INSERT INTO
  comultrasan_bd.dbo.Perfil (
    id_perfil,
    nombre,
    nit,
    correo,
    telefono,
    direccion,
    departamento,
    ciudad,
    imagen,
    color1,
    wp,
    fb,
    instagram
  )
VALUES
  (
    1,
    'KONDORY TECNOLOGIA',
    '9999991',
    'kondory@gmail.com',
    '12345',
    'Calle 123 # 45-67',
    'Santander',
    'Bucaramanga',
    'perfil.png',
    '#ffffff',
    '31209129312',
    'www.facebook.com',
    'www.instragram.com'
  );

SET
  IDENTITY_INSERT comultrasan_bd.dbo.Perfil OFF;

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

CREATE TABLE BeneficioPagina (
  id_beneficios_pagina INT IDENTITY(1, 1) PRIMARY KEY,
  titulo VARCHAR(255) NOT NULL,
  subtitulo VARCHAR(255) NOT NULL,
  contenido TEXT NOT NULL,
  requisitos TEXT NOT NULL,
  imagen VARCHAR(255) NOT NULL,
  fecha_registro DATETIME NOT NULL
);

CREATE TABLE Descuento (
  id_descuento INT IDENTITY(1, 1) PRIMARY KEY,
  titulo VARCHAR(255) NOT NULL,
  descuento VARCHAR(255) NOT NULL,
  vigencia VARCHAR(255) NOT NULL,
  acceso TEXT NOT NULL,
  imagen VARCHAR(255) NOT NULL,
  logo VARCHAR(255) NOT NULL,
  fecha_registro DATETIME NOT NULL
);

CREATE TABLE Punto (
  id_punto INT IDENTITY(1, 1) PRIMARY KEY,
  puntos INT NOT NULL,
  id_usuario INT NOT NULL,
  id_administrador INT NOT NULL,
  descripcion VARCHAR(255) NOT NULL,
  fecha_registro DATETIME NOT NULL
);

CREATE TABLE Beneficio (
  id_beneficio INT IDENTITY(1, 1) PRIMARY KEY,
  titulo VARCHAR(255) NOT NULL,
  descripcion TEXT NOT NULL,
  puntos INT NOT NULL,
  imagen VARCHAR(255) NOT NULL,
  fecha_registro DATETIME NOT NULL
);

CREATE TABLE Recompensa (
  id_recompenza INT IDENTITY(1, 1) PRIMARY KEY,
  actividad VARCHAR(255) NOT NULL,
  puntos INT NOT NULL,
  fecha_registro DATETIME NOT NULL
);

CREATE TABLE Encuesta (
  id_encuesta INT IDENTITY(1, 1) PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL,
  descripcion TEXT NOT NULL,
  estado INT NOT NULL,
  puntos INT NOT NULL,
  fecha_registro DATETIME NOT NULL
);

CREATE TABLE PreguntaEncuesta (
  id_pregunta INT IDENTITY(1, 1) PRIMARY KEY,
  id_encuesta INT NOT NULL,
  pregunta VARCHAR(255) NOT NULL,
  estado INT NOT NULL,
  fecha_registro DATETIME NOT NULL
);

ALTER TABLE
  PreguntaEncuesta
ADD
  tipo_pregunta INT NULL;

CREATE TABLE RespuestaPregunta (
  id_respuesta INT IDENTITY(1, 1) PRIMARY KEY,
  id_encuesta INT NOT NULL,
  id_pregunta INT NOT NULL,
  respuesta VARCHAR(255) NOT NULL,
  veracidad INT NOT NULL,
  fecha_registro DATETIME NOT NULL
);

CREATE TABLE RespuestaUsuario (
  id_respuesta_usuario INT IDENTITY(1, 1) PRIMARY KEY,
  id_usuario INT NOT NULL,
  id_encuesta INT NOT NULL,
  id_pregunta INT NOT NULL,
  id_respuesta INT NOT NULL,
  fecha_registro DATETIME NOT NULL
);

ALTER TABLE
  RespuestaUsuario
ALTER COLUMN
  id_respuesta INT NULL;

ALTER TABLE
  RespuestaUsuario
ADD
  respuesta_abierta TEXT NULL;

-- Agrega la nueva columna 'respuesta_abierta'
CREATE TABLE CalendarioEvento (
  id_evento INT IDENTITY(1, 1) PRIMARY KEY,
  titulo VARCHAR(255) NOT NULL,
  fecha DATE NOT NULL,
  lugar VARCHAR(255) NOT NULL,
  hora TIME(0) NOT NULL,
  imagen VARCHAR(255) NOT NULL,
  fecha_registro DATETIME NOT NULL
);

CREATE TABLE Comunidad (
  id_comunidad INT IDENTITY(1, 1) PRIMARY KEY,
  id_usuario INT NOT NULL,
  fecha_registro DATETIME NOT NULL
);

-- Permitir valores NULL en id_usuario
ALTER TABLE
  Comunidad
ALTER COLUMN
  id_usuario INT NULL;

-- Agregar columna estado con valor por defecto 1
ALTER TABLE
  Comunidad
ADD
  estado INT DEFAULT 1;

CREATE TABLE UsuarioBeneficio (
  id_usuario_beneficio INT IDENTITY(1, 1) PRIMARY KEY,
  id_usuario INT NOT NULL,
  id_beneficio INT NOT NULL,
  fecha_registro DATETIME NOT NULL
);

ALTER TABLE
  Foro
ADD
  titulo VARCHAR(255) NULL;

CREATE TABLE ComentarioForo (
  id_comentario INT IDENTITY(1, 1) PRIMARY KEY,
  id_foro INT NOT NULL,
  id_usuario INT NOT NULL,
  comentario TEXT NOT NULL,
  fecha_registro DATETIME NOT NULL
);

CREATE TABLE UsuarioComunidad (
  id_usuario_comunidad INT IDENTITY(1, 1) PRIMARY KEY,
  id_usuario INT NOT NULL,
  id_comunidad INT NOT NULL,
  fecha_registro DATETIME NOT NULL
);

ALTER TABLE
  Comunidad
ADD
  nombre VARCHAR(255) NOT NULL;

ALTER TABLE
  UsuarioComunidad
ADD
  estado INT NOT NULL;

ALTER TABLE
  CalendarioEvento
ADD
  id_grupo INT NULL;

ALTER TABLE
  CalendarioEvento
ADD
  persona_cargo VARCHAR(255) NULL;

CREATE TABLE MeGusta (
  id_megusta INT IDENTITY(1, 1) PRIMARY KEY,
  id_foro INT NOT NULL,
  id_usuario INT NOT NULL,
  fecha_registro DATETIME NOT NULL
);

CREATE TABLE Invitacion (
  id_invitacion INT IDENTITY(1, 1) PRIMARY KEY,
  id_usuario INT NOT NULL,
  nombre VARCHAR(255) NOT NULL,
  correo VARCHAR(255) NOT NULL,
  celular VARCHAR(255) NOT NULL,
  cedula VARCHAR(255) NOT NULL,
  fecha_registro DATETIME NOT NULL
);

CREATE TABLE SeccionTipoComunidad (
  id_seccion INT IDENTITY(1, 1) PRIMARY KEY,
  id_tipo_comunidad INT NOT NULL,
  nombre VARCHAR(255) NOT NULL,
  descripcion TEXT,
  imagen VARCHAR(255),
  fecha_registro DATETIME NOT NULL
);

CREATE TABLE Referido (
  id_referido INT IDENTITY(1, 1) PRIMARY KEY,
  nombre_referido VARCHAR(255) NOT NULL,
  cedula_referido VARCHAR(255) NOT NULL,
  tipo_documento_referido VARCHAR(255) NOT NULL,
  departamento VARCHAR(255) NOT NULL,
  ciudad VARCHAR(255) NOT NULL,
  correo VARCHAR(255) NOT NULL,
  celular VARCHAR(255) NOT NULL,
  nombre_refiere VARCHAR(255) NULL,
  cedula_refiere VARCHAR(255) NULL,
  tipo_documento_refiere VARCHAR(255) NULL,
  id_usuario INT NULL,
  estado INT NOT NULL,
  fecha_registro DATETIME DEFAULT GETDATE()
);

CREATE TABLE HistorialInformacion (
  id_historial INT IDENTITY(1, 1) PRIMARY KEY,
  id_usuario INT NOT NULL,
  fecha_registro DATETIME DEFAULT GETDATE() NOT NULL
);

CREATE TABLE UsuarioGrupoInteres (
  id_usuario_grupo INT IDENTITY(1, 1) PRIMARY KEY,
  id_usuario INT NOT NULL,
  id_grupo INT NOT NULL,
  fecha_registro DATETIME NOT NULL
);

ALTER TABLE
  Encuesta
ADD
  mensaje VARCHAR(255) NULL;

ALTER TABLE
  Beneficio
ADD
  definicion VARCHAR(255) NULL,
  condiciones VARCHAR(255) NULL;

ALTER TABLE
  Beneficio DROP COLUMN descripcion;

ALTER TABLE
  Usuario
ADD
  departamento VARCHAR(255) NULL,
  ciudad VARCHAR(255) NULL,
  direccion VARCHAR(255) NULL;

CREATE TABLE Actividad (
  id_actividad INT IDENTITY(1, 1) PRIMARY KEY,
  actividad VARCHAR(255) NOT NULL,
  fecha_registro DATETIME NOT NULL
);

INSERT INTO Actividad (actividad, fecha_registro) VALUES
('Conformar la comunidad', GETDATE()),
('Completar el perfil de usuario', GETDATE()),
('Diligenciar formato de gustos e intereses', GETDATE()),
('Hacer cursos de educación financiera, actualmente son 4', GETDATE()),
('Vincular nuevo miembro al grupo siendo ya asociado', GETDATE());

CREATE TABLE ActividadUsuario (
  id_actividad_usuario INT IDENTITY(1, 1) PRIMARY KEY,
  id_actividad INT NOT NULL,
  id_usuario INT NOT NULL,
  fecha_registro DATETIME NOT NULL
);
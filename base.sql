CREATE DATABASE luxurydriving;
USE luxurydriving;

CREATE TABLE ALUMNO (
    documentoAlumno VARCHAR(20) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    fechaNacimiento DATE NOT NULL,
    telefono INT NOT NULL,
    correo VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    passwrd VARCHAR(50) NOT NULL,
    estadoTeorico VARCHAR(20),
    permisos VARCHAR(20) NOT NULL
    );

CREATE TABLE ALUMNO_LIBRETA (
    documentoAlumno VARCHAR(20),
    categoriaLibreta VARCHAR(20),
    PRIMARY KEY (documentoAlumno, categoriaLibreta),
    CONSTRAINT fk_alumnocategoria_alumno FOREIGN KEY (documentoAlumno) REFERENCES ALUMNO(documentoAlumno)
);

CREATE TABLE ADMINISTRADOR (
    documentoAdmin VARCHAR(20) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    fechaNacimiento DATE NOT NULL,
    telefono INT NOT NULL,
    correo VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    passwrd VARCHAR(50) NOT NULL,   
    permisos VARCHAR(20) NOT NULL
);

CREATE TABLE INSTRUCTOR (
    documentoInstructor VARCHAR(20) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    fechaNacimiento DATE NOT NULL,
    telefono INT NOT NULL,
    correo VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    passwrd VARCHAR(50) NOT NULL,
    permisos VARCHAR(20) NOT NULL
);

CREATE TABLE INSTRUCTOR_HORARIOS (
    documentoInstructor VARCHAR(20),
    horario VARCHAR(100),
    PRIMARY KEY (documentoInstructor, horario),
   CONSTRAINT fk_instructorhorarios_instructor FOREIGN KEY (documentoInstructor) REFERENCES INSTRUCTOR(documentoInstructor)
);

CREATE TABLE INSTRUCTOR_CATEGORIA (
    documentoInstructor VARCHAR(20),
    categoriaClase VARCHAR(20),
    PRIMARY KEY (documentoInstructor, categoriaClase),
    CONSTRAINT fk_instructorcategoria_instructor FOREIGN KEY (documentoInstructor) REFERENCES INSTRUCTOR(documentoInstructor)
);

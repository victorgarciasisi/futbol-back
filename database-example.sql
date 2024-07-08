
--
-- Base de datos: futbol-back
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla jugador
--

CREATE TABLE jugador (
  idjugador int(6) NOT NULL,
  apodo varchar(20) NOT NULL,
  nombre varchar(40) NOT NULL,
  fechanacimiento date NOT NULL,
  demarcacion varchar(15) NOT NULL,
  foto varchar(20) NOT NULL,
  ciudad varchar(30) DEFAULT NULL,
  pais varchar(20) DEFAULT NULL,
  alturapeso varchar(40) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla partido
--

CREATE TABLE partido (
  idpartido varchar(6) NOT NULL,
  jornada varchar(10) NOT NULL,
  resultado varchar(50) NOT NULL,
  rival varchar(40) NOT NULL,
  golesfavor int(3) NOT NULL,
  golescontra int(3) NOT NULL,
  idtemporada int(4) NOT NULL,
  ganado int(1) NOT NULL,
  empatado int(1) NOT NULL,
  perdido int(1) NOT NULL,
  fecha date DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla partidojugador
--

CREATE TABLE partidojugador (
  idpartidojugador varchar(13) NOT NULL,
  idpartido varchar(6) NOT NULL,
  idjugador int(6) NOT NULL,
  partido int(1) DEFAULT NULL,
  titular int(1) DEFAULT NULL,
  suplente int(1) DEFAULT NULL,
  minutos int(3) DEFAULT NULL,
  roja int(1) DEFAULT NULL,
  amarilla int(1) DEFAULT NULL,
  gol int(2) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla temporada
--

CREATE TABLE temporada (
  idtemporada int(4) NOT NULL,
  temporada varchar(10) NOT NULL,
  division varchar(20) NOT NULL,
  posicion int(2) NOT NULL
) ;

-- --------------------------------------------------------


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla jugador
--
ALTER TABLE jugador
  ADD PRIMARY KEY (idjugador);

--
-- Indices de la tabla partido
--
ALTER TABLE partido
  ADD PRIMARY KEY (idpartido),
  ADD KEY FKIDTEMPORADA (idtemporada);

--
-- Indices de la tabla partidojugador
--
ALTER TABLE partidojugador
  ADD PRIMARY KEY (idpartidojugador),
  ADD KEY FKIDJUGADOR2 (idjugador);

--
-- Indices de la tabla temporada
--
ALTER TABLE temporada
  ADD PRIMARY KEY (idtemporada);


--
-- Volcado de datos para la tabla `temporada`
--
INSERT INTO `temporada` (`idtemporada`, `temporada`, `division`, `posicion`) VALUES ('2223', '2022/2023', '1', '1'), ('2324', '2023/2024', '1', '1');

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`idjugador`, `apodo`, `nombre`, `fechanacimiento`, `demarcacion`, `foto`, `ciudad`, `pais`, `alturapeso`) VALUES
(222300, 'Entrenador 1', 'Entrenador 1', '1976-09-27', 'Entrenador', '22300.jpg', 'Madrid', 'España', '-'),
(222301, 'Portero 1', 'Portero 1', '2001-03-26', 'Portero', '222301.jpg', 'Plasencia', 'España', '-'),
(222302, 'Defensa 1', 'Defensa 1', '1995-05-22', 'Defensa', '222302.jpg', 'Murcia', 'España', '-'),
(222303, 'Defensa 2', 'Defensa 2', '1997-03-03', 'Defensa', '222303.jpg', 'Zaragoza', 'España', '-'),
(222304, 'Defensa 3', 'Defensa 3', '2002-07-06', 'Defensa', '222304.jpg', 'Zaragoza', 'España', '-'),
(222305, 'Defensa 4', 'Defensa 4', '2000-05-31', 'Defensa', '222305.jpg', 'Madrid', 'España', '-'),
(222306, 'Centrocampista 1', 'Centrocampista 1', '2002-07-06', 'Centrocampista', '222306.jpg', 'Fuenlabrada', 'España', '-'),
(222307, 'Centrocampista 2', 'Centrocampista 2', '2002-07-06', 'Centrocampista', '222307.jpg', 'Menorca', 'España', '-'),
(222308, 'Centrocampista 3', 'Centrocampista 3', '2002-07-06', 'Centrocampista', '222308.jpg', 'Cadiz', 'España', '-'),
(222309, 'Centrocampista 4', 'Centrocampista 4', '2002-07-06', 'Centrocampista', '222309.jpg', 'Kumasi', 'Ghana', '-'),
(222310, 'Atacante 1', 'Atacante 1', '2003-05-10', 'Atacante', '222310.jpg', 'Obuasi', 'Ghana', '-'),
(222311, 'Atacante 2', 'Atacante 2', '1999-07-30', 'Atacante', '222311.jpg', 'Namyangju', 'Corea del Sur', '-'),
(232400, 'Entrenador 2', 'Entrenador 2', '1976-09-27', 'Entrenador', '232400.jpg', 'Madrid', 'España', '-'),
(232401, 'Portero 2', 'Portero 2', '1997-06-12', 'Portero', '232401.jpg', 'Lugo', 'España', '-'),
(232402, 'Defensa 5', 'Defensa 5', '1997-04-19', 'Defensa', '232402.jpg', 'Santander', 'España', '-'),
(232403, 'Defensa 6', 'Defensa 6', '1996-03-15', 'Defensa', '232403.jpg', 'Bilbao', 'España', '-'),
(232404, 'Defensa 7', 'Defensa 7', '2003-02-18', 'Defensa', '232404.jpg', 'Segovia', 'España', '-'),
(232405, 'Defensa 8', 'Defensa 8', '1995-03-08', 'Defensa', '232405.jpg', 'Bilbao', 'España', '-'),
(232406, 'Centrocampista 5', 'Centrocampista 5', '1997-06-06', 'Centrocampista', '232406.jpg', 'Salamanca', 'España', '-'),
(232407, 'Centrocampista 6', 'Centrocampista 6', '1996-03-08', 'Centrocampista', '232407.jpg', 'Huelva', 'España', '-'),
(232408, 'Centrocampista 7', 'Centrocampista 7', '1998-05-19', 'Centrocampista', '232408.jpg', 'Ibiza', 'España', '-'),
(232409, 'Centrocampista 8', 'Centrocampista 8', '2003-03-15', 'Centrocampista', '232409.jpg', 'Murcia', 'España', '-'),
(232410, 'Atacante 3', 'Atacante 3', '2000-03-10', 'Atacante', '232410.jpg', 'Teruel', 'España', '-'),
(232411, 'Atacante 4', 'Atacante 4', '2002-05-05', 'Atacante', '232411.jpg', 'Huesca', 'España', '-');


--
-- Volcado de datos para la tabla `partido`
--

INSERT INTO `partido` (`idpartido`, `jornada`, `resultado`, `rival`, `golesfavor`, `golescontra`, `idtemporada`, `ganado`, `empatado`, `perdido`, `fecha`) VALUES
('222301', '1', 'Rival 3-1 Mi Equipo', 'Rival', 1, 3, 2223, 0, 0, 1, '2022-08-27'),
('222302', '2', 'Mi Equipo1-1 Rival ', 'Rival', 1, 1, 2223, 0, 1, 0, '2022-08-27'),
('232401', '1', 'Mi Equipo 0-0 Rival', 'Rival', 0, 0, 2324, 0, 1, 0, '2023-08-26'),
('232402', '2', 'Mi Equipo 1-0 Rival', 'Rival', 1, 0, 2324, 1, 0, 0, '2023-09-02');

--
-- Volcado de datos para la tabla `partidojugador`
--

INSERT INTO `partidojugador` (`idpartidojugador`, `idpartido`, `idjugador`, `partido`, `titular`, `suplente`, `minutos`, `roja`, `amarilla`, `gol`) VALUES
('222301-222300', '222301', 222300, 1, 0, 0, 0, 0, 0, -3),
('222301-222301', '222301', 222301, 1, 1, 0, 90, 0, 0, 0),
('222301-222302', '222301', 222302, 1, 1, 0, 90, 0, 0, 0),
('222301-222303', '222301', 222303, 1, 1, 0, 90, 0, 0, 0),
('222301-222304', '222301', 222304, 1, 1, 0, 90, 0, 0, 0),
('222301-222305', '222301', 222305, 1, 1, 0, 90, 0, 0, 0),
('222301-222306', '222301', 222306, 1, 1, 0, 90, 0, 1, 0),
('222301-222307', '222301', 222307, 1, 1, 0, 90, 0, 0, 0),
('222301-222308', '222301', 222308, 1, 1, 0, 90, 0, 0, 0),
('222301-222309', '222301', 222309, 1, 1, 0, 90, 0, 0, 1),
('222301-222310', '222301', 222310, 1, 1, 0, 90, 0, 0, 0),
('222301-222311', '222301', 222311, 1, 1, 0, 90, 0, 0, 0),
('222302-222300', '222302', 222300, 1, 0, 0, 0, 0, 0, 0),
('222302-222301', '222302', 222301, 1, 1, 0, 90, 0, 0, -1),
('222302-222302', '222302', 222302, 1, 1, 0, 90, 0, 0, 0),
('222302-222303', '222302', 222303, 1, 1, 0, 90, 0, 1, 0),
('222302-222304', '222302', 222304, 1, 1, 0, 90, 0, 0, 0),
('222302-222305', '222302', 222305, 1, 1, 0, 90, 0, 0, 0),
('222302-222306', '222302', 222306, 1, 1, 0, 90, 0, 0, 0),
('222302-222307', '222302', 222307, 1, 1, 0, 90, 0, 0, 0),
('222302-222308', '222302', 222308, 1, 1, 0, 90, 0, 0, 0),
('222302-222309', '222302', 222309, 1, 1, 0, 90, 0, 0, 0),
('222302-222310', '222302', 222310, 1, 1, 0, 90, 0, 0, 1),
('222302-222311', '222302', 222311, 1, 1, 0, 90, 0, 0, 0),
('232401-232400', '232401', 232400, 1, 0, 0, 0, 0, 0, 0),
('232401-232401', '232401', 232401, 1, 1, 0, 90, 0, 0, 0),
('232401-232402', '232401', 232402, 1, 1, 0, 90, 0, 0, 0),
('232401-232403', '232401', 232403, 1, 1, 0, 90, 0, 0, 0),
('232401-232404', '232401', 232404, 1, 1, 0, 90, 0, 1, 0),
('232401-232405', '232401', 232405, 1, 1, 0, 90, 0, 0, 0),
('232401-232406', '232401', 232406, 1, 1, 0, 90, 0, 0, 0),
('232401-232407', '232401', 232407, 1, 1, 0, 90, 0, 0, 0),
('232401-232408', '232401', 232408, 1, 1, 0, 90, 0, 0, 0),
('232401-232409', '232401', 232409, 1, 1, 0, 90, 0, 0, 0),
('232401-232410', '232401', 232410, 1, 1, 0, 90, 0, 0, 0),
('232401-232411', '232401', 232411, 1, 1, 0, 90, 0, 0, 0),
('232402-232400', '232402', 232400, 1, 0, 0, 0, 0, 0, 0),
('232402-232401', '232402', 232401, 1, 1, 0, 90, 0, 0, 0),
('232402-232402', '232402', 232402, 1, 1, 0, 90, 0, 0, 0),
('232402-232403', '232402', 232403, 1, 1, 0, 90, 0, 0, 0),
('232402-232404', '232402', 232404, 1, 1, 0, 90, 0, 0, 0),
('232402-232405', '232402', 232405, 1, 1, 0, 90, 0, 1, 0),
('232402-232406', '232402', 232406, 1, 1, 0, 90, 0, 0, 0),
('232402-232407', '232402', 232407, 1, 1, 0, 90, 0, 0, 0),
('232402-232408', '232402', 232408, 1, 1, 0, 90, 0, 0, 0),
('232402-232409', '232402', 232409, 1, 1, 0, 90, 0, 0, 0),
('232402-232410', '232402', 232410, 1, 1, 0, 90, 0, 0, 0),
('232402-232411', '232402', 232411, 1, 1, 0, 90, 0, 0, 1);
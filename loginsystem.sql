CREATE TABLE `cuenta` (
  `Id_Cuenta` int(11) NOT NULL,
  `Username` tinytext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Password` tinytext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Email` longtext CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `Type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cuenta` (`Id_Cuenta`, `Username`, `Password`, `Email`, `Type`) VALUES
(1, '123', '$2y$10$RkvdNvc3eY3tyjn1f5i.uuqlpzEwgaNwRUkQ96iuarFykKhjbtNWq', 'jahziel56@hotmail.com', 2),
(2, 'jahziel', '$2y$10$/zpfJxfxwfu6Usrm.Ke.Ce/3MpAhdPf9wYz5FFxPVvpirbce9fIOy', 'jahziel56@hotmail.com', 2),
(3, '111', '$2y$10$9LzSWanAJmDf8KkX/T9bw.HzYYc1sWE8Mlv67NlxEarLT/zIfaoYG', 'q1@gmail.com', 3);

CREATE TABLE `notificacion` (
  `Id_Noti` int(11) NOT NULL,
  `Id_Cuenta` int(11) NOT NULL,
  `Id_Persona` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Tipo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `persona` (
  `Id_Persona` int(11) NOT NULL,
  `Nombres` text NOT NULL,
  `Apellido_P` text NOT NULL,
  `Apellido_M` text NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Id_Cuenta_P` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `persona` (`Id_Persona`, `Nombres`, `Apellido_P`, `Apellido_M`, `Telefono`, `Id_Cuenta_P`) VALUES
(1, 'jose jahziel', 'lopez', 'mendoza', 6221477894, 1),
(6, 'jahziel', 'Lopez', 'Mendoza', 622, 2);

ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`Id_Cuenta`);

ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`Id_Noti`),
  ADD KEY `Id_Cuenta` (`Id_Cuenta`),
  ADD KEY `Id_Persona` (`Id_Persona`);

ALTER TABLE `persona`
  ADD PRIMARY KEY (`Id_Persona`),
  ADD UNIQUE KEY `cuenta` (`Id_Cuenta_P`),
  ADD KEY `Id_Cuenta_P` (`Id_Cuenta_P`);

ALTER TABLE `cuenta`
  MODIFY `Id_Cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `notificacion`
  MODIFY `Id_Noti` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `persona`
  MODIFY `Id_Persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `notificacion`
  ADD CONSTRAINT `notificacion_ibfk_1` FOREIGN KEY (`Id_Cuenta`) REFERENCES `cuenta` (`Id_Cuenta`),
  ADD CONSTRAINT `notificacion_ibfk_2` FOREIGN KEY (`Id_Persona`) REFERENCES `persona` (`Id_Persona`);

ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`Id_Cuenta_P`) REFERENCES `cuenta` (`Id_Cuenta`);

ALTER TABLE convocatoria ADD FOREIGN KEY (`id_Persona`) REFERENCES persona(id_Persona);
ALTER TABLE convocatoria ADD FOREIGN KEY (`id_Formulario`) REFERENCES formularioprincipal(FormularioID);



COMMIT;


CREATE DATABASE `bbdd_equipos_resultados` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

use `bbdd_equipos_resultados`;
CREATE TABLE Equipos (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    NombreEquipo VARCHAR(255),
    Estadio VARCHAR(255)
);

CREATE TABLE Partidos (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    EquipoLocalID INT,
    EquipoVisitanteID INT,
    Resultado ENUM('1', 'X', '2'), -- Para futuro -->Es util utilizar enum para limitar la posibilidad de insert 1, X o 2
    FOREIGN KEY (EquipoLocalID) REFERENCES Equipos(ID),
    FOREIGN KEY (EquipoVisitanteID) REFERENCES Equipos(ID)
);

INSERT INTO Equipos (NombreEquipo, Estadio) VALUES
    ('Real Madrid', 'Estadio Santiago Bernabéu'),
    ('FC Barcelona', 'Camp Nou'),
    ('Manchester United', 'Old Trafford'),
    ('Liverpool FC', 'Anfield'),
    ('Bayern Munich', 'Allianz Arena');


INSERT INTO Partidos (EquipoLocalID, EquipoVisitanteID, Resultado) VALUES
    (1, 2, '1'), -- Real Madrid vs. FC Barcelona (Resultado: 1)
    (2, 1, '2'), -- FC Barcelona vs. Real Madrid (Resultado: 2)
    (3, 4, 'X'), -- Manchester United vs. Liverpool FC (Resultado: X)
    (4, 3, '2'), -- Liverpool FC vs. Manchester United (Resultado: 2)
    (5, 1, '1'); -- Bayern Munich vs. Real Madrid (Resultado: 1)
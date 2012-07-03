INSERT INTO `pelota_paleta`.`producto` (`id`, `descripcion_prod`, `marca`, `presentacion`, `precio`) VALUES 
(NULL, 'Paleta pequenia', 'adidas', 'pequenia', '50'), 
(NULL, 'Paleta grande', 'adidas', 'grande', '70'),
(NULL, 'Paleta mediana', 'adidas', 'mediana', '50'), 
(NULL, 'Paleta grande', 'nike', 'grande', '70'),
(NULL, 'Paleta pequenia', 'nike', 'pequenia', '50'), 
(NULL, 'Paleta mediana', 'nike', 'mediana', '70'),
(NULL, 'Paleta pequenia', 'topper', 'pequenia', '50'), 
(NULL, 'Paleta grande', 'topper', 'grande', '70'),
(NULL, 'Paleta mediana', 'topper', 'mediana', '50'), 
(NULL, 'Paleta grande', 'wilson', 'grande', '70'),
(NULL, 'Paleta pequenia', 'wilson', 'pequenia', '50'), 
(NULL, 'Paleta mediana', 'wilson', 'mediana', '70'),
(NULL, 'Camiseta River', 'adidas', 'Small (S)', '50'), 
(NULL, 'Camiseta River', 'adidas', 'Medium (M)', '70'),
(NULL, 'Camiseta River', 'adidas', 'Large (L)', '70'),
(NULL, 'Camiseta Argentina', 'adidas', 'Small (S)', '50'), 
(NULL, 'Camiseta Argentina', 'adidas', 'Medium (M)', '70'),
(NULL, 'Camiseta Argentina', 'adidas', 'Large (L)', '70'),
(NULL, 'Camiseta Boca', 'nike', 'Small (S)', '50'), 
(NULL, 'Camiseta Boca', 'nike', 'Medium (M)', '70'),
(NULL, 'Camiseta Boca', 'nike', 'Large (L)', '70'),
(NULL, 'Camiseta Pelota-paleta', 'flecha', 'Small (S)', '50'), 
(NULL, 'Camiseta Pelota-paleta', 'flecha', 'Medium (M)', '70'),
(NULL, 'Camiseta Pelota-paleta', 'flecha', 'Large (L)', '70'),
(NULL, 'Alfajor', 'Guamayen', 'simple', '50'), 
(NULL, 'Alfajor', 'Guamayen', 'doble', '70'),
(NULL, 'Alfajor', 'Guamayen', 'triple', '70'),
(NULL, 'Alfajor', 'Milka', 'triple', '70'),
(NULL, 'Alfajor', 'Grandote', 'triple', '70'),
(NULL, 'Alfajor', 'Aguila', 'granizado', '70'),
(NULL, 'Gaseosa', 'Pepsi', '1/4 Lts', '70'),
(NULL, 'Gaseosa', 'Pepsi', '1/2 Lts', '70'),
(NULL, 'Gaseosa', 'Pepsi', '1 Lts', '70'),
(NULL, 'Gaseosa', 'Pepsi', '1.5 Lts', '70'),
(NULL, 'Gaseosa', 'Coca-cola', '1/4 Lts', '70'),
(NULL, 'Gaseosa', 'Coca-cola', '1/2 Lts', '70'),
(NULL, 'Gaseosa', 'Coca-cola', '1 Lts', '70'),
(NULL, 'Gaseosa', 'Coca-cola', '1.5 Lts', '70'),
(NULL, 'Gaseosa', 'Coca-cola', '2 Lts', '70'),
(NULL, 'Gaseosa', 'Coca-cola', '3 Lts', '70'),
(NULL, 'Cerbeza', 'Quilmes', '1 Lts', '70'),
(NULL, 'Gaseosa', 'Imperial', '1 Lts', '70'),
(NULL, 'Gaseosa', 'Iguana', '1 Lts', '70'),
(NULL, 'Gaseosa', 'Heineken', '1 Lts', '70');





INSERT INTO `pelota_paleta`.`proveedor` (`id`, `nombre_proveedor`, `dom_calle`, `dom_nro`, `dom_piso`, `dom_dpto`, `telefono`) VALUES 
(NULL, 'coca - cola', 'rawson', '333', '3', '2', '154123412'), 
(NULL, 'quilmes', '9 de julio', '358', NULL, NULL, '154165554'),
(NULL, 'arcor', '28 de julio', '963', '9', 'C', '154663412'),
(NULL, 'pepsi', '25 de mayo', '1233', NULL, NULL, '154631233');




INSERT INTO `pelota_paleta`.`categoria` (`id`, `descripcion_categoria`, `edad_min`, `edad_max`) VALUES 
(NULL, 'Ninios', '8', '14'), 
(NULL, 'Adolescentes', '15', '22'),
(NULL, 'Adultos', '23', '39'),
(NULL, '40 - 45', '40', '45'),
(NULL, '46 - 50', '46', '50'),
(NULL, '51 - 60', '51', '60'),
(NULL, '61 - 70', '61', '70');




INSERT INTO `pelota_paleta`.`club` (`id`, `nombre_club`) VALUES 
(NULL, 'Germinal'), 
(NULL, 'River'),
(NULL, 'Racing'),
(NULL, 'Independiente'),
(NULL, 'Corinthians'),
(NULL, 'San lorenzo'),
(NULL, 'Guillermo Brown'),
(NULL, 'Velez'),
(NULL, 'San Martin(sj)'),
(NULL, 'Aldosivi(?)'),
(NULL, 'Huracan');




INSERT INTO `provincia` (`id`, `nombre_prov`) VALUES
(1, 'BUENOS AIRES                                      '),
(2, 'CATAMARCA                                         '),
(3, 'CORDOBA                                           '),
(4, 'CORRIENTES                                        '),
(5, 'ENTRE RIOS                                        '),
(6, 'JUJUY                                             '),
(7, 'MENDOZA                                           '),
(8, 'LA RIOJA                                          '),
(9, 'SALTA                                             '),
(10, 'SAN JUAN                                          '),
(11, 'SAN LUIS                                          '),
(12, 'SANTA FE                                          '),
(13, 'SANTIAGO DEL ESTERO                               '),
(14, 'TUCUMAN                                           '),
(16, 'CHACO                                             '),
(17, 'CHUBUT                                            '),
(18, 'FORMOSA                                           '),
(19, 'MISIONES                                          '),
(20, 'NEUQUEN                                           '),
(21, 'LA PAMPA                                          '),
(22, 'RIO NEGRO                                         '),
(23, 'SANTA CRUZ                                        '),
(24, 'TIERRA DEL FUEGO                                  '),
(25, 'CIUDAD AUTONOMA BUENOS AIRES                      ');




INSERT INTO `pelota_paleta`.`localidad` (`id`, `nombre_loc`, `cod_postal`, `provincia_id`) VALUES 
(NULL, 'rawson', '9103', '17'), 
(NULL, 'comodoro riv', '9120', '17'), 
(NULL, 'gaiman', '9165', '17'), 
(NULL, 'pto. madryn', '9195', '17'), 
(NULL, 'trelew', '9100', '17');



INSERT INTO `pelota_paleta`.`persona` (`nro_doc`, `nom_apellido`, `fecha_nacimiento`, `e_mail`, `localidad_id`) VALUES 
('33060648', 'Javier Gosaine', '1988-04-27', 'ruso@gmaill.com', '5'), 
('33060123', 'Raul Rivas', '1988-04-27', 'raul@gmaill.com', '5'), 
('33060321', 'Nicolas Fernandez', '1988-04-27', 'nica@gmaill.com', '1'), 
('33060333', 'Sebastian Machado', '1988-04-27', 'seba@gmaill.com', '1'), 
('33060222', 'Gabriel Figeroa', '1988-04-27', 'lokillo@gmaill.com', '1'), 
('33060444', 'Matias Yensanaaa', '1988-04-27', 'yen@gmaill.com', '1'), 
('33060555', 'Dario Chuavechito', '1988-04-27', 'chuave@gmaill.com', '1'),
('34123666', 'Leo Quiroga', '1954-03-12', 'leo@gmaill.com', '1');





INSERT INTO `pelota_paleta`.`direccion` (`persona_nro_doc`, `calle`, `numero`, `monoblock_edif`, `piso`, `dpto`) VALUES 
('33060648', 'Elsgood', '265', 'S/N', 'S/N', 'S/N'), 
('33060222', 'Fontana', '234', 'S/N', '5', 'b');





INSERT INTO `pelota_paleta`.`torneo` (`id`, `anio`, `nombre`, `tipo_torneo`) VALUES 
(NULL, '2011', 'Rey pelota-paleta', '1'), 
(NULL, '2011', 'Pelota-paleta PowerMax', '1'),
(NULL, '2010', 'Regional Masters', '2');






INSERT INTO `pelota_paleta`.`torneo_categoria` (`id_torneo_categoria`, `torneo_id`, `categoria_id`) VALUES 
(NULL, '1', '1'), (NULL, '2', '2');





INSERT INTO `pelota_paleta`.`inscripto` (`id`, `persona_nro_doc`, `torneo_cat_id`, `nro_equipo`, `club_representado`) VALUES 
(NULL, '33060648', '1', '1', '1'), 
(NULL, '33060222', '2', '1', '2');



INSERT INTO `pelota_paleta`.`pedido` (`id`, `proveedor_id`, `fecha_pedido`) VALUES 
(NULL, '1', CURRENT_TIMESTAMP),
 (NULL, '2', CURRENT_TIMESTAMP);


/*
INSERT INTO `pelota_paleta`.`pedido_producto` (`pedido_id`, `producto_id`) VALUES 
(NULL, '1', CURRENT_TIMESTAMP),
(NULL, '2', CURRENT_TIMESTAMP); */




INSERT INTO `pelota_paleta`.`puntos_puesto` (`id`, `puesto`, `puntos_por_puesto`) VALUES 
(NULL, '1', '100'), (NULL, '2', '50'), 
(NULL, '3', '40'), (NULL, '4', '40'), 
(NULL, '5', '30'), (NULL, '6', '30'), 
(NULL, '7', '20'), (NULL, '8', '20'),
 (NULL, '9', '10'), (NULL, '10', '10');





INSERT INTO `pelota_paleta`.`socio` (`persona_nro_doc`, `fecha_alta`, `vitalicio`, `activo`) VALUES
 ('33060648', '2012-07-02', '1', '1'), 
 ('33060222', '2012-02-09', '0', '0');





INSERT INTO `pelota_paleta`.`tipo_reserva` (`id`, `descirpcion_reserva`, `tiempo_reserva`) VALUES
 (NULL, 'quincho', '120'), 
 (NULL, 'cancha', '90');




INSERT INTO `pelota_paleta`.`reserva` (`socio_nro_doc`, `tipo_reserva_id`, `dia_comienzo_reserva`, `hora_comienzo_reserva`, `dia_fin_reserva`, `hora_fin_reserva`, `cantidad_turnos`) VALUES
 ('33060648', '1', '2012-07-02', '14:00:00', '2012-07-02', '16:00:00', '1'), 
 ('33060222', '2', '2012-07-02', '19:00:00', '2012-07-02', '20:30:00', '1');





INSERT INTO `pelota_paleta`.`resultado_torneo` (`id`, `puesto_id`, `torneo_cat_id`, `pelotari_nro_doc`) VALUES
 (NULL, '1', '1', '33060648'),
 (NULL, '4', '2', '33060222');





INSERT INTO `pelota_paleta`.`stock` (`producto_id`, `cantidad_actual`, `cantidad_minima`) VALUES 
('1', '100', '50'), ('2', '100', '80'),
('3', '100', '50'), ('4', '100', '80'),
('5', '100', '50'), ('6', '100', '80'),
('7', '100', '50'), ('8', '100', '80'),
('9', '100', '50'), ('10', '100','80'),
('11', '100', '50'), ('12', '100', '80'),
('13', '100', '50'), ('14', '100', '80'),
('15', '100', '150'), ('16', '100', '180'),
('17', '100', '50'), ('18', '100', '80'),
('19', '100', '50'), ('20', '100', '180'),
('21', '100', '50'), ('22', '100', '180'),
('23', '100', '50'), ('24', '100', '80'),
('25', '100', '50'), ('26', '100', '180'),
('27', '100', '50'), ('28', '100', '80'),
('29', '100', '50'), ('30', '100', '180'),
('31', '100', '50'), ('32', '100', '80'),
('33', '100', '510'), ('34', '100', '180'),
('35', '100', '50'), ('36', '100', '80'),
('37', '100', '50'), ('38', '100', '80'),
('39', '100', '50'), ('40', '100', '80'),
('41', '100', '50'), ('42', '100', '80');






INSERT INTO `pelota_paleta`.`telefono` (`persona_nro_doc`, `telefono_nro`) VALUES 
('33060648', '154512219'), 
('33060222', '154123555');
























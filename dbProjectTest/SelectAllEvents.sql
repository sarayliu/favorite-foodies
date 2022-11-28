-- Exported stored procedure SelectAllEvents from phpMyAdmin
DELIMITER $$
CREATE DEFINER=`ssi3ka`@`%` PROCEDURE `SelectAllEvents`()
BEGIN
	SELECT * FROM event;
END$$
DELIMITER ;

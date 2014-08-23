DELIMITER |

/**
Create sesame table
*/
CREATE TABLE `sesame` (
  `sesame_id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'auto incrementing sesame_id of each generated code, unique index',
  `random_code` int(8) NOT NULL UNIQUE COMMENT 'Random generated sesame login code, must be unique',
  `logged_in_user_id` int(11) unsigned NULL COMMENT 'If null randomcode is not used to login',
  `created_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'create timestamp used for cleanup purposes'
) COMMENT='Sesame table to store generated login keys' ENGINE='InnoDB' COLLATE 'utf8_unicode_ci'|

/**
turn event_scheduler on, Note that you need root access to do this
Create event, event will be triggered every 1 hour and will delete all record that are older then 1 hour
for more info, see http://www.sitepoint.com/working-with-mysql-events/
*/
SET GLOBAL event_scheduler = ON|

DROP EVENT IF EXISTS sesame_cleanup|

CREATE EVENT sesame_cleanup
    ON SCHEDULE EVERY 1 HOUR
    DO
      BEGIN
        DELETE FROM sesame WHERE created_timestamp > DATE_SUB(CURDATE(), INTERVAL 1 HOUR);
      END |

DELIMITER ;

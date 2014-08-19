CREATE TABLE `sesame` (
  `sesame_id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'auto incrementing sesame_id of each generated code, unique index',
  `random_code` int(8) NOT NULL COMMENT 'Random generated sesame login code ',
  `logged_in_user_id` int(11) unsigned NULL COMMENT 'If null randomcode is not used to login'
) COMMENT='Sesame table to store generated login keys' ENGINE='InnoDB' COLLATE 'utf8_general_ci';

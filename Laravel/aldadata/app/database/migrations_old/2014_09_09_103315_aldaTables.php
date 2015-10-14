<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AldaTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	$sql = <<<'EOD'

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema aldadata
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `aldadata` DEFAULT CHARACTER SET utf8 ;
USE `aldadata` ;

-- -----------------------------------------------------
-- Table `aldadata`.`countries`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aldadata`.`countries` ;

CREATE TABLE IF NOT EXISTS `aldadata`.`countries` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `abbreviation` VARCHAR(5) NOT NULL,
  `visa_work_permit_required` TINYINT NULL,
  `visa_work_permit_procedure` TEXT NULL,
  `notes` TEXT NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aldadata`.`adresses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aldadata`.`adresses` ;

CREATE TABLE IF NOT EXISTS `aldadata`.`adresses` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `address` VARCHAR(45) NULL,
  `postal_code` VARCHAR(45) NULL,
  `city` VARCHAR(45) NULL,
  `state_province` VARCHAR(45) NULL,
  `country_id` INT NOT NULL,
  `phone` VARCHAR(45) NULL,
  `phone2` VARCHAR(45) NULL,
  `fax` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `website` VARCHAR(45) NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `country_idx` (`country_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aldadata`.`companies`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aldadata`.`companies` ;

CREATE TABLE IF NOT EXISTS `aldadata`.`companies` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `address_id` INT NULL,
  `references` TEXT NULL,
  `notes` TEXT NULL,
  `bank_details` TEXT NULL,
  `tax_number` VARCHAR(45) NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `address_idx` (`address_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Table holding all basic contact data about companies';


-- -----------------------------------------------------
-- Table `aldadata`.`contact_types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aldadata`.`contact_types` ;

CREATE TABLE IF NOT EXISTS `aldadata`.`contact_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NULL,
  `description` VARCHAR(255) NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB
COMMENT = 'This table holds the different contact types, ie: promotor, markerteer, venue owner, hotel employee, host, financial';


-- -----------------------------------------------------
-- Table `aldadata`.`contacts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aldadata`.`contacts` ;

CREATE TABLE IF NOT EXISTS `aldadata`.`contacts` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `contact_type_id` INT NOT NULL,
  `function` VARCHAR(45) NULL,
  `first_name` VARCHAR(45) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `last_name` VARCHAR(45) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `address_id` INT NULL,
  `references` TEXT NULL,
  `notes` TEXT NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` TIMESTAMP NULL,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  PRIMARY KEY (`id`),
  INDEX `contact_type_idx` (`contact_type_id` ASC),
  INDEX `address_idx` (`address_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Table holding personal information about contacts';


-- -----------------------------------------------------
-- Table `aldadata`.`companies_contacts_xref`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aldadata`.`companies_contacts_xref` ;

CREATE TABLE IF NOT EXISTS `aldadata`.`companies_contacts_xref` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `contact_id` INT NOT NULL,
  `company_id` INT NOT NULL,
  `contact_is_employed` TINYINT(4) NULL DEFAULT '1',
  `contact_is_owner` TINYINT(4) NULL DEFAULT NULL,
  `contact_left_company` DATE NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `contact_idx` (`contact_id` ASC),
  INDEX `company_idx` (`company_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Crossreferencing table for companies and contacts allowing a many on many relationship between a company and a contact. A contact can work for multiple companies (or have worked for) and a company can obviously have more than one contact.';


-- -----------------------------------------------------
-- Table `aldadata`.`venues`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aldadata`.`venues` ;

CREATE TABLE IF NOT EXISTS `aldadata`.`venues` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `main_contact_id` INT NULL,
  `address_id` INT NULL,
  `name` VARCHAR(100) NULL,
  `indoor_or_outdoor` VARCHAR(45) NULL,
  `name_of_hall` VARCHAR(45) NULL,
  `capacity` VARCHAR(45) NULL,
  `dimension_height` VARCHAR(45) NULL,
  `dimension_width` VARCHAR(45) NULL,
  `dimension_length` VARCHAR(45) NULL,
  `rigging_capacity` VARCHAR(45) NULL,
  `curfew` TEXT NULL,
  `minimal_age_limit` VARCHAR(45) NULL,
  `alcohol_license` VARCHAR(45) NULL,
  `restrictions_on_merchandise_sales` VARCHAR(45) NULL,
  `sound_restrictions` TEXT NULL,
  `booked_for_setup_from` DATETIME NULL,
  `booked_for_break_until` DATETIME NULL,
  `notes` TEXT NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `address_idx` (`address_id` ASC),
  INDEX `main_contact_idx` (`main_contact_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aldadata`.`events`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aldadata`.`events` ;

CREATE TABLE IF NOT EXISTS `aldadata`.`events` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL,
  `venue_id` INT NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `venue_idx` (`venue_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aldadata`.`airports`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aldadata`.`airports` ;

CREATE TABLE IF NOT EXISTS `aldadata`.`airports` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `address_id` INT NULL,
  `name` VARCHAR(100) NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `address_idx` (`address_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aldadata`.`hotels`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aldadata`.`hotels` ;

CREATE TABLE IF NOT EXISTS `aldadata`.`hotels` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `nearest_airport_id` INT NULL,
  `address_id` INT NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `address_idx` (`address_id` ASC),
  INDEX `nearest_airport_idx` (`nearest_airport_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aldadata`.`hospitality_details`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aldadata`.`hospitality_details` ;

CREATE TABLE IF NOT EXISTS `aldadata`.`hospitality_details` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `contact_id` INT NULL,
  `venue_id` INT NULL,
  `airport_id` INT NULL,
  `first_hotel_option_id` INT NULL,
  `first_hotel_distance_from_airport` INT NULL,
  `first_hotel_distance_from_venue` INT NULL,
  `second_hotel_option_id` INT NULL,
  `second_hotel_distance_from_airport` INT NULL,
  `second_hotel_distance_from_venue` INT NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `first_hotel_option_idx` (`first_hotel_option_id` ASC),
  INDEX `second_hotel_option_idx` (`second_hotel_option_id` ASC),
  INDEX `venue_idx` (`venue_id` ASC),
  INDEX `airport_idx` (`airport_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aldadata`.`documents`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aldadata`.`documents` ;

CREATE TABLE IF NOT EXISTS `aldadata`.`documents` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NULL,
  `title` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `url` VARCHAR(45) NULL,
  `meta` TEXT NULL,
  `contact_id` INT NULL,
  `company_id` INT NULL,
  `event_id` INT NULL,
  `hotel_id` INT NULL,
  `hospitality_id` INT NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `contact_idx` (`contact_id` ASC),
  INDEX `hotel_idx` (`hotel_id` ASC),
  INDEX `event_idx` (`event_id` ASC),
  INDEX `company_idx` (`company_id` ASC),
  INDEX `hospitality_idx` (`hospitality_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aldadata`.`dates`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aldadata`.`dates` ;

CREATE TABLE IF NOT EXISTS `aldadata`.`dates` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datetime_start` DATETIME NULL,
  `datetime_end` DATETIME NULL,
  `type` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB
COMMENT = '		';


-- -----------------------------------------------------
-- Table `aldadata`.`events_dates_xref`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aldadata`.`events_dates_xref` ;

CREATE TABLE IF NOT EXISTS `aldadata`.`events_dates_xref` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `event_id` INT NOT NULL,
  `date_id` INT NOT NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `event_idx` (`event_id` ASC),
  INDEX `date_idx` (`date_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aldadata`.`tickets`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aldadata`.`tickets` ;

CREATE TABLE IF NOT EXISTS `aldadata`.`tickets` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NULL,
  `price` DECIMAL NULL,
  `currency` VARCHAR(5) NULL,
  `ticketscol` VARCHAR(45) NULL,
  `total_count` INT NULL,
  `sold_count` INT NULL,
  `notes` TEXT NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB
COMMENT = '		';


-- -----------------------------------------------------
-- Table `aldadata`.`events_tickets_xref`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aldadata`.`events_tickets_xref` ;

CREATE TABLE IF NOT EXISTS `aldadata`.`events_tickets_xref` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `event_id` INT NULL,
  `ticket_id` INT NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `event_idx` (`event_id` ASC),
  INDEX `ticket_idx` (`ticket_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aldadata`.`venues_contacts_xref`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aldadata`.`venues_contacts_xref` ;

CREATE TABLE IF NOT EXISTS `aldadata`.`venues_contacts_xref` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `venue_id` INT NOT NULL,
  `contact_id` INT NOT NULL,
  `relation` VARCHAR(45) NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `venue_idx` (`venue_id` ASC),
  INDEX `contact_idx` (`contact_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aldadata`.`comments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aldadata`.`comments` ;

CREATE TABLE IF NOT EXISTS `aldadata`.`comments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `object_tybe` VARCHAR(45) NOT NULL,
  `timestamp` TIMESTAMP NULL,
  `content` TEXT NULL,
  `author` VARCHAR(45) NULL,
  `user_id` INT NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



EOD;
 
		DB::unprepared($sql);
		echo $sql;
		echo 'Migration Complete';
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('countries');
		Schema::drop('adresses');
		Schema::drop('companies');
		Schema::drop('contact_types');
		Schema::drop('contacts');
		Schema::drop('companies_contacts_xref');
		Schema::drop('venues');
		Schema::drop('events');
		Schema::drop('airports');
		Schema::drop('hotels');
		Schema::drop('hospitality_details');
		Schema::drop('documents');
		Schema::drop('dates');
		Schema::drop('events_dates_xref');
		Schema::drop('tickets');
		Schema::drop('events_tickets_xref');
		Schema::drop('venues_contacts_xref');
		Schema::drop('comments');
	}

}

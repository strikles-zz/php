<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompaniesVenuesXrefTable extends Migration {

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
		-- Table `aldadata`.`companies_venues_xref`
		-- -----------------------------------------------------
		DROP TABLE IF EXISTS `aldadata`.`companies_venues_xref` ;

		CREATE TABLE IF NOT EXISTS `aldadata`.`companies_venues_xref` (
		  `id` INT(11) NOT NULL AUTO_INCREMENT,
		  `venue_id` INT NOT NULL,
		  `company_id` INT NOT NULL,
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
		Schema::drop('companies_venues_xref');
	}

}

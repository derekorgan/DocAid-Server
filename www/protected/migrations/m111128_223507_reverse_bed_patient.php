<?php

class m111128_223507_reverse_bed_patient extends CDbMigration
{
	public function up()
	{
	
		$this->dropForeignKey('fk_bed_patient1', 'bed');
		$this->dropColumn('bed', 'patient_id');
		$this->addColumn('patient', 'bed_id', 'int(11)');
		$this->addForeignKey('fk_patient_bed1', 'patient', 'bed_id', 'bed', 'id', 'NO ACTION', 'NO ACTION');

	}

	public function down()
	{
		echo "m111128_223507_reverse_bed_patient does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
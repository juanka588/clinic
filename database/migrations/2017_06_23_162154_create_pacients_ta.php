<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientsTa extends Migration {

    public static $TABLE_NAME = "pacient";
    public static $COLUMNS = array(
        "n_documento", "full_name", "last_name", "doc_type", "gender"
        , "birthdate", "scholar_level", "phone", "address", "family_past"
        , "medical_past", "surgical_past", "allergy_past", "toxic_past"
        , "traumatic_past", "immunological_past", "menarquia", "cycles"
        , "gestacion", "partos", "abortos", "ectopicos", "cesarias", "fur", "pf"
    );

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create(CreatePacientsTa::$TABLE_NAME, function(Blueprint $table) {
            $table->primary(CreatePacientsTa::$COLUMNS[0]);
            $table->string(CreatePacientsTa::$COLUMNS[0], 15);
            $table->string(CreatePacientsTa::$COLUMNS[1], 30);
            $table->string(CreatePacientsTa::$COLUMNS[2], 30);
            $table->enum(CreatePacientsTa::$COLUMNS[3], ["Cedula de Ciudadania", "Tarjeta de Identidad", "Cedula de Extranjeria"]);
            $table->enum(CreatePacientsTa::$COLUMNS[4], ["Masculino", "Femenino"]);
            $table->date(CreatePacientsTa::$COLUMNS[5]);
            $table->enum(CreatePacientsTa::$COLUMNS[6], ["Analfabeta", "Basica", "Media", "Profesional", "Posgrado"]);
            $table->string(CreatePacientsTa::$COLUMNS[7], 10);
            $table->string(CreatePacientsTa::$COLUMNS[8], 30);
            $table->text(CreatePacientsTa::$COLUMNS[9]);
            $table->text(CreatePacientsTa::$COLUMNS[10]);
            $table->text(CreatePacientsTa::$COLUMNS[11]);
            $table->text(CreatePacientsTa::$COLUMNS[12]);
            $table->text(CreatePacientsTa::$COLUMNS[13]);
            $table->text(CreatePacientsTa::$COLUMNS[14]);
            $table->text(CreatePacientsTa::$COLUMNS[15]);
            $table->integer(CreatePacientsTa::$COLUMNS[16])->nullable();
            $table->string(CreatePacientsTa::$COLUMNS[17], 20)->nullable();
            $table->integer(CreatePacientsTa::$COLUMNS[18])->nullable();
            $table->integer(CreatePacientsTa::$COLUMNS[19])->nullable();
            $table->integer(CreatePacientsTa::$COLUMNS[20])->nullable();
            $table->integer(CreatePacientsTa::$COLUMNS[21])->nullable();
            $table->integer(CreatePacientsTa::$COLUMNS[22])->nullable();
            $table->date(CreatePacientsTa::$COLUMNS[23])->nullable();
            $table->text(CreatePacientsTa::$COLUMNS[24]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop(CreatePacientsTa::$TABLE_NAME);
    }

}

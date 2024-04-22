<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        
        DB::table('regions')->insert(
            [
                ['name' => 'Vinnytsia Oblast'],
                ['name' => 'Volyn Oblast'],
                ['name' => 'Dnipropetrovsk Oblast'],
                ['name' => 'Donetsk Oblast'],
                ['name' => 'Zhytomyr Oblast'],
                ['name' => 'Zakarpattia Oblast'],
                ['name' => 'Zaporizhzhia Oblast'],
                ['name' => 'Ivano-Frankivsk Oblast'],
                ['name' => 'Kyiv Oblast'],
                ['name' => 'Kirovohrad Oblast'],
                ['name' => 'Luhansk Oblast'],
                ['name' => 'Lviv Oblast'],
                ['name' => 'Mykolaiv Oblast'],
                ['name' => 'Odessa Oblast'],
                ['name' => 'Poltava Oblast'],
                ['name' => 'Rivne Oblast'],
                ['name' => 'Sumy Oblast'],
                ['name' => 'Ternopil Oblast'],
                ['name' => 'Kharkiv Oblast'],
                ['name' => 'Kherson Oblast'],
                ['name' => 'Khmelnytskyi Oblast'],
                ['name' => 'Cherkasy Oblast'],
                ['name' => 'Chernivtsi Oblast'],
                ['name' => 'Chernihiv Oblast'],
                ['name' => 'Crimea']
            ],
        );
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regions');
    }
};

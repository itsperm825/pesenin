<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use CrudTrait;
    //
    public function up(): void
{
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Kolom untuk nama kategori
        $table->string('slug')->unique(); // Kolom untuk URL-friendly
        $table->timestamps(); // Kolom created_at dan updated_at
    });
}
}

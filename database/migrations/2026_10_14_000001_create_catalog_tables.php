<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
return new class extends Migration {
 public function up(): void { Schema::create('category', function(Blueprint $t){$t->uuid('id')->primary();$t->string('name',120)->unique();});
  Schema::create('book',function(Blueprint $t){$t->uuid('id')->primary();$t->string('title',250);$t->string('author',200);$t->char('isbn',13);$t->uuid('category_id');$t->integer('total_copies');$t->integer('available_copies');$t->integer('version');$t->string('cover_key',512)->nullable();$t->timestampTz('deleted_at')->nullable();$t->foreign('category_id')->references('id')->on('category')->restrictOnDelete();$t->check('total_copies >= 1','ck_book_total_positive');$t->check('available_copies >= 0 AND available_copies <= total_copies','ck_book_available_range');$t->check('version >= 0','ck_book_version_nonnegative');});
  DB::statement('CREATE UNIQUE INDEX uq_book_isbn_active ON book (isbn) WHERE deleted_at IS NULL');
  Schema::create('member',function(Blueprint $t){$t->uuid('id')->primary();$t->string('full_name',200);$t->string('document_number',30)->unique();});
  foreach ([['00000000-0000-0000-0000-000000000001','Novela'],['00000000-0000-0000-0000-000000000002','Ciencia'],['00000000-0000-0000-0000-000000000003','Historia'],['00000000-0000-0000-0000-000000000004','Infantil'],['00000000-0000-0000-0000-000000000005','Poesía']] as $c) DB::table('category')->insert(['id'=>$c[0],'name'=>$c[1]]);
 }
 public function down(): void { Schema::dropIfExists('book');Schema::dropIfExists('member');Schema::dropIfExists('category'); }
};

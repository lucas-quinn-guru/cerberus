<?php echo '<?php' . "\n"; ?>

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CerberusSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::beginTransaction();

        // Create table for storing roles
        Schema::create('{{ $rolesTable }}', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softdeletes();
        });

        // Create table for associating roles to users (Many-to-Many)
        Schema::create('roleables', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->morphs("roleable");
            $table->timestamps();
            $table->softdeletes();
        });

        // Create table for storing permissions
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softdeletes();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('permissionables', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned();
            $table->morphs("permissionable");
            $table->timestamps();
            $table->softdeletes();
        });

        DB::commit();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('{{ $permissionRoleTable }}');
        Schema::drop('{{ $permissionsTable }}');
        Schema::drop('{{ $roleUserTable }}');
        Schema::drop('{{ $rolesTable }}');
    }
}

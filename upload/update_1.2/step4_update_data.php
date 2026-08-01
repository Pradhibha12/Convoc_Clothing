use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

if(DB::table('settings')->where('type', 'vendor_revenue')->count() == 0){
DB::table('settings')->insert(['type' => 'vendor_revenue', 'description' => 70 ,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);
}
// payments table
Schema::table('payments', function (Blueprint $table) {
    if (!Schema::hasColumn('payments', 'admin_revenue')) {
        $table->string('admin_revenue')->nullable();
    }

    if (!Schema::hasColumn('payments', 'vendor_revenue')) {
        $table->string('vendor_revenue')->nullable();
    }
});

// stores table
Schema::table('stores', function (Blueprint $table) {
    if (!Schema::hasColumn('stores', 'admin_revenue')) {
        $table->string('admin_revenue')->nullable();
    }

    if (!Schema::hasColumn('stores', 'vendor_revenue')) {
        $table->string('vendor_revenue')->nullable();
    }
});

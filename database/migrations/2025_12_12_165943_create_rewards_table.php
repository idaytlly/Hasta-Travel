use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rewards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id'); // FK to customers
            $table->unsignedBigInteger('booking_id')->nullable(); // FK to booking, optional
            $table->integer('stamps')->default(0); // Number of loyalty stamps earned
            $table->string('reward_type')->nullable(); // e.g., free hours, discount
            $table->timestamps();

            // Foreign keys
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rewards');
    }
};

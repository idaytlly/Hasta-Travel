public function up()
{
    Schema::create('memberships', function (Blueprint $table) {
        $table->id(); // Primary key, auto-increment
        $table->string('name'); // Member's name
        $table->string('email')->unique(); // Member's email
        $table->string('membership_type'); // Type: Bronze, Silver, Gold, etc.
        $table->date('start_date'); // Membership start
        $table->date('end_date')->nullable(); // Membership end (optional)
        $table->timestamps(); // created_at & updated_at
    });
}

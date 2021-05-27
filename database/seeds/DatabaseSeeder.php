<?php

use App\User;
use Illuminate\Database\Seeder;
use PharIo\Manifest\Email;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AccountsSeeder::class);
        $this->call(AdjustmentsSeeder::class);
        $this->call(BySeeder::class);
        $this->call(ChartaccountSeeder::class);
        $this->call(InvoicesSeeder::class);
        $this->call(PaymentsSeeder::class);
        $this->call(ReceiptsSeeder::class);
        $this->call(RecordsSeeder::class);
        $this->call(SubaccountsSeeder::class);
        // $this->call(PhieuMuaHangTableSeeder::class);
        // $this->call(MatHangTableSeeder::class);
        $this->call(TaiKhoanTableSeeder::class);
        $this->call(ViTriTableSeeder::class);
        $this->call(NhanVienTableSeeder::class);
        // $this->call(PhieuNhapKhoSeeder::class);

        User::create([
            'name' => 'admin',
            'password' => bcrypt('101'),
            'email' => 'admin@example.com'
        ]);

        User::create([
            'name' => 'me',
            'password' => bcrypt('password'),
            'email' => 'me@example.com'
        ]);
    }
}

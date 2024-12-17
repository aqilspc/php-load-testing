<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Carbon\Carbon;
class emailScan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send:email-scan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email after scan';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $ws = DB::table('scan')->where('status',1)->where('email',0)->first();
        if($ws)
        {
            require base_path("vendor/autoload.php");
            $mail = new PHPMailer(true);   
            try {
                $data = DB::table('peserta')->where('kode',$ws->kode)->first();
                // Email server settings
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';             //  smtp host
                $mail->SMTPAuth = true;
                $mail->Username = 'sertifikat@infowebinar.net';   //  sender username
                $mail->Password = 'duih uxvt nubn eyyd';       // sender password
                $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
                $mail->Port = 587;                          // port - 587/465
                $mail->From = 'sertifikat@infowebinar.net';
                $mail->FromName = 'Clipedia Symposium & Workshop';
                //$mail->setFrom('sertifikat@infowebinar.net', 'Rosacea Awareness Month Indonesia 2024');
                $mail->addAddress($data->email);
                // $mail->addCC($data->email);
                // $mail->addBCC($data->email);
     
                $mail->addReplyTo('sertifikat@infowebinar.net', 'Clipedia Symposium & Workshop');
     
                $mail->isHTML(true);                // Set email content format to HTML
     
                $mail->Subject = 'Terimakasih Telah Daftar Ulang '.$ws->ws.' Clipedia Symposium & Workshop';
                $mail->Body    = view('web.email_scan', ['data' => $data, 'ws'=> $ws])->render();
     
                if( !$mail->send() ) {
                   // DB::table('peserta')->where('id',$insertId)->delete();
                    //$this->info("error", "Terjadi kesalahan sistem sekarang ini");
                    DB::table('jobs_email')->insert([
                        'email' => $data->email,
                        'log' =>  "Terjadi kesalahan sistem sekarang ini ".Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s')." "
                    ]);
                }else {
                    //$this->info("success", "Terima kasih telah mendaftar! <br> Pendaftaran akan segera diverifikasi oleh panitia, dan pesan konfirmasi akan segera dikirimkan via email.");
                    DB::table('jobs_email')->insert([
                        'email' => $data->email,
                        'log' =>  "Terima kasih telah scan! . ".Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s')." "
                    ]);
                    DB::table('scan')->where('kode',$data->kode)->where('ws',$ws->ws)->update(['email'=>1]);
                }
     
            } catch (Exception $e) {
                 //DB::table('peserta')->where('id',$insertId)->delete();
                 //$this->info("error", "Terjadi kesalahan sistem ".$e->getMessage()." ");
                 DB::table('jobs_email')->insert([
                        'email' => $data->email,
                        'log' =>  "Terjadi kesalahan sistem ".$e->getMessage()." - ".Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s')." "
                    ]);
            }
        }else{
            $this->info('nothing');
        }
    }
}

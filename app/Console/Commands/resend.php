<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use DB;
class resend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:resend';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $oke = 0;
        $get = DB::table('peserta')->where('resend',2)->select('id')->limit(15)->get();
        foreach ($get as $key => $value) 
        {
            DB::table('peserta')->where('id',$id)->update(['resend'=>1]);
            $id = $value->id;
            $data = DB::table('peserta')->where('id',$id)->first();
            require base_path("vendor/autoload.php");
            $mail = new PHPMailer(true);     // Passing `true` enables exceptions
            try {
     
                // Email server settings
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';             //  smtp host
                $mail->SMTPAuth = true;
                $mail->Username = 'update@infowebinar.net';   //  sender username
                $mail->Password = 'yistlrpehokumbkg';       // sender password
                $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
                $mail->Port = 587;                          // port - 587/465
     
                $mail->setFrom('info@dermnotes.my.id', 'DERMNOTES 1.0 INFORMATION');
                $mail->addAddress($data->email);
                $mail->addCC($data->email);
                $mail->addBCC($data->email);
     
                $mail->addReplyTo('info@dermnotes.my.id', 'DERMNOTES 1.0 INFORMATION');
     
                $mail->isHTML(true);                // Set email content format to HTML
     
                $mail->Subject = 'DERMNOTES 1.0 - Reminder Event';
                $mail->Body    = view('web.reminder', ['data' => $data])->render();
     
                // $mail->AltBody = plain text version of email body;
     
                if( !$mail->send() ) {
                    return 'gagal';
                    //dd($mail->ErrorInfo);
                }
                
                else {
                    $oke++;
                    return 'oke';
                }
     
            } catch (Exception $e) {
                 return $e;
            }


        }
        $this->info($oke);   
    }
}

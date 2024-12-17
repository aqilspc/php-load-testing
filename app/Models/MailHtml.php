<?php

namespace App\Models;

class MailHtml 
{
	public function lunasReceipt($data)
	{
		$html = '
			
				      <table style="width:100%;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px rgba(3,74,166,1);">
				         <thead>
				            <tr style="">
				               <td style="text-align:left;padding:15px;vertical-align: middle;"><img style="max-width: 300px;" 
				                  src="'.url('/gabung.png').'"></td>
				               <td style="text-align:right;font-weight:400;color:black;padding:15px;text-decoration: none;">
				                  <a href="'.url('/').'" style="color:black;">'.url('/').'</a></td>
				            </tr>
				         </thead>
				         <tbody>
				            <tr>
				               <td style="height:35px;"></td>
				            </tr>
				            
				            <tr>
				               <td style="border-bottom: 1px solid #000; width:50%;padding:20px;vertical-align:top">
				                  <p style="font-size:14px;margin:0 0 6px 0;">
				                     <span style="font-weight:bold;display:block;min-width:146px">Transaction ID</span> '.$data->kode.'</p>
				               </td>
				               <td style="border-bottom: 1px solid #000;width:50%;padding:20px;vertical-align:top">
				                  <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:block;min-width:146px">Order amount</span> <b>'.$data->price.'</b></p>
				               </td>
				            </tr>
				            <tr>
				               <td style="width:50%;padding:20px;vertical-align:top">
				                  <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Nama</span> '.$data->nama.'</p>
				                  <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Email</span> '.$data->email.'</p>
				                  <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Telp</span> '.$data->wa.'</p>
				               </td>
				               <td style="width:50%;padding:20px;vertical-align:top">

				                  <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Occupation</span> '.$data->occupation.'</p>
				                  <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">PC</span> '.$data->pc.'</p>
				               </td>
				            </tr>
				         </tbody>
				      </table>
				   ';
		return $html;
	}
}
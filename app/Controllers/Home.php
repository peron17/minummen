<?php namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Home extends BaseController
{
	public function index()
	{
		return view('index');
	}

	public function form()
	{
		return view('form');
	}

	public function store()
	{
		$request = $this->request->getPost();

		$mail = new PHPMailer(true);

		$to = getenv('ENVIRONMENT')==='dev' ? 'tommypriambodo@gmail.com' : getenv('MAIL_TO');
		$from = getenv('MAIL_FROM');
		$host = getenv('MAIL_HOST');
		$username = getenv('MAIL_USERNAME');
		$password = getenv('MAIL_PASSWORD');
		$port = getenv('MAIL_PORT');

		$subject = 'Pendaftaran Mitra Minummen Thaitea';
		$message = '
		<table border="1" cellpadding="10px" style="width:100%;">
			<tr>
				<th width="40%">Tanggal Pendaftaran</th>
				<td width="60%">'.date('d M Y').'</td>
			</tr>
			<tr>
				<th>Nama</th>
				<td>'.$request['nama'].'</td>
			</tr>
			<tr>
				<th>Usia</th>
				<td>'.$request['usia'].'</td>
			</tr>
			<tr>
				<th>Pekerjaan Saat Ini</th>
				<td>'.$request['pekerjaan'].'</td>
			</tr>
			<tr>
				<th>Alamat sesuai KTP</th>
				<td>'.$request['alamat'].'</td>
			</tr>
			<tr>
				<th>Alamat domisili</th>
				<td>'.$request['domisili'].'</td>
			</tr>
			<tr>
				<th>No. HP</th>
				<td>'.$request['hp'].'</td>
			</tr>
			<tr>
				<th>Email</th>
				<td>'.$request['email'].'</td>
			</tr>
			<tr>
				<th>Instagram</th>
				<td>'.$request['instagram'].'</td>
			</tr>
			<tr>
				<th>Facebook</th>
				<td>'.$request['facebook'].'</td>
			</tr>
			<tr>
				<th>Tempat Rencana Usaha</th>
				<td>'.$request['tempat_usaha'].'</td>
			</tr>
			<tr>
				<th>Apa yang membuat anda tertarik dengan Minummen Thai Tea ?</th>
				<td>'.$request['reason_1'].'</td>
			</tr>
			<tr>
				<th>Bagaimana komentar anda tentang untung-rugi dalam bisnis?</th>
				<td>'.$request['reason_2'].'</td>
			</tr>
			<tr>
				<th>Apakah anda siap mengeluarkan dana kemitraan sekitar Rp 25.000.000? (exclude biaya pengiriman, include booth dan semua bahan baku serta peralatan)</th>
				<td>'.$request['reason_3'].'</td>
			</tr>
		</table>
		';
		try {
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = $host;   
            $mail->SMTPAuth   = true;
            $mail->Username   = $username; // silahkan ganti dengan alamat email Anda
            $mail->Password   = $password; // silahkan ganti dengan password email Anda
            $mail->SMTPSecure = 'ssl';
			$mail->Port       = $port;
			$mail->isHTML(true);
			
            $mail->setFrom($from, 'Website Minummen Thaitea'); // silahkan ganti dengan alamat email Anda
            $mail->addAddress($to);
            // $mail->addReplyTo($from, 'Website Minummen Thaitea'); // silahkan ganti dengan alamat email Anda
            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;
			
            $mail->send();
            session()->setFlashdata('success', 'Send Email successfully');
            return redirect()->to('/form'); 
        } catch (Exception $e) {
            session()->setFlashdata('error', "Send Email failed. Error: ".$mail->ErrorInfo);
            return redirect()->to('/form');
        }
	}

	public function test()
	{
		session()->setFlashdata('error', 'Send Email successfully');
		return redirect()->to('/form'); 
	}

	//--------------------------------------------------------------------

}

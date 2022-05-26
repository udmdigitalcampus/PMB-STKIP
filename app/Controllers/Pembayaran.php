<?php

namespace App\Controllers;

use App\Models\PembayaranModel;
use CodeIgniter\API\ResponseTrait;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Snap;
use CURLFile;

class Pembayaran extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        $this->token = "5100930773:AAHkdWUTVWoK9AGd84fF0NweH9h5NX2aTQc";
        $this->chatid = "-1001799760040";

        $this->midtransConfig = new Config;
        $this->midtransSnap = new Snap;
        $this->pembayaranModel = new PembayaranModel();
    }

    public function sendMessage($teks = null)
    {
        $method = "sendMessage";
        $url = "https://api.telegram.org/bot" . $this->token . "/" . $method;
        $pesan = "Notifikasi Pembayaran Registrasi PMB STKIP NU Indramayu\n\n" . $teks;

        $post = [
            'chat_id' => $this->chatid,
            // 'parse_mode' => 'HTML', // aktifkan ini jika ingin menggunakan format type HTML, bisa juga diganti menjadi Markdown
            'text' => $pesan,
        ];

        $header = [
            "X-Requested-With: XMLHttpRequest",
            "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36",
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $datas = curl_exec($ch);
        $error = curl_error($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    }

    public function index()
    {
        $transaction_details = array(
            'order_id' => 'PMB' . Date('Ymdhms') . user_id(),
            "gross_amount" => 200000,
        );

        // Optional
        $item1_details = array(
            'id' => 'a1',
            'price' => 200000,
            'quantity' => 1,
            'name' => "Pendaftaran PMB"
        );

        // Optional
        $item_details = array($item1_details);

        // Optional
        $customer_details = array(
            'first_name'     => user()->username,
            'email'         => user()->email,
        );

        // Optional, remove this to display all available payment methods
        // $enable_payments = array('credit_card', 'cimb_clicks', 'mandiri_clickpay', 'echannel');

        // Fill transaction details
        $transaction = array(
            // 'enabled_payments' => $enable_payments,
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        );

        try {
            $snap_token = $this->midtransSnap->getSnapToken($transaction);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }


        if ($post = $this->pembayaranModel->where('user_id', user_id())->get()->getRow()) {
            $status = $post->status;
            $pdf = $post->pdf_link;
        } else {
            $status = null;
            $pdf = null;
        }

        $data = [
            'status_bayar' => $status,
            'pdf_link' => $pdf,
            'clientKey' => $this->midtransConfig::$clientKey,
            'baseurl' => $this->midtransConfig->getSnapBaseUrl(),
            'snap_token' => $snap_token,
            'profil' => $this->userModel->join('profil', 'profil.user_id = users.id')->find(user_id()),
            'title_meta' => view('panel/partials/title-meta', ['title' => 'Pembayaran']),
            'page_title' => view('panel/partials/page-title', ['title' => 'Pembayaran', 'li_1' => 'PMB STKIP NU INDRAMAYU', 'li_2' => 'Pembayaran']),
        ];
        // dd($data);
        return view('panel/pembayaran', $data);
    }

    public function add()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();
            if ($this->pembayaranModel->where('order_id', $this->request->getPost('order_id'))->countAllResults() > 0) {
                $post = $this->pembayaranModel->where('order_id', $this->request->getPost('order_id'))->get()->getRow();
                if ($post->status == "settlement") {
                    $data = array('success' => 'Berhasil menginput data pembayaran');
                    $data[$csrfname] = $csrfhash;
                    return $this->response->setJSON($data);
                } else {
                    $data = [
                        'id' => $post->id,
                        'payment_type' => $this->request->getPost('payment_type'),
                        'gross_amount' => (int)$this->request->getPost('gross_amount'),
                        'pdf_link' => $this->request->getPost('pdf_link'),
                        'status' => $this->request->getPost('status'),
                        'bank' => $this->request->getPost('bank'),
                        'va_number' => $this->request->getPost('va_number'),
                    ];

                    $this->pembayaranModel->save($data);

                    $data = array('success' => 'Berhasil mengupdate data pembayaran');
                    $data[$csrfname] = $csrfhash;
                    return $this->response->setJSON($data);
                }
            }
            $data = [
                'user_id' => user_id(),
                'order_id' => $this->request->getPost('order_id'),
                'payment_type' => $this->request->getPost('payment_type'),
                'gross_amount' => (int)$this->request->getPost('gross_amount'),
                'pdf_link' => $this->request->getPost('pdf_link'),
                'status' => $this->request->getPost('status'),
                'bank' => $this->request->getPost('bank'),
                'va_number' => $this->request->getPost('va_number'),
            ];

            $this->pembayaranModel->save($data);

            $data = array('success' => 'Berhasil menginput data pembayaran');
            $data[$csrfname] = $csrfhash;
            return $this->response->setJSON($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function notifikasi()
    {
        $this->notifocation =  new Notification();
        try {
            $notif = $this->notifocation;
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        $notif = $notif->getResponse();
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;
        $status_code = $notif->status_code;
        $gross_amount = $notif->gross_amount;
        // $signature_key = $notif;
        $bank = $notif->va_numbers[0]->bank;
        $va_number = $notif->va_numbers[0]->va_number;
        // $verifikasi_key = hash('sha512', $order_id . $status_code . $gross_amount . $this->midtransConfig::$serverKey);
        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    echo "Transaction order_id: " . $order_id . " is challenged by FDS";
                } else {
                    // TODO set payment status in merchant's database to 'Success'
                    echo "Transaction order_id: " . $order_id . " successfully captured using " . $type;
                }
            }
        } else if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            if ($this->pembayaranModel->where('order_id', $order_id)->countAllResults() > 0) {
                $post = $this->pembayaranModel->where('order_id', $order_id)->get()->getRow();
                $data = [
                    'id' => $post->id,
                    'status' => $transaction,
                ];
            } else {
                $data = [
                    'user_id' => substr($order_id, 17, 4),
                    'order_id' => $order_id,
                    'payment_type' => $type,
                    'gross_amount' => (int)$gross_amount,
                    'pdf_link' => '',
                    'status' => $transaction,
                    'bank' => $bank,
                    'va_number' => $va_number,
                ];
            }

            if ($post = $this->pembayaranModel->save($data)) {
                $data = [
                    "error" => "false",
                    "status_code" => 201,
                    'message' => "Berhasil Mengupdate Data",
                ];
            } else {
                $data = [
                    "error" => "true",
                    "status_code" => 501,
                    'message' => "Gagal Mengupdate Data",
                ];
            }

            $this->sendMessage("Pembayaran PMB \nNomor Tagihan:" . $order_id . ", \nStatus:" . $transaction . "\n" . base_url());

            return $this->respond($data);
        } else if ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            if ($this->pembayaranModel->where('order_id', $order_id)->countAllResults() > 0) {
                $post = $this->pembayaranModel->where('order_id', $order_id)->get()->getRow();
                $data = [
                    'id' => $post->id,
                    'status' => $transaction,
                ];
            } else {
                $data = [
                    'user_id' => substr($order_id, 17, 4),
                    'order_id' => $order_id,
                    'payment_type' => $type,
                    'gross_amount' => (int)$gross_amount,
                    'pdf_link' => '',
                    'status' => $transaction,
                    'bank' => $bank,
                    'va_number' => $va_number,
                ];
            }

            if ($post = $this->pembayaranModel->save($data)) {
                $data = [
                    "error" => "false",
                    "status_code" => 201,
                    'message' => "Berhasil Mengupdate Data",
                ];
            } else {
                $data = [
                    "error" => "true",
                    "status_code" => 501,
                    'message' => "Gagal Mengupdate Data",
                ];
            }
            $this->sendMessage("Pembayaran PMB \nNomor Tagihan:" . $order_id . ", \nStatus:" . $transaction . "\n" . base_url());
            return $this->respond($data);
        } else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        } else if ($transaction == 'expire') {

            // if ($signature_key == $verifikasi_key) {
            $post = $this->pembayaranModel->where('order_id', $order_id)->get()->getRow();
            $id = $post->id;
            // } else {
            //     $post = $this->pembayaranModel->where('order_id', $order_id)->get()->getRow();

            //     $data = [
            //         'id' => $post->id,
            //         'status' => 'Anda Mencoba Melakukan Pelanggaran Hukum !!',
            //     ];
            // }

            if ($post = $this->pembayaranModel->delete($id)) {
                $data = [
                    "error" => "false",
                    "status_code" => 201,
                    'message' => "Berhasil Menghapus Data",
                ];
            } else {
                $data = [
                    "error" => "true",
                    "status_code" => 501,
                    'message' => "Gagal Menghapus Data",
                ];
            }

            $this->sendMessage("Pembayaran PMB \nNomor Tagihan:" . $order_id . ", \nStatus:" . $transaction . "\n" . base_url());

            return $this->respond($data);
        } else if ($transaction == 'cancel') {
            // if ($signature_key == $verifikasi_key) {
            $post = $this->pembayaranModel->where('order_id', $order_id)->get()->getRow();
            $id = $post->id;
            // } else {
            //     $post = $this->pembayaranModel->where('order_id', $order_id)->get()->getRow();

            //     $data = [
            //         'id' => $post->id,
            //         'status' => 'Anda Mencoba Melakukan Pelanggaran Hukum !!',
            //     ];
            // }

            if ($post = $this->pembayaranModel->delete($id)) {
                $data = [
                    "error" => "false",
                    "status_code" => 201,
                    'message' => "Berhasil Menghapus Data",
                ];
            } else {
                $data = [
                    "error" => "true",
                    "status_code" => 501,
                    'message' => "Gagal Menghapus Data",
                ];
            }

            $this->sendMessage("Pembayaran PMB \nNomor Tagihan:" . $order_id . ", \nStatus:" . $transaction . "\n" . base_url());

            return $this->respond($data);
        }
    }
}
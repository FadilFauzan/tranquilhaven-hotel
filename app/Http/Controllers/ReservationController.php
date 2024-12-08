<?php

namespace App\Http\Controllers;

require_once base_path('/midtrans-php-master/Midtrans.php');

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index(Room $room)
    {
        return view('reservation', [
            'title' => 'Form Confirmation',
            'active' => 'rooms',
            'room' => $room,
            'amount' => $room->price,
        ]);
    }
    public function processReservation(Request $request, Room $room)
    {
        $request->validate([
            'first_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $orderId = 'ORDER-' . uniqid();
        $grossAmount = $room->price * 16000;

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $grossAmount,
            ],
            'customer_details' => [
                'first_name' => $request->input('first_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
            ],
            'item_details' => [
                [
                    'id' => 'room-' . $room->id,
                    'name' => $room->title,
                    'quantity' => 1,
                    'price' => $grossAmount,
                ],
            ],
        ];

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            // Simpan transaksi ke database
            DB::table('transactions')->insert([
                'order_id' => $orderId,
                'room_id' => $room->id,
                'name' => $request->input('first_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'gross_amount' => $grossAmount,
                'status' => 'success',
                'created_at' => now(),
            ]);

            DB::table('rooms')
                ->where('id', $room->id)
                ->update(['status' => 'booked']);


            return view('reservation', [
                'title' => 'Form Confirmation',
                'active' => 'rooms',
                'room' => $room,
                'amount' => $room->price,
                'snapToken' => $snapToken,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }


    public function showReceipt($orderId)
    {
        // Ambil data transaksi berdasarkan order_id
        $transaction = DB::table('transactions')
            ->where('order_id', $orderId)
            ->first();

        if (!$transaction) {
            abort(404, 'Transaction not found');
        }

        // Ambil data room yang dipesan berdasarkan room_id yang ada di transaksi
        $room = Room::find($transaction->room_id);

        return view('receipt', [
            'title' => "Payment Receipt",
            'active' => "rooms",
            'transaction' => $transaction,
            'room' => $room,
        ]);
    }
}

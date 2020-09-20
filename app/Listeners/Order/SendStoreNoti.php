<?php

namespace App\Listeners\Order;

use App\Events\Order\OrderPaid;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use GuzzleHttp\Client;
use App\Models\User;

class SendStoreNoti
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderPaid  $event
     * @return void
     */
    public function handle($event)
    {
        $order = $event->order;

        try {

            $order->products->each(function($item){
                $this->send_noti($item->pivot->owner_id);
            });

        }catch(Exception $e){
            return false;
        }
    }

    protected function send_noti($id)
    {
        $user = User::find($id);

        if($user && !empty($user->gateway_customer_id)){

            (new Client())->post('https://fcm.googleapis.com/fcm/send', [
                'json' => [
                    "to" => $user->gateway_customer_id,
                    "notification" => [
                        "title" => "មានការបញ្ជាទិញទំនិញពីហាងរបស់អ្នក",
                        "sound" => "default"
                    ],
                    "data" => [
                        "title" => "E-Market Asia",
                        "click_action" => "FLUTTER_NOTIFICATION_CLICK",
                        
                    ]
                ],
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'key=AAAAGBWBz_E:APA91bHAGOxY7ydHCAwCCIMbdrHmnPDzSjo2tPH2QUJhz9GAzJvgW7mLQS4AtBbWiXrRPkOPGuWA1cfIPytu5TG34fGeB9bfjjVPr8W71d7eMWxuYYu96bpciZxjJ0PdkuUGT9WZf58e'
                ]
            ]);

        }

        
    }
}

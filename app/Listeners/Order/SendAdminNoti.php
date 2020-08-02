<?php

namespace App\Listeners\Order;

use App\Events\Order\OrderPaid;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use GuzzleHttp\Client;

class SendAdminNoti
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
    public function handle(OrderPaid $event)
    {
        $client = new Client();

        try {

            $request = $client->post('https://fcm.googleapis.com/fcm/send', [
                    'json' => [
                        "to" => "cuqcnTGfQEyd_Sm8qc39Z3:APA91bGJgEzCb276bu0P3yFwKx2a4ODy2J8IKsAevCv1GVsMdKj8bgrKo2xyFeHFa3wWv9s_nT526LV_V89lUAhfDbrqthk2gh_Hlg-SiUk_6s8m-QuTWBQP7ADbrkkinhc0GkpHKETr",
                        "notification" => [
                            "title" => "មានការទិញទំនិញពីហាងរបស់នាក់",
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
              
                // if($request->getStatusCode() == 200){
                //     return json_decode($request->getBody()->getContents());
                // }

        }catch(Exception $e){
            return false;
        }
    }
}
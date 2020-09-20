<?php

namespace App\Listeners\Order;

use App\Events\Order\OrderPaid;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use GuzzleHttp\Client;


use App\Models\User;

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
    public function handle($event)
    {
        $client = new Client();

        $notification = 'c-SO37tPwk6FvuvgLA9VRj:APA91bEHcAwb1SdZ8c9hDBj_G4AoBIAZTmYP4CB9NpM4ej3yZBV1GEM4LXL_sCCcEmH3AJ3Bw7P2XUTPcZmEoSM6HNFxQG5Nw_MEKpqa8oaAxvUM52cfNaELOCjWdll_QqySd4c220JC';

        $user = User::find(34);

        if($user){
            $notification = $user->gateway_customer_id;
        }

        try {

            $request = $client->post('https://fcm.googleapis.com/fcm/send', [
                    'json' => [
                        "to" => $notification,
                        "notification" => [
                            "title" => "មានការទិញទំនិញពីហាងរបស់អ្នក",
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

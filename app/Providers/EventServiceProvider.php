<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\Order\OrderCreated' => [
            'App\Listeners\Order\ProcessPayment',
            // 'App\Listeners\Order\EmptyCart',
        ],

        'App\Events\Order\OrderPaymentFailed' => [
            'App\Listeners\Order\MarkOrderPaymentFailed'
        ],

        'App\Events\Order\OrderCase\OrderPaid' => [
            'App\Listeners\Order\EmptyCart',
            'App\Listeners\Order\CreateTransaction',
            'App\Listeners\Order\MarkOrderProcessing',
            'App\Listeners\Order\CalculateComission',
            'App\Listeners\Order\EmptyCart',
            'App\Listeners\Order\SendStoreNoti',
            'App\Listeners\Order\SendAdminNoti',
        ],

        'App\Events\Order\OrderPaid' => [
            'App\Listeners\Order\CreateTransaction',
            'App\Listeners\Order\MarkOrderProcessing',
            'App\Listeners\Order\MakePaymentToOwner',
            'App\Listeners\Order\EmptyCart',
            'App\Listeners\Order\SendStoreNoti',
            'App\Listeners\Order\SendAdminNoti',
            'App\Listeners\Order\CalculateComission',
            'App\Listeners\Order\CheckAndActivate',
        ],

        'App\Events\Agent\AgentCreated' => [
            'App\Listeners\Agent\CreateAgentProfile',
        ],

        'App\Events\Agent\StoreCreated' => [
            'App\Listeners\Agent\CreateStoreProfile',
        ],
        'App\Events\Agent\TransferCreated' => [
            'App\Listeners\Payment\CreateTransaction',
            'App\Listeners\Payment\TransferFund',
            'App\Listeners\Payment\RemoveFund'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}

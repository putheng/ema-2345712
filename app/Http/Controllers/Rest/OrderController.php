<?php

namespace App\Http\Controllers\Rest;

use App\Cart\Cart;
use App\Events\Order\OrderCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderStoreRequest;
use App\Http\Resources\OrderResource;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

use GuzzleHttp\Client;


class OrderController extends Controller
{
    protected $cart;

    public function __construct()
    {
        $this->middleware(['auth:api']);
        $this->middleware(['cart.sync', 'cart.isnotempty'])->only('store');
    }

    public function index(Request $request)
    {
        $orders = auth('api')->user()->orders()
            ->with([
                'products',
                'products.stock',
                'products.type',
                'products.product',
                'products.product.variations',
                'products.product.variations.stock',
                'address',
                'shippingMethod'
            ])
            ->latest()
            ->paginate(10);

        return OrderResource::collection($orders);
    }

    public function store(OrderStoreRequest $request, Cart $cart)
    {
        $order = $this->createOrder($request, $cart);

        $total = $cart->withShipping($order->shipping_method_id)->total()->unformattedCart();

        $order->products()->sync($cart->products()->forSyncing());

        // event(new OrderCreated($order));

        if($response = $this->sendPayment($order, $total)){
            return (new OrderResource($order)
            )->additional([
                'payment_url' => url('api/v1/content?url=') . $response->data->payment_url 
            ]);
        }
    }

    protected function sendPayment($order, $total)
    {
        $client = new Client();

        $data = [
            "customer_email" => auth('api')->user()->email,
            "description" => "",
            "customer_phone" => auth('api')->user()->phone,
            "pay_later_url" => "https://emarketasia.com/cart/checkout/redirect",
            "currency" => get_currency()->current(),
            "reference_id" => $order->uuid,
            "customer_name" => auth('api')->user()->name,
            "language" => "km",
            "cancel_url" => "https://emarketasia.com/cart/checkout/redirect",
            "amount" => $total,
            "webview" => false,
            "callback_url" => "https://emarketasia.com/cart/checkout/redirect"
        ];
   
        try {

            $request = $client->post(env('B24_API'), [
                'json' => $data,
                'headers' => [
                    // 'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'token' => env('B24_KEY')
                ]
            ]);
          
            if($request->getStatusCode() == 200){
                return json_decode($request->getBody()->getContents());
            }
        }catch(Exception $e){
            return false;
        }

    }

    protected function createOrder(Request $request, Cart $cart)
    {
        return auth('api')->user()->orders()->create(
            array_merge($request->only(['address_id', 'shipping_method_id', 'payment_method_id']), [
                'subtotal' => $cart->subtotal()->amount()
            ])
        );
    }
}

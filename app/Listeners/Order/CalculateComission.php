<?php

namespace App\Listeners\Order;

use App\Models\User;
use App\Models\Agent;
use App\Models\Track;
use App\Models\TopSale;
use App\Events\Order\OrderPaid;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CalculateComission
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
        $order = $event->order;
        $remain_earning = 0;
        $calcul = array();

        $order->products->each(function($variation) use ($remain_earning, $order, $calcul){
            $commission = $variation->commission;

            $shared_rate = (int) syt_option('society_commission')->cal_value;

            $shared = ($shared_rate / 100) * $commission;
            $company_earning = $commission - $shared;
            
            $calcul['comission'] = $commission;
            $calcul['share'] = $shared;
            $calcul['company'] = $company_earning;

            if(auth()->user()->type == 'society'){
                $top_sale = $this->top_sale($shared);

                $remain_earning = $shared - $top_sale;

                $calcul['top_sale'] = $top_sale;

                $cash_back = $this->cash_back($remain_earning, $order);

                $calcul['cash_back'] = $cash_back;

                $remain_earning = ($remain_earning - $cash_back);

                $sponsor = $this->sponsor($remain_earning, $order);

                $remain_earning = ($remain_earning - $sponsor);

                $calcul['sponsor'] = $sponsor;

                $society = $this->society($remain_earning, $order);

                // $remain_earning = ($remain_earning + $society);

                $calcul['remain'] = $remain_earning;

            }
            
            $this->company_sale($company_earning, $order);

        });
        
    }

    protected function society($commission, $order)
    {
        $agent = auth()->user()->agent;
        
        $rate = 3;
        $amount = ($rate / 100) * $commission;

        if($agent->parentx && $agent->parent_id != null){

            $amount = $this->placement($agent->parentx, $commission, $order);
        }
    }

    protected function placement($agent, $commission, $order)
    {
        $user = User::find($agent->user_id);
        $rate = 3;
        $amount = ($rate / 100) * $commission;

        $remain = $commission - $amount;

if($user){
$user->increment('earning', $amount);

$this->saveTracking($amount, $user, $order);

if($user->agent && $user->agent->parent_id != null){
    $userb = $user->agent->parentx->user;

    $userb->increment('earning', $amount);
    $this->saveTracking($amount, $userb, $order);
    $remain = $remain - $amount;

    if($userb->agent && $userb->agent->parent_id != null){
        $userc = $userb->agent->parentx->user;
        // dump(2);
        $userc->increment('earning', $amount);
        $this->saveTracking($amount, $userc, $order);
        $remain = $remain - $amount;

        if($userc->agent && $userc->agent->parent_id != null){
            $userd = $userc->agent->parentx->user;
            // dump(3);
            $userd->increment('earning', $amount);
            $this->saveTracking($amount, $userd, $order);
            $remain = $remain - $amount;

            if($userd->agent && $userd->agent->parent_id != null){
                $usere = $userd->agent->parentx->user;
                // dump(4);
                $usere->increment('earning', $amount);
                $this->saveTracking($amount, $usere, $order);
                $remain = $remain - $amount;

                if($usere->agent && $usere->agent->parent_id != null){
                    $userf = $usere->agent->parentx->user;
                    // dump(5);
                    $userf->increment('earning', $amount);
                    $this->saveTracking($amount, $userf, $order);
                    $remain = $remain - $amount;

                    if($userf->agent && $userf->agent->parent_id != null){
                        $userg = $userf->agent->parentx->user;
                        // dump(6);
                        $userg->increment('earning', $amount);
                        $this->saveTracking($amount, $userg, $order);
                        $remain = $remain - $amount;

                        if($userg->agent && $userg->agent->parent_id != null){
                            $userh = $userg->agent->parentx->user;
                            // dump(7);
                            $userh->increment('earning', $amount);
                            $this->saveTracking($amount, $userh, $order);
                            $remain = $remain - $amount;

                            if($userh->agent && $userh->agent->parent_id != null){
                                $useri = $userh->agent->parentx->user;
                                // dump(8);
                                $useri->increment('earning', $amount);
                                $this->saveTracking($amount, $useri, $order);
                                $remain = $remain - $amount;

                                if($useri->agent && $useri->agent->parent_id != null){
                                    $userj = $useri->agent->parentx->user;
                                    // dump(9);
                                    $userj->increment('earning', $amount);
                                    $this->saveTracking($amount, $userj, $order);
                                    $remain = $remain - $amount;

                                    if($userj->agent && $userj->agent->parent_id != null){
                                        $userk = $userj->agent->parentx->user;
                                        // dump(10);
                                        $userk->increment('earning', $amount);
                                        $this->saveTracking($amount, $userk, $order);
                                        $remain = $remain - $amount;

                                        if($userk->agent && $userk->agent->parent_id != null){
                                            $userl = $userk->agent->parentx->user;
                                            // dump(11);
                                            $userl->increment('earning', $amount);
                                            $this->saveTracking($amount, $userl, $order);
                                            $remain = $remain - $amount;

                                            
                                            if($userk->agent && $userk->agent->parent_id != null){
                                                $userm = $userk->agent->parentx->user;
                                                // dump(12);
                                                $userm->increment('earning', $amount);
                                                $this->saveTracking($amount, $userm, $order);
                                                $remain = $remain - $amount;

                                                if($userm->agent && $userm->agent->parent_id != null){
                                                    $usern = $userm->agent->parentx->user;
                                                    // dump(13);
                                                    $usern->increment('earning', $amount);
                                                    $this->saveTracking($amount, $usern, $order);
                                                    $remain = $remain - $amount;

                                                    if($usern->agent && $usern->agent->parent_id != null){
                                                        $usero = $usern->agent->parentx->user;
                                                        // dump(14);
                                                        $usero->increment('earning', $amount);
                                                        $this->saveTracking($amount, $usero, $order);
                                                        $remain = $remain - $amount;

                                                        if($usero->agent && $usero->agent->parent_id != null){
                                                            $userp = $usero->agent->parentx->user;
                                                            // dump(15);
                                                            $userp->increment('earning', $amount);
                                                            $this->saveTracking($amount, $userp, $order);
                                                            $remain = $remain - $amount;

                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

}

}
    return $remain;

    }

    protected function saveTracking($amount, $user, $order)
    {
        $track = new Track;
        $track->symbol = '+ Sponsor commission';
        $track->value = $amount;
        $track->user()->associate($user);

        $order->track()->save($track);
    }

    protected function sponsor($commission, $order)
    {
        $user = auth()->user();

        if($user->agent && $user->agent->sponsor_id != null){
            $sponsor = User::find($user->agent->sponsor_id);
            $rate = (int) syt_option('sponsor_commission')->cal_value;
            $amount = ($rate / 100) * $commission;

            if($sponsor){
                $sponsor->increment('earning', $amount);

                $track = new Track;
                $track->symbol = '+ Sponsor commission';
                $track->value = $amount;
                $track->user()->associate($sponsor);

                $order->track()->save($track);
            }

            return $amount;
        }
    }

    protected function cash_back($commission, $order)
    {
        $rate = (int) syt_option('cash_back')->cal_value;
        $amount = ($rate / 100) * $commission;

        $user = auth()->user();

        if($user){
            $user->increment('earning', $amount);

            $track = new Track;
            $track->symbol = '+ Cash back';
            $track->value = $amount;
            $track->user()->associate($user);

            $order->track()->save($track);
        }

        return $amount;
    }

    protected function company_sale($amount, $order)
    {
        $id = (int) syt_option('admin_id')->cal_value;

        $user = User::find($id);

        if($user){
            $user->increment('earning', $amount);

            $track = new Track;
            $track->symbol = '+';
            $track->value = $amount;
            $track->user()->associate($user);

            $order->track()->save($track);
        }

        return $amount;
    }

    protected function top_sale($commission)
    {
        $rate = (int) syt_option('top_sale')->cal_value;

        $amount = ($rate / 100) * $commission;

        $top = TopSale::addTopSale($amount);

        $track = new Track;
        $track->symbol = '- Top sale';
        $track->value = $amount;
        $track->user()->associate(auth()->user());

        $top->track()->save($track);

        return $amount;
    }


}

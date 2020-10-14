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
    public function handle($event)
    {
        $order = $event->order;

        $order->products->each(function($variation) use ($order){
            $commission = $variation->commission;
            $remain_earning = 0;
            $calcul = array();

            $company_rate = (int) syt_option('company_earning')->cal_value;
            $company_earning = ($company_rate / 100) * $commission; //ok

            
            $shared_rate = (int) syt_option('society_commission')->cal_value;
            
            $calcul['comission'] = $commission;
            
            $calcul['company'] = $company_earning;

            $top_sale = $this->top_sale($commission, $order->user); // ok
            $calcul['top_sale'] = $top_sale;
            $remain_earning = $commission - $top_sale;

            $store_sponsor = $this->store_sponsor($commission, $order); // ok
            $calcul['store_sponsor'] = $store_sponsor;
            $remain_earning = $remain_earning - $store_sponsor;

            $shared = ($shared_rate / 100) * $commission;

            if($order->user->type == 'society'){

                $calcul['share'] = $shared;

                $cash_back = $this->cash_back($shared, $order);

                $calcul['cash_back'] = $cash_back;

                $remain_earning = ($shared - $cash_back);

                $sponsor = $this->sponsor($shared, $order);

                $remain_earning = ($remain_earning - $sponsor);

                $calcul['sponsor'] = $sponsor;

                $society = $this->society($shared, $order, $remain_earning);

                // $remain_earning = ($remain_earning + $society);

                $calcul['remain'] = $remain_earning;

            }
            
            $this->company_sale($company_earning, $order);

            return $calcul;

        });
        
    }

    protected function society($commission, $order, $remain_earning)
    {
        $agent = $order->user->agent;
        
        $rate = 3;
        $amount = ($rate / 100) * $commission;

        if($agent->parentx && $agent->parent_id != null){

            $amount = $this->placement($agent->parentx, $commission, $order, $remain_earning);

        }

        return $amount;
    }

    protected function placement($agent, $commission, $order, $remain_earning)
    {
        $user = User::find($agent->user_id);

        $rate = 3;
        $amount = ($rate / 100) * $commission;

        $remain = $remain_earning - $amount;

if($user){
$user->incrementIncome('earning', $amount);

$this->saveTracking($amount, $user, $order);

if($user->agent && $user->agent->parent_id != null){
    $userb = $user->agent->parentx->user;

    $userb->incrementIncome('earning', $amount);
    $this->saveTracking($amount, $userb, $order);
    $remain = $remain - $amount;

    if($userb->agent && $userb->agent->parent_id != null){
        $userc = $userb->agent->parentx->user;
        // dump(2);
        $userc->incrementIncome('earning', $amount);
        $this->saveTracking($amount, $userc, $order);
        $remain = $remain - $amount;

        if($userc->agent && $userc->agent->parent_id != null){
            $userd = $userc->agent->parentx->user;
            // dump(3);
            $userd->incrementIncome('earning', $amount);
            $this->saveTracking($amount, $userd, $order);
            $remain = $remain - $amount;

            if($userd->agent && $userd->agent->parent_id != null){
                $usere = $userd->agent->parentx->user;
                // dump(4);
                $usere->incrementIncome('earning', $amount);
                $this->saveTracking($amount, $usere, $order);
                $remain = $remain - $amount;

                if($usere->agent && $usere->agent->parent_id != null){
                    $userf = $usere->agent->parentx->user;
                    // dump(5);
                    $userf->incrementIncome('earning', $amount);
                    $this->saveTracking($amount, $userf, $order);
                    $remain = $remain - $amount;

                    if($userf->agent && $userf->agent->parent_id != null){
                        $userg = $userf->agent->parentx->user;
                        // dump(6);
                        $userg->incrementIncome('earning', $amount);
                        $this->saveTracking($amount, $userg, $order);
                        $remain = $remain - $amount;

                        if($userg->agent && $userg->agent->parent_id != null){
                            $userh = $userg->agent->parentx->user;
                            // dump(7);
                            $userh->incrementIncome('earning', $amount);
                            $this->saveTracking($amount, $userh, $order);
                            $remain = $remain - $amount;

                            if($userh->agent && $userh->agent->parent_id != null){
                                $useri = $userh->agent->parentx->user;
                                // dump(8);
                                $useri->incrementIncome('earning', $amount);
                                $this->saveTracking($amount, $useri, $order);
                                $remain = $remain - $amount;

                                if($useri->agent && $useri->agent->parent_id != null){
                                    $userj = $useri->agent->parentx->user;
                                    // dump(9);
                                    $userj->incrementIncome('earning', $amount);
                                    $this->saveTracking($amount, $userj, $order);
                                    $remain = $remain - $amount;

                                    if($userj->agent && $userj->agent->parent_id != null){
                                        $userk = $userj->agent->parentx->user;
                                        // dump(10);
                                        $userk->incrementIncome('earning', $amount);
                                        $this->saveTracking($amount, $userk, $order);
                                        $remain = $remain - $amount;

                                        if($userk->agent && $userk->agent->parent_id != null){
                                            $userl = $userk->agent->parentx->user;
                                            // dump(11);
                                            $userl->incrementIncome('earning', $amount);
                                            $this->saveTracking($amount, $userl, $order);
                                            $remain = $remain - $amount;

                                            
                                            if($userk->agent && $userk->agent->parent_id != null){
                                                $userm = $userk->agent->parentx->user;
                                                // dump(12);
                                                $userm->incrementIncome('earning', $amount);
                                                $this->saveTracking($amount, $userm, $order);
                                                $remain = $remain - $amount;

                                                if($userm->agent && $userm->agent->parent_id != null){
                                                    $usern = $userm->agent->parentx->user;
                                                    // dump(13);
                                                    $usern->incrementIncome('earning', $amount);
                                                    $this->saveTracking($amount, $usern, $order);
                                                    $remain = $remain - $amount;

                                                    if($usern->agent && $usern->agent->parent_id != null){
                                                        $usero = $usern->agent->parentx->user;
                                                        // dump(14);
                                                        $usero->incrementIncome('earning', $amount);
                                                        $this->saveTracking($amount, $usero, $order);
                                                        $remain = $remain - $amount;

                                                        if($usero->agent && $usero->agent->parent_id != null){
                                                            $userp = $usero->agent->parentx->user;
                                                            // dump(15);
                                                            $userp->incrementIncome('earning', $amount);
                                                            $this->saveTracking($amount, $userp, $order);
                                                            // $remain = $remain - $amount;

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
        $user = $order->user;

        if($user->agent && $user->agent->sponsor_id != null){
            $sponsor = User::find($user->agent->sponsor_id);
            $rate = (int) syt_option('sponsor_commission')->cal_value;
            $amount = ($rate / 100) * $commission;

            if($sponsor){
                $sponsor->incrementIncome('earning', $amount);

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

        $user = $order->user;

        if($user){
            $user->incrementIncome('earning', $amount);

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

    protected function store_sponsor($commission, $order)
    {
        $rate = (int) syt_option('top_sale')->cal_value;

        $amount = ($rate / 100) * $commission;

        $track = new Track;
        $track->symbol = '+ Store Sponsor';
        $track->value = $amount;
        $track->user()->associate($order->user);

        $order->track()->save($track);

        return $amount;
    }

    protected function top_sale($commission, $user)
    {
        $rate = (int) syt_option('top_sale')->cal_value;

        $amount = ($rate / 100) * $commission;

        $top = TopSale::addTopSale($amount);

        $track = new Track;
        $track->symbol = '- Top sale';
        $track->value = $amount;
        $track->user()->associate($user);

        $top->track()->save($track);

        return $amount;
    }


}

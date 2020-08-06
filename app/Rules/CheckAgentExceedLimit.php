<?php

namespace App\Rules;

use App\Models\Agent;
use Illuminate\Contracts\Validation\Rule;

class CheckAgentExceedLimit implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $agent = Agent::byUuid($value)->first();

        // return $agent->child_count <= get_level($agent->level)->value;
        return $agent->child_count <= 3;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This user exceed placement tree limited.';
    }
}

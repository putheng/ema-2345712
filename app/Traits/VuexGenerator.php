<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait VuexGenerator
{
	public function vueState()
	{
		$state = $this->resourcesPath('state.js');

		$context = $this->generater($state, [
            "/**/" => $this->option('state') ." : null,\n\t". "/**/",
        ]);

        File::put($state, $context);

        $this->info('State success');
	}

	public function vueGetter()
    {
        $getters = $this->resourcesPath('getters.js');
        $stub = 
        $state = $this->option('state');

        $context = $this->generater($this->getStub('VuexGetter'), [
            'DummyValue' => 'get'. ucfirst($state),
            'DummyData' => $state,
        ]);

        File::append($getters, "\n\n". $context);

        $this->info('Getter success');
    }

    public function addMutation()
    {
        $mutations = $this->resourcesPath('mutations.js');
        $state = $this->option('state');

        $context = $this->generater($this->getStub('VuexMutation'), [
            'DummySet' => 'set'. ucfirst($state),
            'DummyState' => $this->option('state'),
        ]);

        File::append($mutations, "\n\n". $context);
     
        $this->info('Mutation success');
    }

    public function addAction()
    {
        $actions = $this->resourcesPath('actions.js');
        $state = $this->option('state');

        $context = $this->generater($this->getStub('VuexAction'), [
            'setDummy' => 'set'. ucfirst($state),
        ]);

        File::append($actions, "\n\n". $context);

        $this->info('Actions success');
    }

    public function resourcesPath($file)
    {
        $namespace = $this->argument('group');

        return resource_path("js/app/{$namespace}/vuex/{$file}");
    }

    public function getStub($stub)
    {
    	return __DIR__ . '/stubs/'. $stub . '.stub';
    }

    public function generater($stub, $replacements)
	{
		return str_replace(
            array_keys($replacements),
            $replacements,
            file_get_contents($stub)
        );
	}

	public function addState()
	{
        $state = $this->resourcesPath('state.js');

        $context = $this->generater($state, [
            "/**/" => $this->option('state') ." : [],\n\t". "/**/",
        ]);

        File::put($state, $context);
	}
}
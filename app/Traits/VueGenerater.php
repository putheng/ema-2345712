<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait VueGenerater
{
	public function generater($stub, $replacements)
	{
		return str_replace(
            array_keys($replacements),
            $replacements,
            file_get_contents($stub)
        );
	}

	public function generateId()
	{
		return 'C' . strtoupper(uniqid(true)) . 'B';
	}

	public function ifRouteExist($name)
	{
		return file_exists(
			resource_path("js/app/{$name}/routes/index.js")
		);
	}

	public function copyTemplateDirectory($name)
	{
		try{
			return File::copyDirectory(
				resource_path("js/layouts/template"),
				resource_path("js/app/{$name}")
			);

		}catch(Exception $e){
			return false;
		}
	}

	public function addToRouter($name)
	{
		$context = "...$name,\n\t/**/";
		$router = resource_path("js/app/routes.js");

		$generater = $this->generater($router, [
			"/**/" => $context,
		]);

		try{
			File::put($router, $generater);
			return $this->importToRouter($name);

		} catch(Exception $e){
			return false;
		}

	}

	public function importToRouter($name)
	{
		return File::prepend(
			resource_path("js/app/routes.js"),
			"import $name from './$name/routes'\n"
		);
	}

	public function addToVuex($name)
	{
		$vuex = resource_path('js/vuex/index.js');

		$generater = $this->generater($vuex, [
			"/*import*/" => "/*import*/\nimport {$name} from '../app/{$name}/vuex'",
            "/*export*/" => "$name:$name,\n\t\t/*export*/",
		]);

		return File::put($vuex, $generater);
	}

	public function pageFileExist($arg)
	{
		$fileName = ucfirst($arg[2]);

		if (file_exists(resource_path("js/app/{$arg[0]}/components/{$arg[1]}/{$fileName}.vue"))) {
			return true;
		}
	}

	public function createDirectory($arg)
	{
		$path = resource_path("js/app/{$arg[0]}/components/{$arg[1]}/");

        try {
        	if (!is_dir($path)) {
        		mkdir($path, 0777, true);
        	}
        	
        	return true;

        } catch(Exception $e){
        	return false;
        }
	}

	public function createPage($arg)
	{
		$array = $arg;

		$fileName = ucfirst(array_pop($arg));
		
		$stub = __DIR__. '/stubs/page.stub';

		$file = resource_path("js/app/{$arg[0]}/components/{$arg[1]}/{$fileName}.vue");
		
		$context = $this->generater($stub, [
            "DummyPage" => $fileName,
        ]);

		File::put($file, $context);
		sleep(1);

		return $this->exportToIndex($array);
	}

	public function exportToIndex($arg)
	{
		$array = $arg;

		$fileName = ucfirst(array_pop($arg));
		$id = $this->generateId();
		$router = resource_path("js/app/{$arg[0]}/components/index.js");

		File::append(
			$router,
			"\nexport const {$id} = Vue.component('{$id}', require('./{$arg[1]}/{$fileName}.vue').default)"
		);
		sleep(1);
		
		return $this->addToRoute($array, $id);
	}

	public function addToRoute($arg, $id)
	{
		$route = resource_path("js/app/{$arg[0]}/routes/index.js");

		$cleanPath = implode('/', $arg);
		
		if($arg[2] == 'index'){
			unset($arg[2]);
		}

		$routeName = implode('-', $arg);

		$routes = "{\n\t\tpath: '/{$cleanPath}',\n\t\tcomponent: {$id},\n\t\tname: '{$routeName}'\n\t},\n\t/**/";

		$context = $this->generater($route, [
            "/**/" => $routes,
            "/****/" => $id .",\n\t/****/"
        ]);

        return File::put($route, $context);
	}
}
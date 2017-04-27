<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('information','WelcomeController@index');

Route::get('',function(){
	echo "Dao Van Than";
});

Route::get('show1',function(){
	echo "Welcome to Laravel";
});

/*Lesson 2*/
Route::get('get/{name}',function($name){
	return $name;
});

Route::get('get/{name?}/{age?}',function($name=null,$age=null){
	return "Name is : $name and Age is: $age";
})->where(['name'=>'[a-zA-Z]+', 'age'=>'[0-9]{1,10}']);
/*lesson 3*/
Route::get('callview',function(){

	$name="Dao Van Than";
	$age="25";
	return view('view', compact('name','age'));
});

/*Lesson 5*/
Route::get('testaction','WelcomeController@testAction');

Route::get('myname',['as'=>'Than',function(){
	return "Myname is beautiful";
}]);

/*Group*/

Route::group(['prefix'=>'food'],function(){
	Route::get('bacon',function(){
		echo "here is website that sell bacon";
	});
	Route::get('rice',function(){
		echo "here is website that sell rice";
	});
});


/*Lesson 5*/

Route::get('callview',function(){
	return view('layout.view');
});
Route::get('callinform',function(){
	return view('layout.inform');
});
/*View share*/
View::share('title','Laravel');
View::composer(['layout.view', 'layout.inform'], function($view){
	return $view->with('inform','Here is personal website');
});

Route::get('checkview',function(){
	if(view()->exists('layout.view')){
		echo "View is available";
	}else{
		echo "View is not available";
	}
});

/*Lesson 7 Blade*/

Route::get('callmaster',function(){
	return view('templates.master');
});

Route::get('callsub',function(){
	return view('templates.sub');
});

Route::get('callloop',function(){
	return view('templates.loop');
});

/*Lesson 10*/

Route::get('embedded',function(){
	return view('templates.loop');
});

/*lesson 11 URL*/
Route::get('url/full',function(){
	return URL::full();
});

Route::get('url/asset',function(){
	return asset('css/template',true);
});

Route::get('url/to',function(){
	return  URL::to('get',['Than','25'],true);
});

Route::get('url/secure',function(){
	return secure_url('get',['than','25']);
});


/*Database*/

/*Create table*/
Route::get('schema/create',function(){
	Schema::create('than',function($table){
		$table->increments('id');
		$table->string('name',100);
		$table->text('notice')->nullable();
		$table->string('remember_token');
		$table->timestamps();
	});
});

/*Rename table*/
Route::get('schema/rename',function(){
	Schema::rename('than','than1');
});

Route::get('schema/drop',function(){
	Schema::drop('than');
});

Route::get('schema/drop-exists',function(){
	Schema::dropIfExists('than1');
});

Route::get('schema/change-attribute',function(){
	Schema::table('than',function($table){
		$table->string('name',50)->change();
	});
});

Route::get('schema/dropcolumn',function(){
	Schema::table('than',function($table){
		$table->dropColumn('notice');
	});
});

/*Foreign Keys*/

Route::get('schema/create/cate',function(){
	Schema::create('category',function($table){
		$table->increments('id');
		$table->string('name');
		$table->timestamps();
	});
});

Route::get('schema/create/cate',function(){
	Schema::create('than2',function($table){
		$table->increments('id');
		$table->string('title');
		$table->integer('cate_id')->unsigned();
		$table->timestamps();
	});
});

Route::get('schema/create/product',function(){
	Schema::create('product',function($table){
		$table->increments('id');
		$table->string('name');
		$table->integer('price');
		$table->integer('cate_id')->unsigned();
		$table->foreign('cate_id')->references('id')->on('category')->onDelete('cascade');
		$table->timestamps();
	});
});


/*Query Builder*/

Route::get('query/select_all',function(){
	$data=DB::table('than')->get();

	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/select_column',function(){
	$data=DB::table('than')->select('name')->get();

	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/select_where',function(){
	$data=DB::table('than')->where('id',2)->get();

	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/select_orwhere',function(){
	$data=DB::table('than')->where('id',2)->orWhere('name','Thans')->get();

	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/select_andwhere',function(){
	$data=DB::table('than')->where('id',2)->Where('name','Thans')->get();

	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

/*Order By*/

Route::get('query/order',function(){
	$data=DB::table('than')->select('name')->orderBy('name','DESC')->get();/*Inscre*/
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/limit',function(){
	$data=DB::table('than')->kip(1)->take(2)->orderBy('name','DESC')->get();/*From position 0 in DB*/
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/between',function(){
	$data=DB::table('than')->whereBetween('id',[1,3])->get();/*From position 0 in DB*/
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/notbetween',function(){
	$data=DB::table('than')->wherenotBetween('id',[1,3])->get();/*From position 0 in DB*/
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/wherein',function(){
	$data=DB::table('than')->whereIn('id',[2,3])->get();/*From position 0 in DB*/
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/wherenotin',function(){
	$data=DB::table('than')->wherenotIn('id',[2,3])->get();/*From position 0 in DB*/
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});


/*Count row*/

Route::get('query/count',function(){
	$data=DB::table('than')->count();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});


Route::get('query/maxmin',function(){
	$max=DB::table('than')->max('name');
	$min=DB::table('than')->min('name');
	echo "<pre>";
	echo "Max is: ";
	print_r($max); echo "<br>";
	echo "Min is: ";
	print_r($min);
	echo "</pre><br>";
});

Route::get('query/avg-sum',function(){
	$avg=DB::table('than')->avg('id');
	$sum=DB::table('than')->sum('id');
	echo "<pre>";
	echo "AVG is: ";
	print_r($avg); echo "<br>";
	echo "SUM is: ";
	print_r($sum);
	echo "</pre><br>";
});

/*JOIN TABLE*/

Route::get('query/join',function(){
	$data=DB::table('than2')->select('cate_id','title','name')->join('than','than.id','=','than2.cate_id')->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});


/*Insert Delete Update DATABASE*/

Route::get('query/insert',function(){
	DB::table('than2')->insert([
			['title'=>"First", 'cate_id'=>"11"],
			['title'=>"Second", 'cate_id'=>"12"],
			['title'=>"Third", 'cate_id'=>"13"],
			['title'=>"Fouth", 'cate_id'=>"14"]
		]);
});

Route::get('query/insert-getid',function(){
	$id=DB::table('than2')->insertGetId(
		['title'=>"Fifth", 'cate_id'=>"15"]
		);
	echo $id;
});

Route::get('query/update',function(){
	DB::table('than2')->where('id','>',11)->update([
			'title'=>'Change name', 'cate_id'=>'22'
		]);
});

Route::get('query/delete',function(){
	DB::table('than2')->where('id',11)->delete();
	return "Delete OK";
});


/*Eloquent Object Relation Mapping*/

Route::get('model/selectthan',function(){
	$data=App\Than::all()->tojSon();
	$data1=App\Than::all()->toArray();
	$data2=App\Than::find(12)->toArray();
	$data3=App\Than::findOrFail(12)->toArray();
	echo "<pre>";
	print_r($data);
	echo"<br>";
	print_r($data1);
	echo"<br>";
	print_r($data2);
	echo"<br>";
	print_r($data3);
	echo "</pre>";
});

/*Find Where*/

Route::get('model/where',function(){
	$data=App\Than::where('name','Than')->get()->toArray();
	$data1=App\Than::where('name','Than')->firstOrFail()->get()->toArray();
	echo "<pre>";
	print_r($data);
	print_r($data1);
	echo "</pre>";
});

Route::get('model/wheretake',function(){
	$data=App\Than::where('name','Than')->firstOrFail()->take(2)->select('name')->get()->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('model/count',function(){
	$data=App\Than::count();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});


Route::get('model/raw',function(App\Than $than){
	$data=$than::whereRaw('name=? AND id=?',['Than',24])->get()->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

/*ADD DATA TO DATABASE*/

Route::get('model/insert',function(){
	$data=new App\Than;
	$data->name='Than1';
	$data->email='AD@gmail.com';
	$data->address="ngheAn";
	$data->save();
	echo "OK";
});

Route::get('model/create',function(){
	$data=array(
		'name'=>'Than2',
		'email'=>'ABB',
		'address'=>'Nghe An'
		);
	App\Than::create($data);
});

Route::get('model/update',function(){
	$data=App\Than::find(26);
	$data->name="Changed name";
	$data->save();
});

Route::get('model/delete',function(){
	$data=App\Than::find(26);
	$data->delete();
});

Route::get('model/delete1',function(){
	App\Than::destroy(25);
});

/*Has One Has Many*/

Route::get('relation/one-many',function(){
	$data=App\Than::find(1)->looking()->select('look')->get()->toArray();
	echo "<pre>";
	print_r ($data);
	echo "</pre>";

});

Route::get('relation/one-many-1',function(){
	$data=App\Looking::find(2)->than()->select('name')->get()->toArray();
	echo "<pre>";
	print_r ($data);
	echo "</pre>";

});

Route::get('relation/many-many',function(){
	$data=App\Than::find(2)->job()->get()->toArray();

	echo "<pre>";
	print_r ($data);
	echo "</pre>";
});


/*Route::any('(all?)','WelcomeController@index')->where('all','.*');*/


/*RESPONSE*/
Route::get('response/basic',function(){
	return "Here is first response lessson";
});

Route::get('response/json',function(){
	$array = array(
		'name' => 'Dao Van Than',
		'Countryside' => 'Nghe An',
		'age' =>'25'
		);

	return Response::json($array);
});

Route::get('response/xml',function(){

	$content = '<?xml version = "1.0" encoding="UTF-8"?>

	<root>
		<name>Than</name>
		</root>';
		$status = 200;
		$value = 'text/xml';

	return response($content,$status) -> header('Content-Type','$value');
});

/*Response redirect*/

Route::get('response/redirect',function(){
	return redirect() -> route('signup') -> with($success=['status' =>'Success', 'message' => 'You have finished']);
});

Route::get('response/download',function(){
	$url = 'storage/app/downloads/avatar.zip';
	return response()->download($url);
});

Route::get('response/download-delete',function(){
	$url = 'storage/app/downloads/avatar.zip';
	return response()->download($url)->deleteFileAfterSend(true);
});

/*Marco*/

Route::get('response/marco',function(){
	return response()->caps('dao van than');
});

Route::get('response/signup',function(){
	return response()->signup('abc');
});


/*FORM AUTHENTICATION*/

Route::get('form/signup',['as'=>'getsignup','uses'=>'AccountController@getsignup']);

Route::post('form/signup',['as'=>'postsignup','uses'=>'AccountController@postsignup']);

Route::get('form/login',['as'=>'getlogin','uses'=>'AccountController@getlogin']);

Route::post('form/login',['as'=>'postlogin','uses'=>"AccountController@postlogin"]);


/*Authentication*/

Route::get('authentication/register',['as'=>'getRegister','uses'=>'AuthController@getRegister']);

Route::post('authentication/register',['as'=>'postRegister','uses'=>'AuthController@postRegister']);

Route::get('authentication/login',['as'=>'getLogin','uses'=>'AuthController@getLogin']);

Route::post('authentication/login',['as'=>'postLogin','uses'=>'AuthController@postLogin']);

Auth::routes();

Route::get('/home', 'HomeController@index');


/*RESFUL*/

Route::resource('restful','ResfulController');
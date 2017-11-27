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
use Illuminate\Support\Facades\DB;


Route::get('/', function () {
    $fn = "/var/www/crm/storage/welcome.json";

    $fp = fopen($fn, 'r');
    $contents = fread($fp, filesize($fn));
    $data = json_decode($contents);
    return view('welcome', ["data"=>$data]);
});

function getData()
{
    $fn = "/var/www/crm/data.csv";
    $odata = Array();
    if (($handle = fopen($fn, "r")) !== FALSE) {
        while ( ($data = fgetcsv($handle, 1000, ",")) !== FALSE )
        {
            $fn = "/var/www/html/imgs/".$data[0].".jpg";
            $odata[$fn] = $data;
        }
    }

    return $odata;
}

Route::get('u/{id}', function($id)
{
    $data = Array();
    $data['uid'] = $id;
    $data['img_fn'] = "/var/www/html/imgs/".$id.".jpg";

$users = Array();
$users['001'] = "林志玲 女友";
$users['002'] = "周子瑜 老婆";
$users['003'] = "周星星";
$users['004'] = "米國大統領 川普";


    if( array_key_exists($data['uid'], $users) ){
        $data['name'] = $users[$data['uid']];
    } else {
        $user = DB::table('users')->where('type', $data['img_fn']);
        $data['name'] = $user->value("name");
    }

if(strlen($data['name'])==0 )
{

    $fn = "/var/www/crm/storage/welcome.json";

    $fp = fopen($fn, 'w');
    fwrite($fp, json_encode($data));
    return 1;
}
    $data['img_url'] = str_replace("/var/www/html/imgs", "http://p.talkwood.info/imgs/", $data['img_fn']);
    $csv = getData();

    if( array_key_exists($data['img_fn'], $csv) ){
        $data['item_name'] = $csv[ $data['img_fn'] ][2];
        $data['item_date'] = $csv[ $data['img_fn'] ][1];
        $data['item_img'] = $csv[ $data['img_fn'] ][3];
    } else {

        shuffle ($csv);
        $pick = $csv[0];
        $data['item_name'] = "";
        $data['pick_name'] = $pick[2];
        $data['pick_date'] = $pick[1];
        $data['pick_img'] = $pick[3];

    }

    $fn = "/var/www/crm/storage/welcome.json";

    $fp = fopen($fn, 'w');
    fwrite($fp, json_encode($data));

});

Route::get('/about', function () {
    return view('about');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

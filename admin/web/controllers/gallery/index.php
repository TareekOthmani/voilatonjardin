<?php

/*
 * This file is part of the CRUD Admin Generator project.
 *
 * Author: Jon Segador <jonseg@gmail.com>
 * Web: http://crud-admin-generator.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


require_once __DIR__.'/../../../vendor/autoload.php';
require_once __DIR__.'/../../../src/app.php';
require_once __DIR__.'/../../../src/utils.php';


use Symfony\Component\Validator\Constraints as Assert;

$app->match('/gallery/list', function (Symfony\Component\HttpFoundation\Request $request) use ($app) {  
    $start = 0;
    $vars = $request->request->all();
    $qsStart = (int)$vars["start"];
    $search = $vars["search"];
    $order = $vars["order"];
    $columns = $vars["columns"];
    $qsLength = (int)$vars["length"];    
    
    if($qsStart) {
        $start = $qsStart;
    }    
	
    $index = $start;   
    $rowsPerPage = $qsLength;
       
    $rows = array();
    
    $searchValue = $search['value'];
    $orderValue = $order[0];
    
    $orderClause = "";
    if($orderValue) {
        $orderClause = " ORDER BY ". $columns[(int)$orderValue['column']]['data'] . " " . $orderValue['dir'];
    }
    
    $table_columns = array(
		'id', 
		'name', 
		'img', 
		'club_type', 
		'detail', 
		'effectif', 
		'monday_friday_open_hour', 
		'saturday_open_hour', 
		'sunday_open_hour', 
		'monday_friday_close_hour', 
		'saturday_close_hour', 
		'sunday_close_hour', 
		'adress', 

    );
    
    $table_columns_type = array(
		'int(11)', 
		'varchar(50)', 
		'text', 
		'text', 
		'text', 
		'int(11)', 
		'varchar(10)', 
		'varchar(10)', 
		'varchar(10)', 
		'varchar(10)', 
		'varchar(10)', 
		'varchar(10)', 
		'text', 

    );    
    
    $whereClause = "";
    
    $i = 0;
    foreach($table_columns as $col){
        
        if ($i == 0) {
           $whereClause = " WHERE";
        }
        
        if ($i > 0) {
            $whereClause =  $whereClause . " OR"; 
        }
        
        $whereClause =  $whereClause . " " . $col . " LIKE '%". $searchValue ."%'";
        
        $i = $i + 1;
    }
    
    $recordsTotal = $app['db']->fetchColumn("SELECT COUNT(*) FROM `gallery`" . $whereClause . $orderClause, array(), 0);
    
    $find_sql = "SELECT * FROM `gallery`". $whereClause . $orderClause . " LIMIT ". $index . "," . $rowsPerPage;
    $rows_sql = $app['db']->fetchAll($find_sql, array());

    foreach($rows_sql as $row_key => $row_sql){
        for($i = 0; $i < count($table_columns); $i++){

		if( $table_columns_type[$i] != "blob") {
				$rows[$row_key][$table_columns[$i]] = $row_sql[$table_columns[$i]];
		} else {				if( !$row_sql[$table_columns[$i]] ) {
						$rows[$row_key][$table_columns[$i]] = "0 Kb.";
				} else {
						$rows[$row_key][$table_columns[$i]] = " <a target='__blank' href='menu/download?id=" . $row_sql[$table_columns[0]];
						$rows[$row_key][$table_columns[$i]] .= "&fldname=" . $table_columns[$i];
						$rows[$row_key][$table_columns[$i]] .= "&idfld=" . $table_columns[0];
						$rows[$row_key][$table_columns[$i]] .= "'>";
						$rows[$row_key][$table_columns[$i]] .= number_format(strlen($row_sql[$table_columns[$i]]) / 1024, 2) . " Kb.";
						$rows[$row_key][$table_columns[$i]] .= "</a>";
				}
		}

        }
    }    
    
    $queryData = new queryData();
    $queryData->start = $start;
    $queryData->recordsTotal = $recordsTotal;
    $queryData->recordsFiltered = $recordsTotal;
    $queryData->data = $rows;
    
    return new Symfony\Component\HttpFoundation\Response(json_encode($queryData), 200);
});




/* Download blob img */
$app->match('/gallery/download', function (Symfony\Component\HttpFoundation\Request $request) use ($app) { 
    
    // menu
    $rowid = $request->get('id');
    $idfldname = $request->get('idfld');
    $fieldname = $request->get('fldname');
    
    if( !$rowid || !$fieldname ) die("Invalid data");
    
    $find_sql = "SELECT " . $fieldname . " FROM " . gallery . " WHERE ".$idfldname." = ?";
    $row_sql = $app['db']->fetchAssoc($find_sql, array($rowid));

    if(!$row_sql){
        $app['session']->getFlashBag()->add(
            'danger',
            array(
                'message' => 'Row not found!',
            )
        );        
        return $app->redirect($app['url_generator']->generate('menu_list'));
    }

    header('Content-Description: File Transfer');
    header('Content-Type: image/jpeg');
    header("Content-length: ".strlen( $row_sql[$fieldname] ));
    header('Expires: 0');
    header('Cache-Control: public');
    header('Pragma: public');
    ob_clean();    
    echo $row_sql[$fieldname];
    exit();
   
    
});



$app->match('/gallery', function () use ($app) {
    
	$table_columns = array(
		'id', 
		'name', 
		'img', 
		'club_type', 
		'detail', 
		'effectif', 
		'monday_friday_open_hour', 
		'saturday_open_hour', 
		'sunday_open_hour', 
		'monday_friday_close_hour', 
		'saturday_close_hour', 
		'sunday_close_hour', 
		'adress', 

    );

    $primary_key = "id";	

    return $app['twig']->render('gallery/list.html.twig', array(
    	"table_columns" => $table_columns,
        "primary_key" => $primary_key
    ));
        
})
->bind('gallery_list');



$app->match('/gallery/create', function () use ($app) {
    
    $initial_data = array(
		'name' => '', 
		'img' => '', 
		'club_type' => '', 
		'detail' => '', 
		'effectif' => '', 
		'monday_friday_open_hour' => '', 
		'saturday_open_hour' => '', 
		'sunday_open_hour' => '', 
		'monday_friday_close_hour' => '', 
		'saturday_close_hour' => '', 
		'sunday_close_hour' => '', 
		'adress' => '', 

    );

    $form = $app['form.factory']->createBuilder('form', $initial_data);



	$form = $form->add('name', 'text', array('required' => true));
	$form = $form->add('img', 'textarea', array('required' => true));
	$form = $form->add('club_type', 'textarea', array('required' => true));
	$form = $form->add('detail', 'textarea', array('required' => true));
	$form = $form->add('effectif', 'text', array('required' => true));
	$form = $form->add('monday_friday_open_hour', 'text', array('required' => true));
	$form = $form->add('saturday_open_hour', 'text', array('required' => true));
	$form = $form->add('sunday_open_hour', 'text', array('required' => true));
	$form = $form->add('monday_friday_close_hour', 'text', array('required' => true));
	$form = $form->add('saturday_close_hour', 'text', array('required' => true));
	$form = $form->add('sunday_close_hour', 'text', array('required' => true));
	$form = $form->add('adress', 'textarea', array('required' => true));


    $form = $form->getForm();

    if("POST" == $app['request']->getMethod()){

        $form->handleRequest($app["request"]);

        if ($form->isValid()) {
            $data = $form->getData();

            $update_query = "INSERT INTO `gallery` (`name`, `img`, `club_type`, `detail`, `effectif`, `monday_friday_open_hour`, `saturday_open_hour`, `sunday_open_hour`, `monday_friday_close_hour`, `saturday_close_hour`, `sunday_close_hour`, `adress`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $app['db']->executeUpdate($update_query, array($data['name'], $data['img'], $data['club_type'], $data['detail'], $data['effectif'], $data['monday_friday_open_hour'], $data['saturday_open_hour'], $data['sunday_open_hour'], $data['monday_friday_close_hour'], $data['saturday_close_hour'], $data['sunday_close_hour'], $data['adress']));            


            $app['session']->getFlashBag()->add(
                'success',
                array(
                    'message' => 'gallery created!',
                )
            );
            return $app->redirect($app['url_generator']->generate('gallery_list'));

        }
    }

    return $app['twig']->render('gallery/create.html.twig', array(
        "form" => $form->createView()
    ));
        
})
->bind('gallery_create');



$app->match('/gallery/edit/{id}', function ($id) use ($app) {

    $find_sql = "SELECT * FROM `gallery` WHERE `id` = ?";
    $row_sql = $app['db']->fetchAssoc($find_sql, array($id));

    if(!$row_sql){
        $app['session']->getFlashBag()->add(
            'danger',
            array(
                'message' => 'Row not found!',
            )
        );        
        return $app->redirect($app['url_generator']->generate('gallery_list'));
    }

    
    $initial_data = array(
		'name' => $row_sql['name'], 
		'img' => $row_sql['img'], 
		'club_type' => $row_sql['club_type'], 
		'detail' => $row_sql['detail'], 
		'effectif' => $row_sql['effectif'], 
		'monday_friday_open_hour' => $row_sql['monday_friday_open_hour'], 
		'saturday_open_hour' => $row_sql['saturday_open_hour'], 
		'sunday_open_hour' => $row_sql['sunday_open_hour'], 
		'monday_friday_close_hour' => $row_sql['monday_friday_close_hour'], 
		'saturday_close_hour' => $row_sql['saturday_close_hour'], 
		'sunday_close_hour' => $row_sql['sunday_close_hour'], 
		'adress' => $row_sql['adress'], 

    );


    $form = $app['form.factory']->createBuilder('form', $initial_data);


	$form = $form->add('name', 'text', array('required' => true));
	$form = $form->add('img', 'textarea', array('required' => true));
	$form = $form->add('club_type', 'textarea', array('required' => true));
	$form = $form->add('detail', 'textarea', array('required' => true));
	$form = $form->add('effectif', 'text', array('required' => true));
	$form = $form->add('monday_friday_open_hour', 'text', array('required' => true));
	$form = $form->add('saturday_open_hour', 'text', array('required' => true));
	$form = $form->add('sunday_open_hour', 'text', array('required' => true));
	$form = $form->add('monday_friday_close_hour', 'text', array('required' => true));
	$form = $form->add('saturday_close_hour', 'text', array('required' => true));
	$form = $form->add('sunday_close_hour', 'text', array('required' => true));
	$form = $form->add('adress', 'textarea', array('required' => true));


    $form = $form->getForm();

    if("POST" == $app['request']->getMethod()){

        $form->handleRequest($app["request"]);

        if ($form->isValid()) {
            $data = $form->getData();

            $update_query = "UPDATE `gallery` SET `name` = ?, `img` = ?, `club_type` = ?, `detail` = ?, `effectif` = ?, `monday_friday_open_hour` = ?, `saturday_open_hour` = ?, `sunday_open_hour` = ?, `monday_friday_close_hour` = ?, `saturday_close_hour` = ?, `sunday_close_hour` = ?, `adress` = ? WHERE `id` = ?";
            $app['db']->executeUpdate($update_query, array($data['name'], $data['img'], $data['club_type'], $data['detail'], $data['effectif'], $data['monday_friday_open_hour'], $data['saturday_open_hour'], $data['sunday_open_hour'], $data['monday_friday_close_hour'], $data['saturday_close_hour'], $data['sunday_close_hour'], $data['adress'], $id));            


            $app['session']->getFlashBag()->add(
                'success',
                array(
                    'message' => 'gallery edited!',
                )
            );
            return $app->redirect($app['url_generator']->generate('gallery_edit', array("id" => $id)));

        }
    }

    return $app['twig']->render('gallery/edit.html.twig', array(
        "form" => $form->createView(),
        "id" => $id
    ));
        
})
->bind('gallery_edit');


$app->match('/gallery/delete/{id}', function ($id) use ($app) {

    $find_sql = "SELECT * FROM `gallery` WHERE `id` = ?";
    $row_sql = $app['db']->fetchAssoc($find_sql, array($id));

    if($row_sql){
        $delete_query = "DELETE FROM `gallery` WHERE `id` = ?";
        $app['db']->executeUpdate($delete_query, array($id));

        $app['session']->getFlashBag()->add(
            'success',
            array(
                'message' => 'gallery deleted!',
            )
        );
    }
    else{
        $app['session']->getFlashBag()->add(
            'danger',
            array(
                'message' => 'Row not found!',
            )
        );  
    }

    return $app->redirect($app['url_generator']->generate('gallery_list'));

})
->bind('gallery_delete');



$app->match('/gallery/downloadList', function (Symfony\Component\HttpFoundation\Request $request) use($app){
    
    $table_columns = array(
		'id', 
		'name', 
		'img', 
		'club_type', 
		'detail', 
		'effectif', 
		'monday_friday_open_hour', 
		'saturday_open_hour', 
		'sunday_open_hour', 
		'monday_friday_close_hour', 
		'saturday_close_hour', 
		'sunday_close_hour', 
		'adress', 

    );
    
    $table_columns_type = array(
		'int(11)', 
		'varchar(50)', 
		'text', 
		'text', 
		'text', 
		'int(11)', 
		'varchar(10)', 
		'varchar(10)', 
		'varchar(10)', 
		'varchar(10)', 
		'varchar(10)', 
		'varchar(10)', 
		'text', 

    );   

    $types_to_cut = array('blob');
    $index_of_types_to_cut = array();
    foreach ($table_columns_type as $key => $value) {
        if(in_array($value, $types_to_cut)){
            unset($table_columns[$key]);
        }
    }

    $columns_to_select = implode(',', array_map(function ($row){
        return '`'.$row.'`';
    }, $table_columns));
     
    $find_sql = "SELECT ".$columns_to_select." FROM `gallery`";
    $rows_sql = $app['db']->fetchAll($find_sql, array());
  
    $mpdf = new mPDF();

    $stylesheet = file_get_contents('../web/resources/css/bootstrap.min.css'); // external css
    $mpdf->WriteHTML($stylesheet,1);
    $mpdf->WriteHTML('.table {
    border-radius: 5px;
    width: 100%;
    margin: 0px auto;
    float: none;
}',1);

    $mpdf->WriteHTML(build_table($rows_sql));
    $mpdf->Output();
})->bind('gallery_downloadList');




<?php
echo '<pre>';

$data = [

	['category'=>1,'attribute'=>1,'option'=>1],
	['category'=>1,'attribute'=>1,'option'=>2],
	['category'=>1,'attribute'=>2,'option'=>3],
	['category'=>1,'attribute'=>2,'option'=>4],
	['category'=>2,'attribute'=>3,'option'=>5],
	['category'=>2,'attribute'=>3,'option'=>6],
	['category'=>2,'attribute'=>4,'option'=>7],
	['category'=>2,'attribute'=>4,'option'=>8]
];

$i=0;
while($i<count($data)){

	// echo $data[$i]['category'].'<br>';
	// echo $data[$i]['attribute'].'<br>';
	// echo $data[$i]['option'].'<br>';
	// echo "==========================<br>";

	$result[$data[$i]['category']][$data[$i]['attribute']][$data[$i]['option']]=$data[$i]['option'];
	$i++;
}

print_r($result);

echo "---------";



$final = [];
foreach ($result as $categoryId => $level1) 
{
	$row['category'] = $categoryId;
	foreach ($level1 as $attributeId => $level2) 
	{
		$row['attribute'] = $attributeId;
		foreach ($level2 as $optionId => $level3) 
		{	
			$row['option'] = $optionId;
			array_push($final, $row);
		}
	}	
}
print_r($final);
?> 




<?php
echo '<pre>';

$data =[

	['category'=>1,'categoryname'=>'c1','attribute'=>1,'attributename'=>'a1','option'=>1,'optionname'=>'o1'],
	['category'=>1,'categoryname'=>'c1','attribute'=>1,'attributename'=>'a1','option'=>2,'optionname'=>'o2'],
	['category'=>1,'categoryname'=>'c1','attribute'=>2,'attributename'=>'a2','option'=>3,'optionname'=>'o3'],
	['category'=>1,'categoryname'=>'c1','attribute'=>2,'attributename'=>'a2','option'=>4,'optionname'=>'o4'],
	['category'=>2,'categoryname'=>'c2','attribute'=>3,'attributename'=>'a3','option'=>5,'optionname'=>'o5'],
	['category'=>2,'categoryname'=>'c2','attribute'=>3,'attributename'=>'a3','option'=>6,'optionname'=>'o6'],
	['category'=>2,'categoryname'=>'c2','attribute'=>4,'attributename'=>'a4','option'=>7,'optionname'=>'o7'],
	['category'=>2,'categoryname'=>'c2','attribute'=>4,'attributename'=>'a4','option'=>8,'optionname'=>'o8']

];



$result['category']=[];

foreach ($data as $row) {

	if(!array_key_exists($row['category'], $result['category']))
	{
		$result['category'][$row['category']]=[];	
	}
	if(!array_key_exists('name',$result['category'][$row['category']]))
	{
		$result['category'][$row['category']]['name']=$row['categoryname'];
		$result['category'][$row['category']]['attribute']=[];	
	}
	if(!array_key_exists($row['attribute'],$result['category'][$row['category']]['attribute']))
	{
		$result['category'][$row['category']]['attribute'][$row['attribute']]=[];
	}
	if(!array_key_exists('name',$result['category'][$row['category']]['attribute'][$row['attribute']]))
	{
		$result['category'][$row['category']]['attribute'][$row['attribute']]['name']=$row['attributename'];	
		$result['category'][$row['category']]['attribute'][$row['attribute']]['option']=[];
	}
	if(!array_key_exists($row['option'],$result['category'][$row['category']]['attribute'][$row['attribute']]['option']))
	{
		$result['category'][$row['category']]['attribute'][$row['attribute']]['option'][$row['option']]=[];
	}
	if(!array_key_exists('name',$result['category'][$row['category']]['attribute'][$row['attribute']]['option'][$row['option']]))
	{
		$result['category'][$row['category']]['attribute'][$row['attribute']]['option'][$row['option']]['name']=$row['optionname'];	
	}
	
	//print_r($result);
}


print_r($result);

?>


// reverse array



<?php 
echo "<pre>";

$data = [
	'category'=> [
		'1'=>[
			'name' => 'c1',
			'attribute'=>[
				'1' => [
					'name'=>'a1',
					'option' => [
						'1'=>[
							'name' => 'o1'
						],
						'2'=>[
							'name' => 'o2'
						]
					]
				],
				'2' => [
					'name'=>'a2',
					'option' => [
						'3'=>[
							'name' => 'o3'
						],
						'4'=>[
							'name' => 'o4'
						]
					]
				]
			]
		],
		'2'=>[
			'name' => 'c2',
			'attribute'=>[
				'3' => [
					'name'=>'a3',
					'option' => [
						'5'=>[
							'name' => 'o5'
						],
						'6'=>[
							'name' => 'o6'
						]
					]
				],
				'4' => [
					'name'=>'a4',
					'option' => [
						'7'=>[
							'name' => 'o7'
						],
						'8'=>[
							'name' => 'o8'
						]
					]
				]
			]
		]
	]
];



$row = [];
$reverse = [];

foreach($data['category'] as $categoryId => $level1)
{

	$row['category'] = $categoryId;
	$row['categoryname'] = $data['category'][$categoryId]['name'];

	foreach($level1['attribute'] as $attributeId => $level2)
	{
		$row['attribute'] = $attributeId;
		$row['attributename'] = $data['category'][$categoryId]['attribute'][$attributeId]['name'];


		foreach ($level2['option'] as $optionId => $level3) 
			
		{
			$row['option'] = $optionId;
			$row['optionname'] = $data['category'][$categoryId]['attribute'][$attributeId]['option'][$optionId]['name'];
			array_push($reverse,$row);
		}
	 }
} 
print_r($reverse);
?>
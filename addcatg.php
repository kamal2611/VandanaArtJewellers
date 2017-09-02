<?php

class Item
{
    public $catgName;
    public $catgImgPath;	
    public $catgDesc;
    public $catDir;

    public function  __construct($itemname , $imgpath , $itemdesc , $dirnam) {
            $this->catgName = $itemname;
	    $this->catgImgPath = $imgpath;	
	    $this->catgDesc = $itemdesc;
            $this->catgDir = $dirnam;   				 
    }
}


function numItem($dirName) {

	$imgfilnam = 'catgimage.png';
	$itemdesc = 'catgdesc.txt';
	$itemname = 'catgname.txt';
	
    	$dir    = $dirName;
	$files1 = scandir($dir);
	$files2 = scandir($dir, 0);
	//echo $files2;	
	$num_files = count($files1)-2;
	$cnt = 0;
	foreach($files2 as $item) {
		if ($cnt > 1 && is_dir($dirName.'/'.$item))  {
			$curDirName = $dirName.'/'.$item;
			$curimgpath = $curDirName . '/' . $imgfilnam;
			
			$curitemnamepath = $curDirName . '/' . $itemname;
			$filecon = file_get_contents($curitemnamepath, true);
			
			$curitemdesc = $curDirName . '/' . $itemdesc;
			$filecondesc = file_get_contents($curitemdesc, true);
			
			$curItem = new Item($filecon , $curimgpath , $filecondesc , $item);
    			$ListOfItems[] = $curItem;
			
		}
		$cnt++;	
		
		
	}		
/*
	foreach($ListOfItems as $citem) {
		echo $citem->catgName . '<br/>';
		echo $citem->catgImgPath. '<br/>';
		echo $citem->catgDesc. '<br/>';
		echo $citem->catgDir. '<br/>';
		
	}		
*/
	return $ListOfItems;
}

numItem('ShopCatogary');

?> 

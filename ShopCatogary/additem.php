<?php



class Item
{
    public $itemName;
    public $itemImgPath;	
    public $itemDesc;
    public $itemBuyLink;	    

    public function  __construct($itemname , $imgpath , $itemdesc , $itembuylink) {
            $this->itemName = $itemname;
	    $this->itemImgPath = $imgpath;	
	    $this->itemDesc = $itemdesc;
	    $this->itemBuyLink = $itembuylink; 
    }
}


function numItem($dirName) {

	

	$imgfilnam = 'itemimage.png';
	$itembuylink = 'itembuylink.txt';
	$itemdesc = 'itemdesc.txt';
	$itemname = 'itemname.txt';
	
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
			
			$curitembuylink = $curDirName . '/' . $itembuylink;
			$fileconbuy = file_get_contents($curitembuylink, true);
			
			$curItem = new Item($filecon , $curimgpath , $filecondesc, $fileconbuy);
    			$ListOfItems[] = $curItem;
			
		}
		$cnt++;	
		
		
	}		
/*
	foreach($ListOfItems as $citem) {
		echo $citem->itemName . '<br/>';
		echo $citem->itemImgPath. '<br/>';
		echo $citem->itemDesc. '<br/>';
		echo $citem->itemBuyLink. '<br/>';
		
	}		
*/
	return $ListOfItems;
}



?> 

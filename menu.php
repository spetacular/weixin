<?php

require 'weixin.class.php';

$ret=wxcommon::getToken();
$ACCESS_TOKEN=$ret['access_token'];
$menuPostData='{
  				 "button":[
					 {	
						  "type":"click",
						  "name":"今日歌曲",
						  "key":"V1001_TODAY_MUSIC"
					  },
					  {
						   "type":"click",
						   "name":"歌手简介",
						   "key":"V1001_TODAY_SINGER"
					  },
					  {
						   "name":"菜单",
						   "sub_button":[
							{
							   "type":"click",
							   "name":"hello word",
							   "key":"V1001_HELLO_WORLD"
							},
							{
							   "type":"click",
							   "name":"赞一下我们",
							   "key":"V1001_GOOD"
							}]
					   }]
				 }';
         
// create new menu
$wxmenu=new wxmenu($ACCESS_TOKEN);	 
$create=$wxmenu->createMenu($menuPostData);

//get current menu
$get=$wxmenu->getMenu();
var_dump($get);

//delete current menu
$del=$wxmenu->deleteMenu();
var_dump($del);

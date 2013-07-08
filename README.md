<img src="http://rubyeye-rubyeye.stor.sinaapp.com/qrcode_for_gh_1c69999308d6_430.jpg" alt="huoyaxiaotu"/>


WeChat Api
======
This is an enclosed class for WeChat apis.

The offical wiki is here:[WeChat api](http://admin.wechat.com/wiki/index.php?title=Main_Page)

Current version supports:
1.Message api
2.General api
3.Custom Menu api
 

微信公共平台api
======
微信公共平台api的php封装

官方wiki在这里：[微信公共平台api](http://mp.weixin.qq.com/wiki/index.php "微信公共平台api")

目前版本支持:
1.消息接口 api
2.通用接口 api
3.自定义菜单 api


常见问题
======
1.出现PHP Warning:  file_get_contents() [<a href='function.file-get-contents'>function.file-get-contents</a>]: Unable to find the wrapper &quot;https&quot; - did you forget to enable it when you configured PHP? in D:\weixin.class.php on line 269

解决方法：出现这个问题是服务器没有开启ssl支持。请在php.ini中加入

 extension=php_openssl.dll
 
 allow_url_include = On
 
重启服务器即可

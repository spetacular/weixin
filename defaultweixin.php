<?php

require 'weixin.class.php';

class DefaultWeixin extends wxmessage {


    public function processRequest($data) {
        // $input is the content that user inputs
        $input = $data->Content;       
        // deal with text msg from user
        if ($this->isTextMsg()) {
            switch ($input) {
                case 'subscribe'://new user subscribes
                    $this->welcome();
                    break;
                case 'Hello2BizUser'://only available before March 26,2013
                    $this->welcome();
                    break;
                case 'news'://news
                    $this->fulinews();
                    break;
                case 'music':
                    $this->yishengmusic();
                    break;              
              case 'joke':
                   $this->xiaohua();
                   break;
                default:
              $this->text($input);
                break;
                   
            }         
        }
        // deal with geographical location
        elseif ($this->isLocationMsg()) {
            $this->fulinews();
        } elseif ($this->isImageMsg()) {
            $this->fulinews();
        } elseif ($this->isLinkMsg()) {
            $this->fulinews();
        } elseif ($this->isEventMsg()) {
            
        } else {
            
        }
    }

   
    /**
     * return news
     */
    private function fulinews() {
        $text = 'QQ黄钻、蓝钻、红钻、绿钻或10Q币任选其一';
        $posts = array(
            array(
                'title' => '福利来了',
                'discription' => $text,
                'picurl' => 'http://mmsns.qpic.cn/mmsns/XWia2Xj7RZ8mhQaESostBicFaX2HjVBbJYKKCBk9PkuicKrSZdfNL7XAw/0',
                'url' => 'http://mp.weixin.qq.com/mp/appmsg/show?__biz=MjM5MDE4Njg2MQ==&appmsgid=10000009&itemidx=1#wechat_redirect',
            )
        );
        $xml = $this->outputNews($posts);
        header('Content-Type: application/xml');
        echo $xml;
    }

    /**
     * return text
     */
    private function text($text) {
        $xml = $this->outputText($text);
        header('Content-Type: application/xml');
        echo $xml;
    }

    /**
     * return jokes
     */
    private function xiaohua() {
        $text = "你好，亲爱的朋友，我可能不在电脑旁。先看个笑话吧。有个小姑娘穿了一件白色大衣在等车，一个熊孩子把巧克力雪糕整个拍她身上了，孩子他妈说对不起孩子很皮，姑娘蹲下身和蔼的说：小朋友，我们拉钩，以后谁在大马路上瞎闹谁就死全家好不好？孩子他妈吓尿了~";
        $xml = $this->outputText($text);
        header('Content-Type: application/xml');
        echo $xml;
    }

    /**
     * return welcome msg
     */
    private function welcome() {
        $text = "亲爱的朋友，欢迎关注兔子。回复“news”看看兔子的10元Q币小礼吧。";
        // outputText 用来返回文本信息
        $xml = $this->outputText($text);
        header('Content-Type: application/xml');
        echo $xml;
    }

    private function music() {
        $music = array(
            'title' => '在春天里',
            'discription' => '在春天里-汪峰',
            'musicurl' => 'http://rubyeye-rubyeye.stor.sinaapp.com/inspring.wma',
            'hdmusicurl' => 'http://rubyeye-rubyeye.stor.sinaapp.com/inspring.mp3'
        );
        $xml = $this->outputMusic($music);
        //sae_log($xml);
        header('Content-Type: application/xml');
        echo $xml;
    }

    private function yishengmusic() {
        $music = array(
            'title' => '一生所爱',
            'discription' => '为什么选这首歌呢？因为我的梦想是与一生所爱的人快乐一生。你的呢，亲爱的朋友？',
            'musicurl' => 'http://rubyeye-rubyeye.stor.sinaapp.com/song/%E5%8D%A2%E5%86%A0%E5%BB%B7-%E4%B8%80%E7%94%9F%E6%89%80%E7%88%B1.mp3',
            'hdmusicurl' => 'http://rubyeye-rubyeye.stor.sinaapp.com/song/%E5%8D%A2%E5%86%A0%E5%BB%B7-%E4%B8%80%E7%94%9F%E6%89%80%E7%88%B1.mp3'
        );
        $xml = $this->outputMusic($music);
        header('Content-Type: application/xml');
        echo $xml;
    }

    /**
     * Pre processing，common usage:save the request into your database.
	 * Because weixin save your msgs only 5 days.
     * @return boolean
     */
    protected function beforeProcess($postData) {

        return true;
    }

    protected function afterProcess() {
    }

    public function errorHandler($errno, $error, $file = '', $line = 0) {
        $msg = sprintf('%s - %s - %s - %s', $errno, $error, $file, $line);
    }

    public function errorException(Exception $e) {
        $msg = sprintf('%s - %s - %s - %s', $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
    }

    private function saveRequest($request) {
        
    }

}




